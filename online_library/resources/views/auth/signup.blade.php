<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <!--This script tag loads the Google Maps JavaScript API with the "Places" library-->
    <title>SignUp Form</title>
    </head>
    <style>
        .container{
            max-width: 600px;
            margin-top: 10px;
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
    <div class ="container">
    <h1 style="text-align:center" >SignUp</h1>
    <form name="form" action="{{ route('signup') }}" method="POST">
        @csrf
        <label>First Name</label><br>
        <input type="text" id="firstname" class="form-control" name="firstname" required><br>

        <label>Last Name</label><br>
        <input type="text" id="lastname" class="form-control" name="lastname" required><br>

        <label>NIC</label><br>
        <input type="text" id="nic" class="form-control" name="nic" required><br>

        <label>Mobile No</label><br>
        <input type="text" id="mobile_no" class="form-control" name="mobile_no" required><br>

        <label>Address</label><br>
        <input type="text" id="address" class="form-control" name="address" required><br>

        <label>Email</label><br>
        <input type="email" id="email" class="form-control" name="email" required><br>

        <label>Password</label><br>
        <input type="password" id="password" class="form-control" name="password" required><br>

        <label>Confirm Password</label><br>
        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required><br>

        <input type="submit" id="button" class="btn btn-primary" value="Signup" name="submit">
    </form>
            
    <p style="text-align:center"><a href="/login">LogIn</a></p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>