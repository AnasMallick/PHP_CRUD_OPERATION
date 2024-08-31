<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CUSTOMER</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <form method="post" class="form-control">
    <label>FIRST NAME</label>
    <input type="text" name="fname" class="form-control" placeholder="Enter Your First Name" required>
    <label>LAST NAME</label>
    <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name" required>
    <label>AMOUNT</label>
    <input type="number" name="amount" class="form-control" placeholder="Enter Your Amount" required>
    <label>QUANTITY</label>
    <input type="number" name="quantity" class="form-control" placeholder="Enter Your Quantity" required>
    <!-- <label>GENDER</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" value="MALE" id="gender">
      <label class="form-check-label" for="flexRadioDefault1">
        MALE
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" value="FEMALE" id="gender" checked>
      <label class="form-check-label" for="flexRadioDefault2">
        FEMALE
      </label> -->
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
  $del = "DELETE FROM customer WHERE id = $del_id";
  mysqli_query($conn, $del);
}
if (isset($_POST["submit"])) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $amount = $_POST["amount"];
  $quantity = $_POST["quantity"];
  $queryinsert = "INSERT INTO `customer`  VALUES (Null,'$fname' ,'$lname' , '$amount' , '$quantity')";
  $sql = mysqli_query($conn, $queryinsert);
};

$res = mysqli_query($conn, "SELECT * FROM customer");
echo '<table class="table">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col"> FIRST NAME</th>
    <th scope="col">LAST NAME</th>
    <th scope="col">AMOUNT</th>
    <th scope="col">QUANTITY</th>
    <th scope="col">DELETE or UPDATE</th>
  </tr>
</thead>
<tbody>';
while ($row = mysqli_fetch_assoc($res)) {
  echo ' <tr>
  <th scope="row">'.$row["id"].'</th>
  <td>'.$row["cus_fname"].'</td>
  <td>'.$row["cus_lname"].'</td>
  <td>'.$row["cus_amount"].'</td>
  <td>'.$row["cus_quantity"].'</td>
  <td scope="col"><a href="index4.php?did='.$row["id"].'">Delete</a>
  <a href="update4.php?uid='.$row["id"].'">Update</a 
  </td>
</tr>';
}
echo '</tbody>
         </table>';






?>