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
    {{-- {{View::make('footer')}} --}}

<h2>Statement of account</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">DATETIME</th>
      <th scope="col">AMOUNT</th>
      <th scope="col">TYPE</th>
      <th scope="col">DETAILS</th>
      <th scope="col">BALANCE</th>
    </tr>
  </thead>
<tbody>
@foreach ($transactions as $transaction)
<tr>
<td>{{ $transaction->id }}</td>
<td>{{ $transaction->created_at }}</td>
<td>{{ $transaction->transaction_amount }}</td>
<td>{{ $transaction->type }}</td>
<td>{{ $transaction->details }}</td>
<td>{{ $transaction->balance }}</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>