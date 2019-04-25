@extends('backend.layouts.app')
@section('title', 'Complain Type')
@section('content')

<h2>{{ $pageData['pageTitle'] }}</h2>
<div class='pull-right'><a href="{{ url('admin/complain_type_status') }}">List</a></div>
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
<form action="{{ $pageData['formAction'] }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
        <?php
            if($errors->has('name')) {
                echo $errors->first('name');
            }
        ?>
    </div>                
    <button type="submit" class="btn btn-default">Create</button>
</form>
        
@endsection
