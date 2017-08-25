<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Job_offer;
use Carbon\Carbon;
use App\Review;
use DB;
use App\Notification;
use App\Invoice;

class JobController extends Controller
{
    public function getJobs(){
      return Job::all();
    }

    public function getSingleJob($jobId){
    	return Job::where('id', $jobId)->get();
    }

    public function getBestOffers($jobId){
    	//garage rating logic ->orderBy('logon','asc')
        $selectedOffers = [];

        $jobOffer = Job_offer::where('job_id', $jobId)
                             ->orderBy('offer_desc','asc')
                             ->limit(2)
                             ->get();

        $highRatingOffer = Review::where('job_id', $jobId)->max('stars');

        $jobRow = DB::table('reviews')->where('job_id', $jobId)->where('stars', DB::raw("(select max(`stars`) from reviews)"))->first(['reviews.id', 'reviews.garage_id']);
        
        //dd();
        $highRatingOffer_Final = Job_offer::where('job_id', $jobRow->id)
                             ->where('garage_id', $jobRow->garage_id)
                             ->get();
        //dd($highRatingOffer_Final);                             
        $check = $jobOffer->merge($highRatingOffer_Final); 
        
        return $check;
        // $check = "";
        // $termOffers = [];
        // // $jobOffer = Job_offer::where('job_id', $jobId)
        // //         ->orderBy('offer_desc','asc')
        // //         ->limit(3)
        // //         ->get();
        // $allOffers = Job_offer::where('job_id', $jobId)->get();

        //  for($i=0; $i<count($allOffers); $i++){
        //     //dd($allOffers);
        //     $termOffers[] = '{'.$allOffers[$i]->id.'}';
        //     $star = Review::where('job_id', $allOffers[$i]->job_id)->first(['stars']);
            
        //     if($star != null){
        //         $temp = '{'.$allOffers[$i]->offer_price.','.$star->stars.'}';
        //     }else{
        //         $temp = '{'.$allOffers[$i]->offer_price.','.'null'.'}';
        //     }

        //     $termOffers[] = $temp;
        //     //  $check .= $allOffers[$i]->offer_price;
        //  }

        //  dd($termOffers);
         //dd($termOffers);
    	//return $allOffers;
       //return Job_offer::where('job_id', $jobId)->get();//where('price','>=',0)->min('price');
    }

    public function selectOffer(Request $request){

        if($request->has('offer_id') && $request->has('job_id')){
            
            try {
                //Confirming Job offer selection request
                $accepted_jobOffer_row = Job_offer::where('id', $request->input('offer_id'))->first(['deliver_date', 'garage_id', 'offer_price']);
                
                $expiry_date = $accepted_jobOffer_row->deliver_date;

                $offerAccepted = Job::where('id', $request->input('job_id'))->update(['job_off_id' => $request->input('offer_id'), 'expiry_date' => $expiry_date, 'status_id' => 5]); //Job accepted now in progress

                //Updating selected Job offer and unselected job offer
                $offerRejected = Job_offer::where('job_id', $request->input('job_id'))->update(['status_id' => 4]); //Offers Rejected

                $jobOffer = Job_offer::where('id', $request->input('offer_id'))->update(['status_id' => 7]); //Accepted status

                $userdetail = Job::select('users.name', 'jobs.status_id')->join('users', 'users.id','=', 'jobs.user_id')
                                    ->where('jobs.id', $request->input('job_id'))->first();

                $invoiceNo = substr(uniqid(), 0, 4);
                 //Generating Invoice
                   $invoice = new Invoice();                                    
                   $invoice->user_id = 3; //Auth::user()->id;
                   $invoice->job_id= $request->input('job_id');
                   $invoice->garage_id = $accepted_jobOffer_row->garage_id;
                   $invoice->invoice_no = $invoiceNo;
                   $invoice->status = $accepted_jobOffer_row->status_id;
                   $invoice->amount = $accepted_jobOffer_row->offer_price; 
                   $invoice->save();

                // $invoice->amount = ;


                //Creating new Notification
                if($userdetail['name'] != null){
                    $tempname = $userdetail['name'];
                }else{
                    $tempname = "";
                }                    

                $notification = new Notification();
                $notification->description = 'Your Offer for Job No '.$request->input('job_id').' Has been Accepted by Customer '. $tempname;                
                $notification->title = 'Offer Accepted';
                $notification->notify_type = 'offer-acceptance';
                $notification->sender_id = 3; //Auth::user()->id
                $notification->receiver_id = $accepted_jobOffer_row->garage_id;
                $notification->status = 0; //unread
                $notification->save();

            } catch(\Exception $ex){
               
                return response()->json(['error' => 'Error:'.$ex->getMessage()], 401);     
            }

            return response()->json(['success' => 'Offer Selected Succesfully'], 200); 

        }else{
            return response()->json(['error' => 'offer not accepted.'], 401); 
        }
    }

    public function completeJob(Request $request){
      //  return $request->input();

        if($request->has('job_id') && $request->has('garage_rating')){
            try {                

                //validation / can

                //Changing Job status to Complete 
                $offerAccepted = Job::where('id', $request->input('job_id'))->update(['status_id' => 6]); 

                //Updating Rating of the Garage
                $gotJobRow = Job::where('id', $request->input('job_id'))->first(['job_off_id']);
                
                $gotOfferRow = Job_offer::where('id', $gotJobRow->job_off_id)->first(['garage_id']);

                $review = new Review();
                $review->user_id = 3; //Auth::user()->id
                $review->garage_id = $gotOfferRow->garage_id;
                $review->job_id = $request->input('job_id');
                $review->stars = $request->input('garage_rating');
                $review->description = $request->input('garage_review'); 
                //$garageRated = Review::where('garage_id', $gotOfferRow->garage_id)->update(['stars' => $request->input('garage_rating') ]);
                if($review->save()){
                 return response()->json(['success' => 'Job Completed and reviewed'], 200); 
                }else{
                 return response()->json(['error' => 'Job couldnot be marked Completed.'], 401);                           
                }

            } catch(\Exception $ex){
                //dd($ex->getMessage());
                return response()->json(['error' => $ex->getMessage()], 401); 
            }

            return response()->json(['success' => 'Job Completed and Rated Succesfully'], 200); 

        }else{
            return response()->json(['error' => 'Job couldnot be marked Completed.'], 401);            
        }        
    }

    public function getCustomerJobs(){
      //Get Particular Customer Jobs //Auth::user()->id
      return Job::where('user_id', 2)->get();
    }

    public function getGarageInProgressJobs(){
      //Get Particular Garage Jobs //Auth::user()->id
      return Job::join('job_offers', 'job_offers.job_id', '=', 'jobs.id')->where('g_user_id', 2)->get();
    }

    public function getCustomerInvoices(){
 
        $invoices = Invoice::join('jobs', 'jobs.id', '=', 'invoices.job_id')
                           ->join('job_offers', 'job_offers.id', '=', 'jobs.job_off_id')
                           ->where('invoices.user_id', 3) //Auth::user()->id
                           ->get();
        return $invoices;       
    }

    public function getGarageInvoices(){
        $invoices = Invoice::join('jobs', 'jobs.id', '=', 'invoices.job_id')
                           ->join('job_offers', 'job_offers.id', '=', 'jobs.job_off_id')
                           ->where('invoices.garage_id', 1) //Get garage id
                           ->get();
        return $invoices;
    }

    public function getSingleInvoice($invoiceId){
        $invoices = Invoice::join('jobs', 'jobs.id', '=', 'invoices.job_id')
                           ->join('job_offers', 'job_offers.id', '=', 'jobs.job_off_id')
                           ->where('invoices.id', '=', $invoiceId) //Get garage id
                           ->get();
        return $invoices;                           
    }

}
