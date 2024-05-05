<?php
require("config.php");
session_start();
if(isset($_POST["sbt"])){
    $name=$_POST["name"];
    if($name==""){
        header("Location:login.html");
    }
    $sql="SELECT `id` FROM `users` WHERE `name`='$name';";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_array($res);
        $_SESSION["id"]=$row[0];
        
        header("Location:index.php");
    }
    else{
        $sql="INSERT INTO `users`(`name`) VALUES ('$name');";
        mysqli_query($con,$sql);
        $row=mysqli_fetch_array(mysqli_query($con,"SELECT `id` FROM `users` WHERE `name`='$name';"));
        $_SESSION["id"]=$row[0];
        
        header("Location:index.php");

    }
    
}

?>