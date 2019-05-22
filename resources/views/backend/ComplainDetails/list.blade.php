@extends('cms.layouts.app')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">complains</li>
</ol>

<div class='row'>
    <div class='col-md-12'>
        <h2 style="margin-left: 35% ">Complain List</h2>
        <!--     List Table starts here    -->
        <table class="table">
            <thead style="background-color:#007bff">
                <tr>
                    <th width = "3%">#</th>
                    <th width = "5%">User Email</th>
                    <th width = "8%">Complain Type</th>
                    <th width = "20%">Complain  Details</th>
                   
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
                            <td>{{ $listData->email }}</td>
                            <td>{{ $listData->complain_type_name }}</td>
                            <td>{{ $listData->complain_details }}</td>
                            
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

