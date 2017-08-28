@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <?php echo gettype ($todos); ?>
                <?php 
                echo "<pre>";
                print_r($todos);
                echo "</pre>";
                die();
                ?>
                
            </div>
        </div>
    </div>
</div>
@endsection
