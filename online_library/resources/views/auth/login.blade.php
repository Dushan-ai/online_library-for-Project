<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


    <title>Login Form</title>
  </head>
  <style>
    .container{
      max-width: 600px;
      margin-top: 75px;
      padding: 50px;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      align-items: center;
      justify-content: center;
      height: 40%; /* Full height of the viewport */
      box-sizing: border-box; /* Include padding in the height */
    }
    .formgroup{
        width: 500px;
        padding: 10px;
        border-radius: 5px;
        background: transparent;
        border: 1px solid #ccc;
        font-family: "Poppins" ,sans-serif;
        font-size: 15px;
    }
  </style>
  <body>
    <div id="form" class ="container">
        <h1 style="text-align:center; font-family:sans-serif;">Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <lable> Email </lable><br>
            <div>
                <input type="email" class = "formgroup" name="email" value="{{ old('email') }}" required>
                @error('email') <span>{{ $message }}</span> @enderror
            </div><br>
            <lable> Password </lable><br>
            <div>
                <input type="password" class = "formgroup" name="password" required>
                @error('password') <span>{{ $message }}</span> @enderror
            </div><br>
            <div class = "form.btn"><input type="submit" class="btn btn-primary" value="submit" name="submit"></div><br>
            <p style="text-align:center"><a href="/signup">Create a Account</a></p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      //the PRG pattern, can avoid the "resubmission" warning
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
    </script>
  </body>
</html>