<?php include "db.php"; ?>
<?php include "functions.php"; ?>


<?php include "includes/header.php"; ?>


    <form action="./mysql_update.php" method="POST">
        <p>Choose user to update</p>

        <select name="id-update" id="id">
            <?php updateDatabaseRecord(); ?>
        </select>

        <br>

        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" name="username-update" id="username">

        <br>

        <!-- First Name -->
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name-update" id="first_name">
        
        <br>

        <!-- Surname -->
        <label for="surname">Surname:</label>
        <input type="text" name="surname-update" id="surname">
        
        <br>

        <!-- Email -->
        <label for="email">Email Address:</label>
        <input type="email" name="email-update" id="email">
        
        <br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" name="password-update" id="password">

        
        <br>

        <input type="submit" name="submit-update" value="Update">
    </form>

    <?php include "includes/footer.php"; ?>