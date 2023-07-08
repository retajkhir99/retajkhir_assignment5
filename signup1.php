<?php
$username = $_POST['username'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$resetpassword = $_POST['resetpassword'];
$gender = $_POST['gender'];

$data=array("$username","$phonenumber","$email","$password","$gender");
$data1=array("User Name : ","Phone Number : ","Email : ","Password : ","gender : ");
    inputusername($username );
    inputpasword($password);
    password($password);
    equalpassword($password,$resetpassword);
   
function inputerrormessage($error)
{
    die("Entry error $error");
}
function inputpasword($password)
{
    if(strlen($password)<10){
        inputerrormessage("Password must be more than 10 characters long");
    }
    else if(strlen($password)>14)
    {
        inputerrormessage("Password must be less than 14 characters long");
    }
}
function inputusername($data)
{
    if(strlen($data)>15){
        die("Username must be less than 15 characters long");
    }
    else if(strlen($data)<10){
        die("Username must be more than 10 characters long");
    }
}
function password($password)
{
    if(!preg_match("/[a-z]/",$password)){
        die("Password must contain lowercase letters");
    }
    else if(!preg_match("/[A-Z]/",$password)){
        die("Password must contain capital letters");
    }
    else if(!preg_match("/[0-9]/",$password)){
        die("The password must contain numbers");
    }
    else if(!preg_match("/[!@#$%^&*<>+]/",$password)){
        die("The password must contain symbols");
    }
}
function equalpassword($password,$resetpassword)
{
    if($password !== $resetpassword){
        die("password must match");
    }
}

if (!isset($_POST['username']) || !isset($_POST['phonenumber']) 
     || !isset($_POST['email']) || !isset($_POST['password'])  || !isset($_POST['resetpassword']) 
      || !isset($_POST['gender'])  ) {
   echo "<p>You have not entered all the required details.<br />
         Please go back and try again.</p>";
   exit;
}

// create short variable names
require 'config.php';

$username = $_POST['username'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$resetpassword = $_POST['resetpassword'];
$gender = $_POST['gender'];

if ($conn->connect_error) {
  echo "<p>Error: Could not connect to database.<br/>
  Please try again later.</p>";
    die($conn -> error);
}

$duplicate=mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' OR email = '$email'");
if(mysqli_num_rows($duplicate) > 0){
    echo
     die("Username or Email no taken"); 
}
else{
    $query = "INSERT INTO users (username,phonenumber,email,password ,gender)  VALUES 
    ( '$username', '$phonenumber', '$email', '$password' , '$gender')" ;
       
    $result = $conn->query($query);
    
    if ($result) {
        header("Location: user_systm/index.php?New record created successfully");
    } else {
        echo   $conn -> error ;
        echo   "<br/>.The item was not added.";
        echo    "<br/>$query ";
    }
    

}
   //close connection
   $conn -> close();

?>
