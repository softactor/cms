@extends('backend.layouts.app')
@section('title', 'Complain Type List')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h2>{{ $pageData['pageTitle'] }}</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="3" class="right"><a href="{{ url('admin/create_complain_type') }}">Create</a></th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="listDatas">
                    <?php
                    $url        =   $pageData['getEditDayaUrl'];
                    $delurl     =   $pageData['delUrl'];
                    if (!$list->isEmpty()) {
                        $count = 1;
                        foreach ($list as $listData) {
                            ?>  
                            <tr id="table_row_id_{{$listData->id}}">
                                <td>{{ $count++ }}</td>
                                <td>{{ $listData->name }}</td>
                                <td>
                    <button type="button" class='btn btn-sm btn-primary' onclick="OpenComplainTypeEditModal('{{ $url }}', '{{ $listData->id }}');">Edit</button>
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
@include('backend.modal.complainTypeEditModal')