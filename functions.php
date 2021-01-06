<?php 

    function addRecordToDatabase(){
        // Allow access to the connection variable in the function scope
        global $connection;
        // Check to make sure form has been submitted
        if(isset($_POST["submit"])){
            // Assign POST variables
            $username = $_POST["username"];
            $first_name = $_POST["first_name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Clean data to prevent sql injection
            $username = mysqli_real_escape_string($connection, $username);
            $first_name = mysqli_real_escape_string($connection, $first_name);
            $surname = mysqli_real_escape_string($connection, $surname);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);
            
            // Encrypt password
            // Hash type
            $hash = "$2y$10$";

            // Create a salt for added encryption complexity
            $salt = "imakesomecrazystrings2";

            // Combine hash and salt
            $hash_and_salt = $hash . $salt;

            // Encrypt password
            $password = crypt($password, $hash_and_salt);

            echo $password;



            // Check that all variables have been assigned
            if($username && $first_name && $surname && $email && $password){
                // Create query
                $query = "INSERT INTO users(username, firstName, surname, email, password) ";
                $query .= "VALUES('$username', '$first_name', '$surname', '$email', '$password' )";

                // Send query to database
                $result = mysqli_query($connection, $query);

                // Check query was successful
                if(!$result){
                    die("Data unsuccessfully sent to the database. Please try again later");
                }
            } else {
                echo '<p class="warning">Please fill in all fields!</p>';
            }
        }
    }

    function readDataFromDatabase(){
        //  Allow access to connection variable in this functions scope
        global $connection;

        if(isset($_POST["read_submit"])){
            // Create query
            $query = "SELECT * FROM users";

            // Send query to database
            $result = mysqli_query($connection, $query);

            if($result){
                
                while($row = mysqli_fetch_assoc($result)){
                    echo "<li>User id: " . $row["id"] . ", Username: " . $row["username"] . ", First Name: " . $row["firstName"] . ", Surname: " . $row["surname"] . ", Email: " . $row["email"] . ", Password: " . $row["password"] . "</li>";
                }
            } else {
                die("Could not retrieve data from database. Please try again later");
            }
        }
    }

    function updateDatabaseRecord(){
        // Allow access to connection variable from function scope
        global $connection;

        // Create query
        $query = "SELECT * FROM users";

        // Send query to database
        $result = mysqli_query($connection, $query);

        // Check to ensure the query succesffuly sent to the database
        if(!$result){
            die("Error sending data to database. Please try again later");
        }

        // Loop through database records and print user ids
        while($row = mysqli_fetch_assoc($result)){
            echo "<option>" . $row["id"] . "</option>";
        }

        // Check for form submission
        if(isset($_POST["submit-update"])){
            // Set variables
            $id = $_POST["id-update"];
            $username = $_POST["username-update"];
            $first_name = $_POST["first_name-update"];
            $surname = $_POST["surname-update"];
            $email = $_POST["email-update"];
            $password = $_POST["password-update"];

            // Clean data to prevent sql injection
            $username = mysqli_real_escape_string($connection, $username);
            $first_name = mysqli_real_escape_string($connection, $first_name);
            $surname = mysqli_real_escape_string($connection, $surname);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);

            // Encrypt password
            // Hash type
            $hash = "$2y$10$";

            // Create a salt for added encryption complexity
            $salt = "imakesomecrazystrings2";

            // Combine hash and salt
            $hash_and_salt = $hash . $salt;

            // Encrypt password
            $password = crypt($password, $hash_and_salt);

            echo $password;
            
            // Create query
            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "firstName = '$first_name', ";
            $query .= "surname = '$surname', ";
            $query .= "email = '$email', ";
            $query .= "password = '$password' ";
            $query .= "WHERE id = $id ";

            // send query to database
            $result = mysqli_query($connection, $query);

            // Check query was successful
            if(!$result){
               echo die("Data unsuccessfully sent to the database. Please try again later");
            }

        }
    }

    function deleteDatabaseRecord(){
        // Allow access to connection variable from function scope
        global $connection;

        // Create query
        $query = "SELECT * FROM users";

        // Send query to database
        $result = mysqli_query($connection, $query);

        // Check to ensure the query succesffuly sent to the database
        if(!$result){
            die("Error sending data to database. Please try again later");
        }

        // Loop through database records and print user ids
        while($row = mysqli_fetch_assoc($result)){
            echo "<option>" . $row["id"] . "</option>";
        }

        // Check for form submittal
        if(isset($_POST["submit-delete"])){
            // assign id variable
            $id = $_POST["id-delete"];

            // Create query
            $query = "DELETE FROM users ";
            $query .= "WHERE id = $id";

            // Send query to database 
            $result = mysqli_query($connection, $query);

            // Check to make sure the query was successful
            if(!$result){
                die("Query failed to send to databse");
            }

        }
    }


?>