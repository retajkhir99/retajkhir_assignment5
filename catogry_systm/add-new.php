
<?php
if (isset($_POST["submit"])) {
include "db_conn.php";
// create short variable names
$name = $_POST['name'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$comment = $_POST['comment'];
$date = $_POST['date'];
$id_user=$_POST['id_user'];
//
require 'db_conn.php';
if ($conn->connect_error) {
echo "<p>Error: Could not connect to database.<br/>
Please try again later.</p>";
die($conn -> error);
}

$duplicate=mysqli_query($conn,"SELECT * FROM categories WHERE name = '$name' ");
if(mysqli_num_rows($duplicate) > 0){
echo
die("name no taken"); 
}
else{
$query = "INSERT INTO categories (id_user,date,comment,name,amount,type)  VALUES ('$id_user','$date','$comment','$name','$amount', '$type')";
  
$result = $conn->query($query);

if ($result) {
   header("Location: index.php?msg=New record created successfully");
} else {
   echo   $conn -> error ;
   echo   "<br/>.The item was not added.";
   echo    "<br/>$query ";
}
}
//close connection
$conn -> close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>Add Categories</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   Categories
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Categories</h3>
         <p class="text-muted">Complete the form below to add a new Categories</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Name:</label>
                  <input type="text" class="form-control" name="name" placeholder="Name Categories...">
               </div>

               <div class="col">
                  <label class="form-label">Id User:</label>
                  <input type="number" class="form-control" name="id_user" placeholder="Name Categories...">
               </div>

               <div class="col">
                  <label class="form-label">type:</label>
                  <input type="text" class="form-control" name="type" placeholder="Type Expenses or Inside ">
               </div>

               <div class="col">
                  <label class="form-label">Date:</label>
                  <input type="date" class="form-control" name="date" placeholder="Enter date.... ">
               </div>

            </div>

            <div class="mb-3">
               <label class="form-label">amount:</label>
               <input type="number" class="form-control" name="amount" placeholder="Enter Amount...">
            </div>
  
            <div class="mb-3">
               <label class="form-label">Comment:</label>
               <input type="comment" class="form-control" name="comment" placeholder="Enter Comment...">
            </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>