<?php;

function connection(){
    if(isset($_POST["submit"])){
        return mysqli_connect("localhost", "root", "", "mysqlcreate");

    }
}




?>


