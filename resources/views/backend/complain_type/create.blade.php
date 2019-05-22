@extends('cms.layouts.app')

@section('content')
<style>
    .account-wall
            {
                margin-top: 0;
                padding: 40px 0px 20px 0px;
            
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 10px 10px 30px;

            }
</style>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Create Complain</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
</ol>



<?php 
    if($flash_message   =   Session::get('error')){ ?>

        <div class="alert alert-danger"><?php echo $flash_message; ?></div>
<?php
    }
?>
<?php 
    if($flash_message   =   Session::get('success')){ ?>

        <div class="alert alert-success"><?php echo $flash_message; ?></div>
<?php
    }
?>
        
        <div class="account-wall"  id="wall" >
           <h4 style="margin-left: 30%">{{ $pageData['pageTitle'] }}</h4>
<form action="{{ $pageData['formAction'] }}" method="post">
    @csrf
    <div class="form-group" style="margin-left: 30%" >
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Complain name" name="name" value="{{ old('name') }}" style="width: 30%">
        <?php
            if($errors->has('name')) {
                echo $errors->first('name');
            }
        ?>
    </div>                
    <button type="submit" class="btn btn-info"  style="margin-left: 30%">Create</button>
</form>
        </div>
@endsection
