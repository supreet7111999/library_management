<?php
   error_reporting(0);
   session_start();
   $stdid=$_SESSION['id'];
//    echo $stdid;
   include_once('conn.php');
   if($_SESSION['id']=='')
   {
        header("Location:index.php");
   }
  //view all studs
  if(!isset($_POST['searchbtn']))
  {
    $vw="SELECT * FROM book WHERE Status=1";
    $exe=mysqli_query($conn,$vw);
    
  }
  else{
    $nam=$_POST['search'];
    $vw="SELECT * FROM book WHERE AND name Status=1 LIKE '%$nam%'";
    $exe=mysqli_query($conn,$vw);
    
  }
  $bid=$_GET['bid'];
  if($bid!='')
  { 
    $sle="SELECT name FROM stud WHERE id='$stdid'";
    $exec=mysqli_query($conn,$sle);
    $fex=mysqli_fetch_array($exec);
    // print_r ($fex);
    $sname=$fex['name'];
    $sel="SELECT * FROM book WHERE id='$bid'";
    $exer=mysqli_query($conn,$sel);
    $fer=mysqli_fetch_array($exer);
    // print_r ($fer);
    $bname=$fer['Name'];
    $aname=$fer['Author'];
    $ins="INSERT INTO request SET bookid='$bid' , Name='$bname',Author='$aname',byid='$stdid',byname='$sname'";
    mysqli_query($conn,$ins); 
 }
//   print_r ($fetch);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                <p class="text-danger font-weight-bold pt-2">View Book Details</p>
              </div>
            </div>
            <div class="row bg-info">
            </div>
            <div class="row mt-3 mb-3 justify-content-center">
               <div class="row border-bottom pb-2" style="width:100%;">
                 <div class="col-12">
                    <form action="" method="post">
                        <input type="text" name="search" class="border-0 " id="name" placeholder="Enter Name">
                        <button name="searchbtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                 </div>
               </div> 
               <div class="row mt-3">
                  <div class="col-12">
                    <table class="table table-striped">
                      <thead>
                       <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Img</th>
                        <th scope="col">Request</th>
                       </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($fetch=mysqli_fetch_array($exe))
                          {                     
                        ?>
                        <tr>
                         <th scope="row"><?php echo $fetch['id']; ?></th>
                         <td><?php echo $fetch['Name']; ?></td>
                         <td><?php echo $fetch['Author']; ?></td>
                         <td><?php echo $fetch['Category']; ?></td>
                         <td>
                            <img style="width: 20px;height: 30px;" src="uploads/<?php echo $fetch['Img'];?>" alt="img">
                         </td>
                         <td>
                            <button type='button' class="btn btn-primary"><a href="viewstd.php?bid=<?php echo $fetch['id'];?>">Request</a></button>
                         </td>
                        </tr>
                        <?php
                          }
                         ?> 
                      </tbody>
                    </table>
                  </div>
               </div> 
            </div>
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