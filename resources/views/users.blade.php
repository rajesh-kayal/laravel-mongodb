<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>table</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <table class="table-hover table-bordered">
        <tr>    <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    
        @php
        $i=1;
        @endphp
        @foreach ($users as $user )
        <tr>
        <td>{{$i++}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->date}}</td>
        <td><a href="{{'edit/'.$user->_id}}">Edit</a> | 
        <a href="{{url('delete/'.$user->_id)}}">Delete</a></td>
        </tr>
        
        @endforeach
    </table>
</body>
</html>