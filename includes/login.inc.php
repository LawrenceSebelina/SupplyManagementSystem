<?php





if(isset($_POST["submit"])){

     $username = $_POST['username'];
     $password = $_POST['password'];

     require_once 'dbh.inc.php';
     require_once 'function.inc.php';


$sql = "SELECT * FROM users WHERE usersUid='".$username."' AND usersPwd='".$password."'; ";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);


if(emptyInputLogin($username, $password) !== false){
    header("location: ../login.php?error=emptyinput");
    exit();
}else if(emptyInputLogin($username, $password) !== true){
    if($row["usertype"] == "admin"){
        echo header ("location: ../admin/dashboard.php");
    }else if($row["usertype"] == "staff"){
        echo header ("location: ../user/staff.php");
    }else{
        header("location: ../login.php?error=notuser");
        exit();
    }
}








}