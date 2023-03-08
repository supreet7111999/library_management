<?php
   session_start();
   $adid=$_SESSION['id'];
  //  echo $adid;
   include_once('conn.php');
   if($_SESSION['id']=='')
   {
        header("Location:index.php");
   }
  //add student
  
  if(isset($_POST['addsubmit']))
                {
                  
                  $na=$_POST['na'];
                  $ca=$_POST['ca'];
                  $an=$_POST['an'];
                  $img=$_FILES['img']['name'];
                //   echo $an;
                //   echo $ca;
                  if($img!='')
                  {
                    $ud="INSERT INTO book SET Name='$na',Author='$an',img='$img',Category='$ca'";
                    $temppath=$_FILES['img']['tmp_name'];
                    mysqli_query($conn,$ud);
                    $path='uploads/'.$img;
                    move_uploaded_file($temppath,$path);
                  }
                  else{
                    $ud="INSERT INTO book SET Name='$na',Author='$an',Category='$ca'";
                    mysqli_query($conn,$ud);
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
     
  <div class="container-fluid">
      <div style="box-shadow: 2px 5px 10px rgb(228, 228, 220) !important; " class="container mb-5 mt-5 border rounded">
        <div class="row">
          <div class="col-12 p-3  text-center login2">
            <h1 class="text-danger">Welcome to the Admin Page</h1>
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
              Students
            </div>
           </div>
           <div class="btn-group-vertical">
             <button type="button" class="btn btn-secondary"><a href="addstud.php">ADD Students</a></button>
             <button type="button" class="btn btn-secondary"><a href="viewstud.php">View Students</a></button>
          </div>
           <div class="row border bg-danger text-primary">
            <div class="col-12">
              Books
            </div>
           </div>
           <div class="btn-group-vertical">
             <button type="button" class="btn btn-secondary"> <a href="addbook.php">ADD Books</a> </button>
             <button type="button" class="btn btn-secondary"><a href="viewbook.php">View Books</a></button>
          </div>
           <div class="row border bg-danger text-primary">
            <div class="col-12">
              Request
            </div>
           </div>
           <div class="btn-group-vertical">
             <!-- <button type="button" class="btn btn-secondary">ADD Books</button> -->
             <button type="button" class="btn btn-secondary"><a href="request.php">View Request</a></button>
          </div>
         </div>
         <div class="col-10 bg-white">
            <div class="row bg-info">
              <div class="col-12 text-center border-bottom">
                <p class="text-danger font-weight-bold pt-2">Add Books</p>
              </div>
            </div>
            <div class="row bg-info">
            </div>
            <div class="row mt-3 mb-3 justify-content-center">
              <div class="col-4"></div>
              <div class="col-4 border">
               <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                 <label for="exampleInputEmail1">Name</label>
                 <input type="text" name="na"class="form-control border-0 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Author Name</label>
                 <input type="text" name="an"class="form-control border-0 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="input-group mb-3">
                 <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Category</label>
                 </div>
                 <select name='ca' class="custom-select border-0" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="CSE">CSE</option>
                    <option value="CE">CE</option>
                    <option value="ME">ME</option>
                 </select>
                </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Image</label>
                 <input type="file" name="img"class=" border-0 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $fetch['Name'];?>">
                </div>
                <button type="submit" name="addsubmit" class="btn mb-2 btn-primary">Add Book</button> 
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