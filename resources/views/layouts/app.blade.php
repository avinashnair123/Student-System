<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        .table {
            border: 0.5px solid #000000;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
            border: 0.5px solid #000000;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <!-- Header -->
        <div class="container-fluid no-padding header" style="background-color:#55556A;height:40px;margin-bottom:20px">
        </div>
        <!-- <div class="container"> -->
        <div class="container">
            @yield('content')
        </div>
        <!-- Footer -->
        <div id="footer">
            <div class="container-fluid">
            </div>
        </div>
    </div>
</body>

</html>