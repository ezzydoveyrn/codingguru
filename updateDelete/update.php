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
<div class="container">
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?php echo $row["name"]; ?>">
    <label for="name">Name</label>
    <input type="email" name="email" id="name" class="form-control" value="<?php echo $row["email"]; ?>">
    <input type="submit" name="update" value="UPDATE" class="btn btn-success" style="float: right; margin-top: 10px;">
  </form>
</div>
  <?php
}
?>
<?php
if(isset($_POST['update'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql = "UPDATE users SET name ='$name', email ='$email' WHERE id ='$id'";
  try{
    mysqli_query($conn, $sql);
    header("Location: ../index.php?update_msg=Successfully updated");
  }
  catch(mysqli_sql_exception){
    die("cannot update");
  }
}
?>
<br><br><br>
<?php
  require_once("../includes/footer.php");
?>