<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create Complain Type</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>{{ $pageData['pageTitle'] }}</h2>
            <form action="{{ $pageData['formAction'] }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    <?php
                        if($errors->has('name')) {
                            echo $errors->first('name');
                        }
                    ?>
                </div>                
                <button type="submit" class="btn btn-default">Create</button>
            </form>
        </div>

    </body>
</html>
