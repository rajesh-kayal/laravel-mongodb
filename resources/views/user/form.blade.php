<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form with Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('add_users')}}">Add User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('users')}}">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Login</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container ">
    <div class="card p-5 mt-4">
        <h2 class="text-danger text-center">Laravel <span class="text-success">MOngoDB</span></h2>
    <form action="{{url('/store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" >
            @error('name')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" value="{{old('email')}}" name="email" >
            @error('email')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" class="form-control" id="phone" value="{{old('phone')}}" name="phone" >
            @error('phone')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" >
            @error('date')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
</div>

<!-- Bootstrap JS (optional, only needed if you want to use Bootstrap's JavaScript features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>