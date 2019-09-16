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
<?php
$conn=mysqli_connect('localhost','root','','quickpost');
  if(!$conn){
    echo "connection failed";
  }

if (isset($_POST['submit'])) {
  $code=$_POST['code'];

  $result=mysqli_query($conn,"SELECT * FROM just WHERE code='$code'");
  $rows=mysqli_num_rows($result);
  if ($rows==1) {
  $message=$result->fetch_assoc();
    $name=$message['name'];
    $contact=$message['contact'];
    $subject=$message['subject'];
    $image=$message['picture'];
    $datep=$message['datep'];
    $message=$message['message'];
    
     

  }

}
?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><img src = "just.png" height="30%" width="30%" ></h5>
              <hr class="my-4">
            <p> <?php echo $name; ?></p>
            <p><?php echo $contact; ?></p>
            <p><?php echo $subject; ?></p>
            <p><?php echo $message; ?></p>
             <p><?php echo $datep; ?></p>
            <p><?php echo "<center><img src= data:image/jpg;base64,$image width='60%'></center>"?></p>
            <div class="faileds">
              <p>Download files :</p>
              <?php 
                if($handle = opendir($code)){

                  while (false !== ($entry = readdir($handle))){

                 if($entry != "." && $entry != "..") {
                  $thefile = $code."/".$entry;
                  echo "<a href = '$thefile'>$entry</a>";
                  echo "<br>";
                 
                  }
                }
              }
              ?>
            
            

              <a href = "index.php"><button class="btn btn-lg btn-success btn-block text-uppercase">HOME</button></a><BR>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

?>
</body>

<p id = "result"></p>




</body>
</html>
