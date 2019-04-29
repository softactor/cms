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
                        <th width = "25%">Complain Type</th>
                        <th width = "30%">Engineer Feedback</th>
                        <th width = "30%">Customer Feedback</th>
                        <th width = "15%">Action</th>
                    </tr>
                </thead>
                <tbody id="Dep-list">
                    <?php
                    $delurl     =   $pageData['delUrl'];
                    if (!$list->isEmpty()) {
                        $count = 1;
                        foreach ($list as $listData) {
                            ?>  
                            <tr id="table_row_id_{{ $listData->id }}">
                                <td>{{ $count++ }}</td>
                                <td>{{ get_tablerow_by_id('complain_type', $listData->complian_type_id)->name }}</td>
                                <td>{{ $listData->eng_feedbak }}</td>
                                <td>{{ $listData->customer_feedback }}</td>
                                <td>
                                    <?php $editUrl    = 'admin/feedback_edit/'.$listData->id ?>   
                                    <a href="{{ url($editUrl) }}" type="button" class='btn btn-sm btn-primary' >Edit</a>
                                    <button type="button" class='btn btn-sm btn-danger' onclick="confirmDeleteOp('{{$delurl}}', '{{ $listData->id }}');">Delete</button>
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

