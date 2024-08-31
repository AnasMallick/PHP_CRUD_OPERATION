<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DEPARTMENT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <form method="post" class="form-control">
    <label>NAME</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
    <label>ADDRESS</label>
    <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
  </form>
  <br><br>
</body>
</html>


<?php
$conn = mysqli_connect("localhost", "root", "", "php_crud_anas");
if (isset($_GET["did"])) {
  $del_id = $_GET["did"];
  $del = "DELETE FROM department WHERE id = $del_id";
  mysqli_query($conn, $del);
}
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["address"];
  $queryinsert = "INSERT INTO `department`  VALUES (Null,'$name' ,'$email')";
  $sql = mysqli_query($conn, $queryinsert);
};

$res = mysqli_query($conn, "SELECT * FROM department");
echo '<table class="table">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
    <th scope="col">ADDRESS</th>
    <th scope="col">DELETE or UPDATE</th>
  </tr>
</thead>
<tbody>';
while ($row = mysqli_fetch_assoc($res)) {
  echo ' <tr>
  <th scope="row">'.$row["id"].'</th>
  <td>'.$row["dep_name"].'</td>
  <td>'.$row["dep_address"].'</td>
  <td scope="col"><a href="index2.php?did='.$row["id"].'">Delete</a>
  <a href="update2.php?uid='.$row["id"].'">Update</a 
  </td>
</tr>';
}
echo '</tbody>
         </table>';






?>