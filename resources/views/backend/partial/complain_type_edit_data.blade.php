<form action="" method="post" id="complain_type_update_form">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name', $rowData->name) }}">
    </div> 
    <?php $updateUrl    =   url('admin/update_complain_type_data'); ?>
    <input type="hidden" name="complain_type_id" value="{{ $rowData->id }}" >
    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" >
    <button type="button" class="btn btn-default" onclick="updateComplainType('{{ $updateUrl }}');">Update</button>
</form>