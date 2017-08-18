<form id="lookUpForm" method="post" name="lookUpForm" action="{{route('GarageLookUp_post')}}" enctype="multipart/form-data">

	<select name="carBrand" id="carBrand">
	   @foreach($car_brands as $car_brand)
		<option value="{{$car_brand->code}}">{{$car_brand->title}}</option>
	   @endforeach
	</select>

	<select name="carModel" id="carModel">
	   @foreach($car_models as $car_model)
		<option value="{{$car_model->code}}">{{$car_model->title}}</option>
	   @endforeach
	</select>
	<!--
	<input type="text" placeholder="Licence Plate." name="licencePlate" id="licencePlate"/>

	<input type="text" placeholder="Contruction Year." name="consYear" id="consYear"/>

	<input type="text" placeholder="Km Reading." name="kmReading" id="kmReading"/>

	<textarea name="custComment" id="custComment"></textarea>
	-->
	<input type="file" name="carPic[]" id="carPic" multiple> 
	<input type="hidden" value="{{Session::token()}}" name="_token" />
	

   @foreach($job_types as $job_type)
   	<p><input id="checkBoxJobType" name="checkBoxJobType" type="radio" value="{{$job_type->id}}"> {{$job_type->name}}</p>
   @endforeach
   	<b>Job Title: </b> <input type="text" name="job_title" id="job_title"> 	
	<b>Description: </b> <textarea name="job_desc" id="job_desc"></textarea>  
	<b>Address: </b> <input type="text" name="address" id="address">
	<b>Budget: </b> <input type="number" name="budget" id="budget">	
	<input type="submit" value="Next" name="submit"/>
</form>