@extends('cms.layouts.app')
@section('content')

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
</ol>
<?php if ($flash_message = Session::get('error')) { ?>

    <div class="alert alert-danger"><?php echo $flash_message; ?></div>
    <?php
}
?>
<?php if ($flash_message = Session::get('success')) { ?>

    <div class="alert alert-success"><?php echo $flash_message; ?></div>
    <?php
}
?>

<div class="container">
    <div class='float-right'><a class="btn btn-primary" style="display: inline-block; margin-bottom: 25px;" href="{{ url('admin/feedback_list') }}">Feedback List</a></div>
    <h2 style="margin-top: 40px;">{{ $pageData['pageTitle'] }}</h2>
    <form action="{{ $pageData['formAction'] }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Complain Type:</label>
            <select name="complian_type_id" class="form-control">
                <option value="">Select One</option>
                <?php
                    $complainTypeData   = get_tabledata_by_table('complain_type');
                    if(!$complainTypeData->isEmpty()){
                        foreach($complainTypeData as $data){ ?>
                <option value="{{ $data->id }}" <?php if(isset($editData->complian_type_id) && $editData->complian_type_id==$data->id){ echo 'selected'; } ?>>{{ $data->name }}</option>
                    <?php } } ?>
            </select>
<?php
if ($errors->has('complian_id')) {
    echo $errors->first('complian_id');
}
?>
            <label for="name">Engineer Feedback:</label>
            <textarea type="text" class="form-control" id="name" rows="3"  name="eng_feedbak"><?php if(isset($editData->eng_feedbak)){ echo $editData->eng_feedbak; } ?></textarea>
<?php
if ($errors->has('eng_feedbak')) {
    echo $errors->first('eng_feedbak');
}
?>
            <label for="name">Customer Feedback:</label>
            <textarea type="text" class="form-control" id="name" rows="3"  name="customer_feedback"><?php if(isset($editData->eng_feedbak)){ echo $editData->customer_feedback; } ?></textarea>
<?php
if ($errors->has('customer_feedback')) {
    echo $errors->first('customer_feedback');
}
?>
        </div> 
        <input type="hidden" name="update_id" value="{{$editData->id}}">
        <button type="submit" class="btn btn-primary" style="display: inline-block; margin-bottom: 25px;">Update Feedback</button>
    </form>
</div>



@endsection
