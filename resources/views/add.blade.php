<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Writer History</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row text-center">
        @include('alert')
        <h1>Add Book</h1>
        <a href="{!! url('/') !!}" class="btn btn-info">Home</a>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{!! url('add-book-save') !!}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="writer">Writer Name:</label>
                    <input type="text" name="writer" class="form-control" id="writer" required>
                </div>
                <div class="form-group">
                    <label for="book">Book Name:</label>
                    <input type="text" name="book" class="form-control" id="book" required>
                </div>
                <div class="form-group">
                    <label for="year">Published Year:</label>
                    <input type="number" name="year" class="form-control" id="year" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>