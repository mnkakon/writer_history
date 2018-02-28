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

    <div class="row text-center" style="margin-bottom: 15px">
        <h1 class="text-center">Writer History</h1>
        <a href="{!! url('/add-book') !!}" class="btn btn-success">Add Book</a>
    </div>
    <div class="row" style="margin-bottom: 15px">
        <div class="col-md-4 col-md-offset-4">
            <select name="" id="writter_select" class="form-control">
                <option value="10000" selected>Select a writer</option>
                @foreach($writers as $writer)
                    <option value="{!! $writer->id !!}">{!! $writer->name !!}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">

        <div id="result"class="col-md-8 col-md-offset-2">
            <!-- <h2>Please Select a book</h2> -->
        </div>
    </div>
</div>
<script>
    // $('.result').html()
    $('#writter_select').on('change', function () {

        console.log($('#writter_select').val())
        $.ajax({
                url: '{!! url('ajax') !!}' + '/' + $('#writter_select').val(),
                success: function (result) {
                    console.log(result)
                    if(result.books.length == 0)
                    {
                        data = '<h3> No Book for this write </h3>'
                    }
                    else
                    {
                        data = '<table class="table table-bordered">' +
                            '<tr><th>Book Name</th><th>Writer Name</th><th>Published Year</th></tr>'
                        result.books.forEach(function (el) {
                            data += '<tr>'
                            console.log(el.name)
                            data += '<td>' + el.name + '</td>'
                            data += '<td>' + result.writer.name + '</td>'
                            data += '<td>' + el.publish_year + '</td>'
                            data += '</tr>'
                        })
                        data += '</table>'
                    }
                    $('#result').html(data)
                }
            }
        );
    })


</script>
</body>
</html>