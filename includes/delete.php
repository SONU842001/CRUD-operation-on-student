<?php
include "db.php";

?>
<?php 
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    mysqli_query($connection, "DELETE FROM student WHERE student_id='$id'");
    header("Location: ../index.php");
   
}
?>

