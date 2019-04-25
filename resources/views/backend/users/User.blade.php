
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
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="users_list">
  <?php
                    $url        =   $pageData['getEditDayaUrl'];
                    $delurl     =   $pageData['delUrl'];
                    if (!$list->isEmpty()) {
                        $count = 1;
                        foreach ($list as $users_list) {
                            ?>  
    <tr id="table_row_id_{{$users_list->id}}">
    <td>{{ $count++ }}</td>
    <td>{{ $users_list->name }}</td>
    <td>{{ $users_list->email }}</td>
    <td>
      <button type="button" class='btn btn-sm btn-primary' onclick="OpenUserListUpdateModal('{{ $url }}', '{{ $users_list->id }}');">Edit</button>
      <button type="button" class='btn btn-sm btn-danger' onclick="confirmUserDel('{{$delurl}}', '{{ $users_list->id }}');">Delete</button>
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
@include('backend.modal.userListEdit')




