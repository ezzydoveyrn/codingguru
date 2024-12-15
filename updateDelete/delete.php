<?php
  require_once("header.php");
?>
<?php
if(isset($_GET["id"])){
  $id = $_GET["id"];
}

$sql = "SELECT * FROM users WHERE id ='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
  ?>

  <?php
  $sql = "DELETE FROM users WHERE id ='$id'";
  try{
    mysqli_query($conn, $sql);
    header("Location: ../index.php?delete_msg=Successfully deleted");
  }
  catch(mysqli_sql_exception){
    die("cannot Delete");
  }
  ?>
  <?php
}
?>
<?php
  require_once("../includes/footer.php");
?>