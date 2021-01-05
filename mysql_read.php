<?php include "db.php"; ?>
<?php include "functions.php"; ?>




<?php include "includes/header.php" ?>

    <form action="./mysql_read.php" method="POST">
        <input type="submit" name="read_submit" value="Get all Users">
    </form>

    <ul>
        <?php readDataFromDatabase(); ?>
    </ul>
<?php include "includes/footer.php" ?>