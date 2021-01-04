<?php include './db.php';


    if(connection()){
        $username = $_POST["username"];
        $first_name = $_POST["first_name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if($username && $first_name && $surname && $email && $password){
            $query = "INSERT INTO users(username, firstName, surname, email, password)";
            $query .= "VALUES('$username', '$first_name', '$surname', '$email', '$password')";

            $result = mysqli_query(connection(), $query);
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






    // Newsletter functionality
    if(isset($_POST["submit_newsletter"])){
        // Establish connection to database
        $connection = mysqli_connect("localhost", "root", "", "mysqlcreate");

        // Create form data variables
        $newsletter_name = $_POST["name_newsletter"];
        $newsletter_email = $_POST["email_newsletter"];

        // Check to ensure user entered data
        if($newsletter_name && $newsletter_email){
            // Check to see if there is a connection to the database
            if($connection){
                // Create query strings
                $query = "INSERT INTO newsletter(name, email)";
                $query .= "VALUES ('$newsletter_name', '$newsletter_email')";

                // Send query to database
                $result = mysqli_query($connection, $query);

                // Check to see if the data was successfully sent to the database 
                if(!$result){
                    die("Error submitting data to database. Please try again later.");
                }
            } else {
                die("Error while connecting to database. Please try again later.");
            }
        } else {
            echo "Please enter your information to complete the form";
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


    <!-- Newsletter form -->
   <form action="./mysql_create.php" method="POST">
        <p>Sign up to our newsletter! it's full of great suprises!</p>
        <!-- Name -->
        <label for="name_newsletter">Name:</label>
        <input type="text" name="name_newsletter" id="name_newsletter">

        <br>

        <!-- Email -->
        <label for="email_newsletter">Email:</label>
        <input type="email" name="email_newsletter" id="email_newsletter">

        <br>

        <input type="submit" name="submit_newsletter" value="Submit">
   </form>

    
</body>
</html>