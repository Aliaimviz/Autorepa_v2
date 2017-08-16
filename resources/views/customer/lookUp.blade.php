@extends('masterlayout')
@section('content')

<form id="lookUpForm" name="lookUpForm">

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

	<input type="text" value="Licence Plate." name="licencePlate" id="licencePlate"/>

	<input type="text" value="Contruction Year." name="consYear" id="consYear"/>

	<input type="text" value="Km Reading." name="kmReading" id="kmReading"/>

	<textarea name="custComment" id="custComment"></textarea>

	<input type="file" name="carPic" id="carPic">
	<input type="submit" value="Next" name="submit"/>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>