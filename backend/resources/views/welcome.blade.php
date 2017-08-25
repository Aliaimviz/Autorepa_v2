@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

    </div>

    <form id="imageForm"  method="post" enctype="multipart/form-data">
        <input type="file" name="pic" id="pic">
        <input type="submit" name="submit" id="submit">
    </form>

@endsection

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
<script type="text/javascript">

$("#imageForm").on('submit', function(e){
      e.preventDefault();


      var formData = new FormData($("imageForm"));

      $.ajax({
            url: "http://localhost/Autorepa_v2/consumer/imagepost_api.php",
            type: 'post',
            data: {'pic': $("#imageForm").data('pic') },
            success : function( data ) {
              console.log(data);
            }
        });


});

</script>

