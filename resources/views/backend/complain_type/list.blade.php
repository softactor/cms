@extends('backend.layouts.app')
@section('title', 'Complain Type List')
@section('content')
<h2>{{ $pageData['pageTitle'] }}</h2>
<div class='pull-right'><a href="{{ url('admin/create_complain_type') }}">Create</a></div>
<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(!$list->isEmpty()){
            $count  =   1;
            foreach($list as $listData){
                
      ?>  
      <tr>
        <td>{{ $count++ }}</td>
        <td>{{ $listData->name }}</td>
        <td><a href='#'>Edit</a> | <a href='#'>Delete</a></td>
      </tr>      
        <?php
            }// end of for loop
        }else{ ?>
      <tr>
          <td colspan="3">Sorry There is no data</td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
@endsection