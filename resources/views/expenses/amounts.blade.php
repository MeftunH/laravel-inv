@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Total Amount Calculation</title>
</head>
<body>
<table border = 1>
    <tr>
        <td> Year</td>
        <td> Month</td>
        <td> Amount</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <?php $monthNum = $user->month;
            $dateObj = DateTime::createFromFormat('!m', $monthNum);
            $monthName = $dateObj->format('F');?>
            <td>{{ $user->year}}</td>
            <td>{{ $monthName }}</td>
            <td>{{ $user->total_amount }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
@endsection
