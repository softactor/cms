@extends('cms.layouts.app')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
</ol>

<div class='row'>
    <div class='col-md-12'>
        <h2>{{ $pageData['pageTitle'] }}</h2>
        <div class='float-right'><a class="btn btn-primary" style="display: inline-block; margin-bottom: 25px;" href="{{ url('admin/complain_details_create') }}">Create Department</a></div>
        <!--     List Table starts here    -->
        <table class="table">
            <thead>
                <tr>
                    <th width = "3%">#</th>
                    <th width = "5%">User ID</th>
                    <th width = "8%">Complain Type ID</th>
                    <th width = "20%">Complain  Details</th>
                    <th width = "20%">Complain Status</th>
                    <th width = "10%">Issued Date</th>
                    <th width = "10%">Action</th>
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
                            <td>{{ $listData->user_id }}</td>
                            <td>{{ $listData->complain_type_id }}</td>
                            <td>{{ $listData->complain_details }}</td>
                            <td>{{ $listData->compalin_status }}</td>
                            <td>{{ $listData->issued_date }}</td>
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
@endsection

