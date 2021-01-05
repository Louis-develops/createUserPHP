<?php include "db.php" ?>
<?php include "functions.php"; ?>




<?php include "includes/header.php"; ?>

<form action="./mysql_delete.php" method="POST">
    <select name="id-delete">
        <?php deleteDatabaseRecord(); ?>
    </select>

    <input type="submit" name="submit-delete" value="Delete User">

</form>

<?php include "includes/footer.php"; ?>