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

//generate a code of 5 character.....
  $code="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $randomcode=substr(str_shuffle($code),0,5);
  
  if(isset($_POST['submit'])) {
    //get variables
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $attachpath=$_FILES['attach']['tmp_name'];
    $datep= date('y-m-d');

    //if image has been selected...
    $picturepath=$_FILES['picture']['tmp_name'];
    if($picturepath){

      $binary =fread(fopen($picturepath, 'r'),filesize($picturepath));
      $picture =base64_encode($binary);
      
      }
      //if file has been selected...
    if($attachpath){
      mkdir($randomcode);

        $target_dir = $randomcode."/";
    $target_file = $target_dir . basename($_FILES["attach"]["name"]);//Get tmp link of the file
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $yourfile = $randomcode."/".$_FILES["attach"]["name"];
    if (move_uploaded_file($_FILES["attach"]["tmp_name"] ,$target_file)) {
    echo "Thank your file ". basename( $_FILES["attach"]["name"]). " has been uploaded.";

      }
      //save value inside the table.....
      $insert=mysqli_query($conn,"INSERT INTO just(name, contact, subject, message, picture,code,datep) VALUES ('$name','$contact','$subject','$message','$picture','$randomcode','$datep')");
      if($insert)
      {
        $yourcode="yourcode message is : ".$randomcode;

      }
      else{
        echo ("error".mysqli_error($conn));
      }





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
              <p><?php echo $yourcode;  ?> </p>
              <a href = "message.php"><button class="btn btn-lg btn-primary btn-block text-uppercase">READ MESSAGE</button></a>
              <a href = "index.php"><button class="btn btn-lg btn-success btn-block text-uppercase">HOME</button></a><BR>

          </div>
        </div>
      </div>
    </div>
  </div>
  

 
</body>

<p id = "result"></p>




</body>
</html>
