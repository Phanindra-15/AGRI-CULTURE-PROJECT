<?php
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];

  //database connection
 

$conn = new mysqli('localhost','root','','testdata');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO contactdb (firstname,lastname,email,subject) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$firstname,$lastname,$email,$subject);
    $output =$stmt->execute();
    echo $output;
    echo "<h2> registration successfully...</h2>";
    echo "<h2>returning to login page</h2>";
    header('Location: home.html');
    $stmt->close();
    $conn->close();

}
?>