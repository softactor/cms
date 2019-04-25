@extends('cms.layouts.app')
@section('content')

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
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

<h2>{{ $pageData['pageTitle'] }}</h2>
<div class='float-right'><a class="btn btn-primary" style="display: inline-block; margin-bottom: 15px;" href="{{ url('admin/complain_details_list') }}">Complain Type List</a></div>
<form action="{{ $pageData['formAction'] }}" method="post" style="margin-top: 70px;">
    @csrf
    <div class="form-group col-lg-8">
        <label for="name">User ID:</label>
        <input type="text" class="form-control"   name="user_id" value="{{ old('user_id') }}">
        <label for="name">Complain Type ID:</label>
        <input type="text" class="form-control"   name="complain_type_id" value="{{ old('complain_type_id') }}">
        <label for="name">Complain  Details:</label>
        <textarea type="text" class="form-control"  name="complain_details" rows="3" value="{{ old('complain_details') }}"></textarea>
        <label for="name">Complain Status:</label>
        <input type="text" class="form-control"   name="compalin_status" value="{{ old('compalin_status') }}">
        <label for="name">Issued Date:</label>
        <input type="datetime-local" class="form-control"  name="issued_date" value="{{ old('issued_date') }}">
        <button type="submit" class="btn btn-primary" style="display: inline-block; margin: 20px 0;">Create</button>
    </div>                
    
</form>

@endsection
