<?php include "db.php"; ?>
<?php include "functions.php"; ?>
    
<?php addRecordToDatabase(); ?>


<?php include "includes/header.php"; ?>
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
 
<?php include "includes/footer.php"; ?>