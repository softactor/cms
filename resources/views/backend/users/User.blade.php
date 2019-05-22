
@extends('cms.layouts.app')
@section('title', 'Users List')
@section('content')
<div class='container' style="padding-top: 30px;">
    <div class='row'>
        <div class='col-md-12'>
            <h2>{{ $pageData['pageTitle'] }}</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="users_list">
                    <?php
                    $url = $pageData['viewUser'];
                    $delurl = url('admin/delete_user_data');
                    if (!$list->isEmpty()) {
                        $count = 1;
                        foreach ($list as $usersList) {
                            ?>  
                            <tr id="table_row_id_{{$usersList->id}}">
                                <td>{{ $count++ }}</td>
                                <td>{{ $usersList->name }}</td>
                                <td>{{ $usersList->email }}</td>
                                <td>{{ $usersList->role_name }}</td>
                                <td>
                                    <button type="button" class='btn btn-sm btn-primary' onclick="OpenUserListViewModal('{{ $url }}', '{{ $usersList->id }}', '{{ $usersList->role_id }}');"  >View</button>
                                    @if(Auth::user()->role_id==('3'))
                                    <button type="button" class='btn btn-sm btn-danger' onclick="userDel('{{$delurl}}', '{{ $usersList->id }}');">Delete</button>
                                    @endif
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





