<?php
error_reporting(0);
session_start();
include_once("conn.php");

//admin login
$aderror;
$studerror;
if(isset($_POST['adminsub']))
{   
    $user=$_POST['adlogin_email'];
    
    $pa=$_POST['adlogin_pass'];
    // echo $user;
    // echo $pa;
    $sel="SELECT * FROM admin WHERE email='$user' AND pass='$pa'";
    $exe=mysqli_query($conn,$sel);
    $tot=mysqli_num_rows($exe);
    if($tot==1)
    {
        $_SESSION['id']=$user;
        header("Location:profile.php");
    }
    else{
        $aderror="Invalid Admin Details";
    }
}
if(isset($_POST['studsub']))
{   
    // $user=$_POST['stud_email'];
    
    // $pa=$_POST['stud_pass'];
    
      $uname=$_POST['stud_email'];
      $pass=$_POST['stud_pass'];
      $sel="SELECT * FROM stud where email ='$uname' AND pass='$pass'";
      $exe=mysqli_query($conn,$sel);
      $fetchadmin=mysqli_fetch_assoc($exe);
      
      //echo $_SESSION['adminid'];
      $tot=mysqli_num_rows($exe);
      if($tot==1)
      {   
        $_SESSION['id']=$fetchadmin['id'];
          header("Location:user.php");
      }
      else{
          $error="Invalid";
      }
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
     <div class="container-fluid outer">
         <div class="container login-container">
             <div class="row">
                 
             </div>
             <div class="row">
                 <div class="col-md-3 login rounded">
                 <div class="row">
                         <div class="col-12">
                           <h1 class="text-danger">
                            <?php
                             echo $studerror;
                            ?>
                          </h1>
                         </div>
                     </div>
                     <h3>Student Login</h3>
                     <form action="" method="post">
                         <div class="form-group">
                             <input type="text" class="form-control" name="stud_email" placeholder="Email" important>
                         </div>
                         <!-- <label class="text-danger"><?php echo $emailmsg ?></label> -->
                         <div class="form-group">
                             <input type="password" class="form-control" name="stud_pass" placeholder="Password" important>
                         </div>
                         <!-- <label class="text-danger"><?php echo $pasdmsg ?></label> -->
                         <div class="form-group">
                         <button type="submit" name="studsub" class="btn btn-primary">Submit</button>
                         </div>
                         <div class="form-group">
                             <a href="#" class="forgetpwd">Forget Password</a>
                         </div>
                     </form>
                 </div>
                 <div class="col-md-9 login2 rounded">
                     <div class="row">
                         <div class="col-12">
                           <h1 class="text-danger">
                            <?php
                             echo $aderror;
                            ?>
                          </h1>
                         </div>
                     </div>
                     <h3>Admin Login</h3>
                     <form action="" method="post">
                         <div class="form-group">
                             <input type="text" class="form-control" name="adlogin_email" placeholder="Email" important>
                         </div>
                         <!-- <label class="text-danger"><?php echo $ademailmsg ?></label> -->
                         <div class="form-group">
                             <input type="password" class="form-control" name="adlogin_pass" placeholder="Password" important>
                         </div>
                         <!-- <label class="text-danger"><?php echo $adpasdmsg?></label> -->
                         <div class="form-group">
                         <button type="submit"name="adminsub" class="btn btn-primary">Submit</button>
                         </div>
                         <div class="form-group">
                             <a href="#" class="forgetpwd">Forget Password</a>
                         </div>
                     </form>
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