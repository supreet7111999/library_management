<?php

session_start();
$stdid=$_SESSION['id'];
include_once('conn.php');
if($_SESSION['id']=='')
{
     header("Location:index.php");
}


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
  <div class="container-fluid">
      <div style="box-shadow: 2px 5px 10px rgb(228, 228, 220) !important; " class="container mb-5 mt-5 border rounded">
        <div class="row">
          <div class="col-12 p-3  text-center login2">
            <h1 class="text-danger">Welcome to the Student Page</h1>
          </div>
        </div>
        <div class="row border">
         <div class="col-2 border-right bg-warning">
           <div class="row border bg-danger text-primary">
            <div class="col-12">
             Profile
            </div>
           </div>
           <div class="btn-group-vertical">
             <button type="button" class="btn btn-secondary"><a href="profile.php">View/Update</a></button>
          </div>
           <div class="row border bg-danger text-primary">
            <div class="col-12">
              Request/Recieved
            </div>
           </div>
           <div class="btn-group-vertical">
             <button type="button" class="btn btn-secondary"><a href="requeststd.php">Request</a></button>
             <button type="button" class="btn btn-secondary"><a href="recievedstd.php">Recieved</a></button>
          </div>
           <div class="row border bg-danger text-primary">
            <div class="col-12">
             View/Request Books
            </div>
           </div>
           <div class="btn-group-vertical">
             <button type="button" class="btn btn-secondary"><a href="viewstd.php">View Books</a></button>
          </div>
           
         </div>
         <div class="col-10 bg-white">
            <div class="row bg-info">
              <div class="col-12 text-center border-bottom">
                <p class="text-danger font-weight-bold pt-2">Student Details</p>
              </div>
            </div>
            <div class="row">
              <?php
                $sel="SELECT * FROM stud WHERE id='$stdid'";
                $exe=mysqli_query($conn,$sel);
                $fetch=mysqli_fetch_assoc($exe);
                // echo $fetch;
              ?>
              <div class="col-5 ml-5 mt-5">
                <h3 class="text-left">ID : <?php echo ($fetch['id']); ?></h1>
                <h3 class="text-left">Name : <?php echo ($fetch['name']); ?></h1>
                <h3 class="text-left">Email : <?php echo ($fetch['email']); ?></h1>
                <h3 class="text-left">Pass : <?php echo ($fetch['pass']); ?></h1>
                <h3 class="text-left">Fathers's Name : <?php echo ($fetch['fname']); ?></h1>
                <h3 class="text-left">Mobile : <?php echo ($fetch['con']); ?></h1>
              </div>
              <div class="col-6 text-left">
                <img class="border mt-3 mb-3" src="uploads/<?php echo $fetch['img'];?>" alt="" height="250px" width="200px">
              </div>
            </div>
            <div class="row bg-info">
              <div class="col-12 text-center border-bottom">
                <p class="text-danger font-weight-bold pt-2">Update Details</p>
              </div>
            </div>
            <div class="row mt-3 mb-3 justify-content-center">
              <div class="col-4"></div>
              <div class="col-4 border">
               <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                 <label for="exampleInputEmail1">Name</label>
                 <input type="text" name="na"class="form-control border-0 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $fetch['name'];?>">
                </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Email address</label>
                 <input type="email" name="em" value="<?php echo $fetch['email'];?>" class=" border-0 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                 <label for="exampleInputPassword1">Password</label>
                 <input type="password" name="pa" value="<?php echo $fetch['pass'];?>"name=""class=" border-0 form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                 <label for="exampleInputPassword1">Father's Name</label>
                 <input type="password" name="fname" value="<?php echo $fetch['fname'];?>"class=" border-0 form-control" id="exampleInputPassword1" placeholder="Enter Father's Name">
                </div>
                <div class="form-group">
                 <label for="exampleInputPassword1">Password</label>
                 <input type="password" name="con" value="<?php echo $fetch['con'];?>"name=""class=" border-0 form-control" id="exampleInputPassword1" placeholder="9170464843">
                </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Image</label>
                 <input type="file" name="img"class=" border-0 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $fetch['Name'];?>">
                </div>
                <button type="submit" name="updatesubmit" class="btn mb-2 btn-primary">Update</button> 
               </form>
              </div>
              <div class="col-4"></div>
            </div>
         </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>