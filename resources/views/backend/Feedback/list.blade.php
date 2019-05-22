@extends('cms.layouts.app')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
</ol>
<div class="container">
    <div class='row'>
        <div class='col-md-12'>
            <h2>{{ $pageData['pageTitle'] }}</h2>
            <div class='float-right'><a class="btn btn-primary" style="display: inline-block; margin-bottom: 25px;" href="{{ url('admin/feedback_create') }}">Create Feedback</a></div>
            <!--     List Table starts here    -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width = "5%">Complain ID</th>
                        <th width = "40%">Engineer Feedback</th>
                        
                        <th width = "15%">Action</th>
                    </tr>
                </thead>
                <tbody id="Dep-list">
                    <?php
                    if (!$list->isEmpty()) {
                        $count = 1;
                        foreach ($list as $listData) {
                            ?>  
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $listData->complain_id }}</td>
                                <td>{{ $listData->user_id }}</td>
                               
                                <td>
                                    <button type="button" class='btn btn-sm btn-primary' >Edit</button>
                                    <button type="button" class='btn btn-sm btn-danger'>Delete</button>
                                </td>
                            </tr>      
                            <?php
                        }// end of for loop
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">Sorry There is no data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

