<?php 
 include "db.php";
 include "header.php";

?>

<?php 

if(isset($_POST["submit"])){
    $name  = $_POST["name"];
    $email  = $_POST["email"];
    $phone  = $_POST["phone"];
    
    $image_name= $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp= $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    
    move_uploaded_file($file_tmp,"../images/".$image_name);

    // Validation of data
    $email = mysqli_real_escape_string($connection,$email);
    


    if(!empty($name) && !empty($email) && !empty($phone) && !empty($image_name)){

        $query = "INSERT INTO student(name,email,phone,image)
                    VALUES('$name','$email','$phone','$image_name')";

        $register_new_user=mysqli_query($connection,$query);

        if(!$register_new_user){
           die("Query Failed".mysqli_error($connection) . ' ' .mysqli_errno($connection));
        }  
        header("Location: ../index.php");
         
    }

    else{
        echo"<script>alert('Please. Fill all boxes!!')</script>";
    }
}
?>
<div class="container">
    <div class="title mt-4">
        <h2><b>Add Student</b></h2>
        <div class="card">
            <div class="card-body">
            <form class="signup" action="" method="post"  autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="tel" name="phone"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="d-block">Image Upload</label>
                        <input type="file"name="image" >
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <button  class="btn btn-secondary" name="submit"><a href=" ../index.php">Back</a></button>
                </form>
            </div>
        </div>
    </div>
</div>