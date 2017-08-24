@extends('layouts.app')

@section('content')

<!-- Dummy Profile View -->
<a href="{{route('')}}">Edit Profile</a>
@if(isset($profile->pic) && $profile->pic != null)
  <img src="{{ asset('profile_pics/'.$profile->pic) }}" height="100" width="100"/>  	
@else
	<!-- dummy image -->
  <img src="https://trackback.net/wp-content/uploads/2015/02/Dummy-profile-picture.png" height="100" width="100"/>
@endif

<p><b>Name: </b> {{ $profile->name}}</p>
<p><b>Email: </b> {{ $profile->email}}</p> 
<p><b>Address: </b> {{ $profile->asdsad}}</p>
<p><b>Postal Code: </b> {{ $profile->postal}}</p>
<p><b>Phone: </b> {{ $profile->phone}}</p>

@endsection