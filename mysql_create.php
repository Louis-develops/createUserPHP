<?php

if(isset($_POST["submit"])){
    $connection = mysqli_connect("localhost", "root", "", "mysqlcreate");

    if($connection){
         $username = $_POST["username"];
        $first_name = $_POST["first_name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if($username && $first_name && $surname && $email && $password){
            $query = "INSERT INTO users(username, firstName, surname, email, password)";
            $query .= "VALUES('$username', '$first_name', '$surname', '$email', '$password')";

            $result = mysqli_query($connection, $query);
            echo "<br>" . $result;
            if(!$result){
                die("Data send unsuccessful");
            }
        } else {
            echo "Data not collected";
        }
    } else {
        die("Error while connecting to database. Please try again later");
    }


    
} 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Practice: MySQL - Create</title>
</head>
<body>

   <form action="./mysql_create.php" method="POST">
        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">

        <br>

        <!-- First Name -->
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name">
        
        <br>

        <!-- Surname -->
        <label for="surname">Surname:</label>
        <input type="text" name="surname" id="surname">
        
        <br>

        <!-- Email -->
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email">
        
        <br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        
        <br>

        <input type="submit" value="Submit" name="submit">
        

   </form>

    
</body>
</html>