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
<div class='float-right'><a class="btn btn-primary" style="display: inline-block; margin-bottom: 15px;" href="{{ url('admin/department_list') }}">Department List</a></div>
<form action="{{ $pageData['formAction'] }}" method="post" style="margin-top: 70px;">
    @csrf
    <div class="form-group">
        <label for="name">Department Name:</label>
        <input type="text" class="form-control"   name="name" value="{{ old('name') }}">
        <br>
        <label for="name">Department Details:</label>
        <textarea type="text" class="form-control"  name="details" rows="3">{{ old('details') }}</textarea>
    </div>                
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
