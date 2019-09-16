<!DOCTYPE html>
<html>
      <title>form</title>
      <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>

</head>
<body>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><img src = "just.png" height="30%" width="30%" ></h5>
            <form class="form-signin" method = "POST" action = "code.php" enctype="multipart/form-data">
              <div class="form-label-group">
                <input type="text" name = "name" class="form-control" placeholder="Your name" required autofocus><BR>
                <input type="text"  name = "contact" class="form-control" placeholder="Email or Phone" required autofocus><BR>
                <input type="text"  name = "subject" class="form-control" placeholder="subject" required autofocus><BR>
                <textarea   name = "message" class="form-control" required autofocus></textarea><BR>
                <p>Add an image to your message if any</p>
                <input type="file"  name = "picture" class="form-control" ><BR>
                <p>Add  Attach a file if any</p>
                <input type="file"  name = "attach" class="form-control" ><BR>

           
            </div>
              <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit" name = "submit" value ="submit">SEND MESSAGE</button>
              <hr class="my-4">
              <p>Or <a href = "registration.php">Sign Up</a> if you don't have an account</p>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 
</body>

<p id = "result"></p>




</body>
</html>
