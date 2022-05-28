<?php 
 include "db.php";
 include "header.php";

?>

<?php 
   if(isset($_POST["update"])){
    $name  = $_POST["name"];
    $email  = $_POST["email"];
    $phone  = $_POST["phone"];
    $id = $_GET["id"];
    echo $id;
      // Get image name
    $user_image = $_FILES["image"]["name"];

    // image file directory
    $target = "images/".basename($user_image);

    move_uploaded_file($_FILES["image"]["tmp_name"], $target);

    // Validation of data
    $email = mysqli_real_escape_string($connection,$email);

    $result = mysqli_query($connection,"UPDATE student SET name = '$name',email = '$email',phone ='$phone',image ='$user_image' WHERE student_id = $id");
    header("Location: ../index.php");
   }
?>
<?php 
  if(isset($_GET["id"])){


    $id = $_GET["id"];

    $record = mysqli_query($connection, "SELECT * FROM student WHERE student_id=$id");
     while($result = mysqli_fetch_array($record)){
         $name=  $result['name'] ;
         $email = $result['email'];
         $phone = $result['phone'];
         $image = $result['image'];
     }
}

 ?>
<div class="container">
    <div class="title mt-4">
        <h2><b>Update  Student Details</b></h2>
        <div class="card">
            <div class="card-body">
            <form class="signup" action="" method="post"  autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?php echo $name;?>"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" value="<?php echo $email;?>"name="email"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="tel" name="phone" value="<?php echo $phone;?>"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="d-block">Image Upload</label>
                        <input type="file"name="image" >
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>