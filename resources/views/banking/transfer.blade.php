<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banking Project</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    {{View::make('header')}}
    @yield('content')
    
<style>
    body{ font: 14px sans-serif; }
    .wrapper{ width: 360px; padding: 20px; }
</style>

<div class="wrapper">
<h2>Transfer Money</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="create-transferform" >
@csrf
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="emails" min="1" class="form-control" value=" ">
    {{-- </div>
    <div class="form-group"> --}}
        <label>Enter Amount</label>
        <input type="number" min="1"  name="amount" class="form-control" value=" ">
        <!--<input type="hidden" name="type" min="1" class="form-control" value="Credit/Debit">-->
        {{-- <input type="hidden" name="details" min="1" class="form-control" value="Transfer">  --}}
    </div>
    <button type="submit" class="btn btn-primary">Transfer</button>
</form>
{{-- {{View::make('footer')}} --}}
</html>

