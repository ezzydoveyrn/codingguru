<div class="container" style="margin-top: 20px;">
  <h2 style="float: left;">USERS</h2>
  <button onclick="addUser()"  type="button" class="btn btn-primary" id="addUser" style="float: right;">ADD USER</button>

  <div class="container12 displayX">
    <h2>Add User</h2>
    <hr>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="Full Name" class="form-control">
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="e**********@gmail.com" class="form-control">
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="********" class="form-control">
      <input type="submit" name="adduser" value="Add User" class="btn btn-success" style="float: right; margin: 10px;">
    </form>
    <?php
    if(isset($_POST["adduser"])){
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];

      if(!empty($name) && !empty($email) && !empty($password)){
        $sql = "INSERT INTO users (name, email, password) VALUE ('$name', '$email', '$password')";
        mysqli_query($conn, $sql);

        header("Location: index.php?add_message=User added successfully");
      }
      else{
        echo"one of your fields is empty";
      }
    }
    ?>
  </div>

  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>UPDATE</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          ?>

          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><a href="updateDelete/update.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">UPDATE</a></td>
            <td><a href="updateDelete/delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a></td>
          </tr>

          <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>