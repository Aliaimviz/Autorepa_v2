<?php include ('header.php');?>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/jquery.fileupload.css">
<style type="text/css">
		#personal_information,
		#company_information{
			display:none;
		}
		.nav>li.active{
			    border-top: 9px solid #9bc5e9 !important;
		}
		.nav-pills>li.active>a{
			          border-radius: 0px !important;
					      background: #1077d4 !important;
		}
		.nav-pills>li{
			    border-top: 9px solid #1077d4;
		}
		.nav>li.active:after {
    content: "";
    position: absolute;
    top: 0%;
    left: 50%;
    border-top: 8px solid #9bc5e9;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    margin-left: -8px;
}
.form-group{ 
   background: #f3f3f3;
    padding-top: 25px;
}

.thumbnails {
    display: block;
    margin-bottom:20px !important;;
    background-color: #9bc5e9;
}
.disabled{
	    border-top: 9px solid #3aa0fd;
}
.wells {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
}
.info-car
{
	    margin-bottom: 26px !important;
}
.has-to-be-done{
	        padding-top: 30px !important;
    background-image: url(img/layer1.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
.info-car-h1{
	    font-size: 40px;
    font-family: "Segoe UI";
    color: rgb(58, 160, 253);
    font-weight: bold;
}
.has-to-be-done .container > h1 {
	    font-size: 40px;
    font-family: "Segoe UI";
    color: rgb(255, 255, 255);
    font-weight: bold;
}
.icon-img{
    position: absolute;

}
.jobs-details >ul >li >div.checkbox{
	    position: relative;
    display: block;
    margin-top: 0px;
	    margin-bottom: 0px !important;
		padding-top: 10px;
}

.jobs-details >ul >li >div>label{
	   width: 100%;
    height: 32px;
}
.carousel-control{
	width:0px !important;
}
.glyphicon-circle-arrow-left{
	top:42% !important;	
}
.glyphicon-circle-arrow-right{
	top:42% !important;	
}
.next{
    border-radius: 5px;
    background-color: rgb(0, 0, 0) !important;
    width: 190px;
    height: 54px;
    z-index: 114;
}
.back{
  border-radius: 5px;
  background-color: rgb(16, 119, 212);
   width: 190px;
  height: 54px;
  z-index: 116;
}
.steps{
    font-size: 40px;
    font-family: "Segoe UI";
    color: rgb(58, 160, 253);
    font-weight: bold;
    line-height: 101px;
    text-align: right;
    padding: 0px 100px 0px 4px;
}
.bg-img{
    padding-top: 30px !important;
    background-image: url(img/layer2.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    width: 100%;
}
.tit > h1{
    font-size: 40px;
    font-family: "Segoe UI";
    color: rgb(255, 255, 255);
    font-weight: bold;
    line-height: 1.2;
    text-align: left;
}
.wrapper{
 text-align: center;
    width: 100%;
    margin: 50px 0 45px 0px;
}

	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script  type="text/javascript">

// Activate Next Step

$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        
    })
    
    $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
       
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
		
    })
});


// Add , Dlelete row dynamically

     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur"+i+"' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email"+i+"' type='text' placeholder='Email'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});

</script>
<body>
	
            <h1>Quote Step 1</h1> 
         <div class="containers">
	<div class="row form-group">
	  <div class="col-xs-2">
	  </div>
        <div class="col-xs-8">
            <ul class="nav nav-pills nav-justified thumbnails setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Car Infotmation</h4>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Geographic Information</h4>
                   
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Resume</h4>
                   
                </a></li>
                
                
                
            </ul>
        </div><div class="col-xs-2">
	  </div>
	</div>
    <div class="row setup-content" id="step-1">
       
            <div class="col-md-12 wells text-center">
                 <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
        <h1 class="info-car-h1">Inforamtion Concerning The Car</h1>
      </div>
    </div>               

<div class=" info-car  singup-form">
  <div class="container">

 
    <div class="row" id="info-field">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">   
             <select data-placeholder="Garage Name ">
              <option>Brand Name</option>
              <option value="i1">Item 1</option>
              <option value="i2">Item 2</option>
              <option value="i3">Item 3</option>
            </select> 
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">   
             <select data-placeholder="Garage Name ">
              <option>Model </option>
              <option value="i1">Item 1</option>
              <option value="i2">Item 2</option>
              <option value="i3">Item 3</option>
            </select> 
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">   
             <select data-placeholder="Garage Name ">
              <option>Licence Plate </option>
              <option value="i1">Item 1</option>
              <option value="i2">Item 2</option>
              <option value="i3">Item 3</option>
            </select> 
        </div>        
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">   
          <input type="text"  placeholder="Construction Year">
      </div> 
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">   
          <input type="text"  placeholder="Kilometer Reading">
      </div>  
    </div>

  </div>
</div>

<div class="has-to-be-done">
  <div class="container">
     <h1>What Has To Be Done</h1>

     <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
<div class="carosel-slider-about-us">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                 
                  <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                      
                          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
						   <div class="what-dones">
                            <div><img src="img/icon1.png" class="icon-img"></div> <h1>Exterieur</h1>
                              <div class="jobs-details">
                              <ul>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox01" class="styled" type="checkbox">
								<label for="checkbox01">Job 1</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox02" class="styled" type="checkbox">
								<label for="checkbox02">Job 2</label>
								</div>
								</li>
								<li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox03" class="styled" type="checkbox">
								<label for="checkbox03">Job 3</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox04" class="styled" type="checkbox">
								<label for="checkbox04">Job 4</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox05" class="styled" type="checkbox">
								<label for="checkbox05">Job 5</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox06" class="styled" type="checkbox">
								<label for="checkbox06">Job 6</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox07" class="styled" type="checkbox">
								<label for="checkbox07">Job 7</label>
								</div>
								</li>
                                
                              </ul>
                            </div>
                            <div class="arrs">
                            <i class="fa fa-arrow-down arrw"></i>
                            </div>
                           </div>
                          </div>
                        
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
                           <div class="what-dones">
                            <div><img src="img/icon2.png" class="icon-img"></div> <h1>Exterieur</h1>
                              <div class="jobs-details">
                              <ul>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox1" class="styled" type="checkbox">
								<label for="checkbox1">Job 1</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox2" class="styled" type="checkbox">
								<label for="checkbox2">Job 2</label>
								</div>
								</li>
								<li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox3" class="styled" type="checkbox">
								<label for="checkbox3">Job 3</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox4" class="styled" type="checkbox">
								<label for="checkbox4">Job 4</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox5" class="styled" type="checkbox">
								<label for="checkbox5">Job 5</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox6" class="styled" type="checkbox">
								<label for="checkbox6">Job 6</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox7" class="styled" type="checkbox">
								<label for="checkbox7">Job 7</label>
								</div>
								</li>
                                
                              </ul>
                            </div>
                            <div class="arrs">
                            <i class="fa fa-arrow-down arrw"></i>
                            </div>
                           </div>
                          </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
                             <div class="what-dones">
                            <div><img src="img/icon3.png" class="icon-img"></div> <h1>Exterieur</h1>
                              <div class="jobs-details">
                              <ul>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox11" class="styled" type="checkbox">
								<label for="checkbox11">Job 1</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox12" class="styled" type="checkbox">
								<label for="checkbox12">Job 2</label>
								</div>
								</li>
								<li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox13" class="styled" type="checkbox">
								<label for="checkbox13">Job 3</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox14" class="styled" type="checkbox">
								<label for="checkbox14">Job 4</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox15" class="styled" type="checkbox">
								<label for="checkbox15">Job 5</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox16" class="styled" type="checkbox">
								<label for="checkbox16">Job 6</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox17" class="styled" type="checkbox">
								<label for="checkbox17">Job 7</label>
								</div>
								</li>
                                
                              </ul>
                            </div>
                            <div class="arrs">
                            <i class="fa fa-arrow-down arrw"></i>
                            </div>
                           </div>
                          </div>
                        
                    </div> 
					</div>
					</div> 		
            </div>
       </div>   
<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-circle-arrow-left"></i></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-circle-arrow-right"></i></a>
     </div>

     <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
        <div class="comme">
          <p>Customer’s Comments</p>
          <textarea placeholder="Comment Here"></textarea>
          <input type="submit" value="Submit">
        </div>
       </div>
     </div>
  </div>
  </div>
<div class="do-you-want">
  <div class="container">
  <h1>Do You Want To  Add A Picture?</h1>
  <p>A Picture Will enhance the accuracy of the  quote.</p>

<div class="container">
   
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>

    <div id="files" class="files"></div>
    <br>
 
</div>

</div>
      </div>
</div>


</form>
                
                <button id="back"  class="btn btn-primary btn-md back">Back</button>         
                <button id="activate-step-2" class="btn btn-primary btn-md next">Next</button>
            </div>
      
    </div>
    <div class="row setup-content " id="step-2">
        <div class="bg-img">
<div class="container">
    <div class="tit"><h1>User Location</h1></div>
    <div class="row description-info">
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
						   <div class="what-dones">
                            <div><img src="img/icon4.png" class="icon-img"></div> <h1 class="map-heading">Location</h1>
                              <div class="jobs-details">
                              <ul>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox01" class="styled" type="checkbox">
								<label for="checkbox01">Job 1</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox02" class="styled" type="checkbox">
								<label for="checkbox02">Job 2</label>
								</div>
								</li>
								<li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox03" class="styled" type="checkbox">
								<label for="checkbox03">Job 3</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox04" class="styled" type="checkbox">
								<label for="checkbox04">Job 4</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox05" class="styled" type="checkbox">
								<label for="checkbox05">Job 5</label>
								</div>
								</li>
                                <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox06" class="styled" type="checkbox">
								<label for="checkbox06">Job 6</label>
								</div>
								</li>
                               <li>
								<div class="checkbox checkbox-info checkbox-circle">
								<input id="checkbox07" class="styled" type="checkbox">
								<label for="checkbox07">Job 7</label>
								</div>
								</li>
                                
                              </ul>
                            </div>
                            <div class="arrs">
                            <i class="fa fa-arrow-down arrw"></i>
                            </div>
                           </div>
                          </div>
      <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 float-left">
        <div class="map-iframe">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.299285850037!2d-2.9831205844324438!3d53.40947347999225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b213b1abef049%3A0xe900749a0d60a107!2sWorld+Museum!5e0!3m2!1sen!2s!4v1497267478118" width="100%" height="520" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    

  </div> </div>
<div class="distance-main">
  <div class="container">
    <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 float-left">
        <h1>Find The Best Deal Of Your Region By Selecting Your Location </h1>
        <p>View Distance From  Garage</p>            
     </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 float-left">
       <select data-placeholder="Garage Name ">
        <option>Garage Name </option>
        <option value="i1">Item 1</option>
        <option value="i2">Item 2</option>
        <option value="i3">Item 3</option>
      </select> 

      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 float-left">
        <input type="text" placeholder="Distance from your location to garage ">
      </div>
      <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 float-left">
        <a href="#" class="distance">View Distance <i class="fa fa-eye" aria-hidden="true"></i></a>
      </div>
    </div>
     
  </div>


</div>

          	<div class="wrapper">
  <button id="back"  class="btn btn-primary btn-md back">Back</button>         
                <button id="activate-step-3" class="btn btn-primary btn-md next">Next</button>	
</div>     
    </div>
    <div class="row setup-content" id="step-3">
       
<div class="confirming ">
  <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
          <h1>By Confirming The Heruender Writtern Information, You’ll Get The Best Offers Of Your Region!</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 float-left"><span class="labe">Name:</span></div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left"><p class="fil"><i class="fa fa-user" ></i> John Smith</p></div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 float-left"><span class="labe">Email ID:</span></div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left"><p class="fil fil-em"><i class="fa fa-envelope" ></i> you@dummysite.com </p></div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 float-left"><span class="labe">Address:</span></div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left"><p class="fil fil-add"><i class="fa fa-map-marker" ></i> ABC Road,  XYZ City </p></div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 float-left"><span class="labe">Reference ID:</span></div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left"><p class="fil  fil-ref "><i class="fa fa-snowflake-o" ></i> 123456</p></div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 float-left"><span class="labe">Car Information</span></div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left">
            <div class="row car-info">
              <div class="row-ine-car-info">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left plate"><span class="inn-leb">Car Number Plate:</span><p class="inn-fil">ABC 12345</p></div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left lice"><span class="inn-leb">Car Licence Number:</span><p class="inn-fil">ABC 98754</p></div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left plate"><span class="inn-leb">Car Engine Number</span><p class="inn-fil">ABC 12345</p></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 float-left"><span class="labe">Region</span></div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left">
            <div class="row car-info">
              <div class="row-ine-car-info">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 float-left plate"><span class="inn-leb">User Location</span><p class="inn-fil">ABC 12345</p></div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 float-left lice lice2"><span class="inn-leb">Garage Location</span><p class="inn-fil">ABC 12345</p></div>
              </div>
            </div>
          </div>
        </div>
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 float-left"><span class="labe">Desire Reparation</span></div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left">
            <div class="row car-info">
              <div class="row-ine-car-info">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
                             <div class="what-dones">
                            <div><img src="img/icon3.png" class="icon-img"></div> <h1>Exterieur</h1>
                              <div class="jobs-details">
                              <ul>
                                 <li><label class="select-list">Job 1</label></li>
                                <li><label class="select-list">Job 2</label></li> 
								<li><label class="select-list">Job 3</label></li>
								<li><label class="select-list">Job 4</label></li>
                                
                              </ul>
                            </div>
                            <div class="arrs">
                            <i class="fa fa-arrow-down arrw"></i>
                            </div>
                           </div>
                          </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
                             <div class="what-dones">
                            <div><img src="img/icon3.png" class="icon-img"></div> <h1>Exterieur</h1>
                              <div class="jobs-details">
                              <ul>
                                <li><label class="select-list">Job 1</label></li>
                                <li><label class="select-list">Job 2</label></li> 
								<li><label class="select-list">Job 3</label></li>
								<li><label class="select-list">Job 4</label></li>
								
                                
                              </ul>
                            </div>
                            <div class="arrs">
                            <i class="fa fa-arrow-down arrw"></i>
                            </div>
                           </div>
                          </div>
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
                             <div class="what-dones">
                            <div><img src="img/icon3.png" class="icon-img"></div> <h1>Exterieur</h1>
                              <div class="jobs-details">
                              <ul>
                                <li><label class="select-list">Job 1</label></li>
                                <li><label class="select-list">Job 2</label></li> 
								<li><label class="select-list">Job 3</label></li>
								<li><label class="select-list">Job 4</label></li>
								
                                
                              </ul>
                            </div>
                            <div class="arrs">
                            <i class="fa fa-arrow-down arrw"></i>
                            </div>
                           </div>
                          </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div> 


<div class="backnext">
<div class="container">
     <div class="row">
    <div class="offset-2 col-lg-offset-2 col-xs-12 col-sm-12 col-md-10 col-lg-10 float-left">
      <div class="invoice-btn job-btn rseume-conform-btn">
          <a href="#" class="ne"><input type="checkbox" id="confrom" data-toggle="modal" data-target="#myressume"> <label for="confrom">You Need To Confirm That You Accept The Following Coditions</label>		</a>
           
          <a href="#" class="ne">View Invoice</a>
        </div>
    </div>
  </div>
</div>
</div>
    </div>
    
   
    
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>


<?php include ('footer.php');?>
