<!DOCTYPE html>
<html>
    <head>
        <title>Phone Book</title>
    </head>
    <body>
        <?php /*
            include './php/config.php';
            if ($conn) {
                echo "DB Connection successful";
            }
            if (mysqli_query($conn, "INSERT INTO `contacts` (contact_name, contact_number) VALUES ('test1', 'test1-number')")) {
                echo "added test";
            } */
        ?>
        <h1>Phone Book</h1>
        <form action="./php/add.php" method="post">
            Name: <input type="text" name="contact-name">
            Phone: <input type="text" name="contact-number">
            <input type="submit" name="contact-submit">
        </form>
        <div id="contacts">
        
        </div>
    </body>
</html>