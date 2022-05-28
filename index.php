<?php 
 include "includes/db.php";
 include "includes/header.php";

?>

<body>
    <div class="container">
    
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>  Students</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="includes/add.php" class="btn btn-success" ><i class="fas fa-plus"></i> <span>Add New Student</span></a>
											
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>NAME</th>
                        <th>EMAIL</th>
						<th>PHONE</th>
                        <th>Image</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 

                      $query = "SELECT * FROM  student";
                      $result = mysqli_query($connection,$query);

                      while($rows = mysqli_fetch_assoc($result)){
                   ?>
                    <tr>
                        <td><?php echo $rows['name']?></td>
                        <td><?php echo $rows['email']?></td>
                        <td><?php echo $rows['phone']?></td>
                        <td><img src="images/<?php echo $rows['image'] ?>" alt="Picture" 
                           width="5%" height="10%" align="middle"></td>
                        <td><a href="includes/edit.php?id=<?php echo $rows['student_id']; ?>"><i class="fas fa-pen"></i></a></td>
                        <td><a href="includes/delete.php?id=<?php echo $rows['student_id']; ?>"><i class="fas fa-trash"></i></a></td>
                    </tr>
                      <?php 
                      }
                      ?>
                </tbody>
                
                
                  
