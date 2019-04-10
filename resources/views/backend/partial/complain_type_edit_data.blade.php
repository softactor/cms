<form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name', $rowData->name) }}">
        <?php
            if($errors->has('name')) {
                echo $errors->first('name');
            }
        ?>
    </div>                
    <button type="submit" class="btn btn-default">Update</button>
</form>