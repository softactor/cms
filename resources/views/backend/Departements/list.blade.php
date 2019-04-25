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
        <div class='float-right'><a class="btn btn-primary" style="display: inline-block; margin-bottom: 25px;" href="{{ url('admin/department_create') }}">Create Department</a></div>
        <!--     List Table starts here    -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Depertement Name</th>
                    <th>Depertement Details</th>
                    <th>Action</th>
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
                            <td>{{ $listData->dep_name }}</td>
                            <td>{{ $listData->dep_details }}</td>
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

