<?php
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password=$_POST['confirm_password'];

  //database connection
 

$conn = new mysqli('localhost','root','','testdata');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO registration(firstname,lastname,gender,email,password,confirm_password) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$firstname,$lastname,$gender,$email,$password,$confirm_password,);
    $output =$stmt->execute();
    echo $output;
    echo "<h2> registration successfully...</h2>";
    echo "<h2>returning to login page</h2>";
    header('Location: home.html');
    $stmt->close();
    $conn->close();

}
?>