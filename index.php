<!DOCTYPE html>
<html>
    <head>
        <title>Phone Book</title>
    </head>
    <?php
        include 'php/config.php';
        function deleteNumber($id) {
            $sql = "DELETE FROM `contacts` WHERE `contacts`.`id`='$id'";
            $query = mysqli_query($conn, $sql);
        }

        if (isset($_POST['delete-number'])) {
            $deleteNumberId = $_POST['delete-number'];
            $sql = "DELETE FROM `contacts` WHERE `contacts`.`id`='$deleteNumberId'";
            if ($query = mysqli_query($conn, $sql)) {
                header('Location: index.php?delete=success');
                exit();
            } else {
                header('Location: index.php?delete=error');
                exit();
            }
        }
    ?>
    <body>
        <h1>Phone Book</h1>
        <form action="./php/add.php" method="post">
            Name: <input type="text" name="contact-name">
            Phone: <input type="text" name="contact-number">
            <input type="submit" name="contact-submit">
        </form>
        <div id="contacts">
            <h3>Saved contacts</h3>
            <?php 
                $sql = "SELECT * FROM contacts";
                $query = mysqli_query($conn, $sql);

                if ($query -> num_rows > 0) {
                    while ($row = $query -> fetch_assoc()) { ?>
                        <?php echo "Name: " . $row["contact_name"] . ", Phone: " . $row["contact_number"]; ?>
                        <form style="display: inline-block;" action="index.php" method="POST">
                            <button name="delete-number" value="<?php echo $row['id'] ?>">X</button>
                        </form>
                        <br>
                   <?php }
                } else {
                    echo "0 results";
                }
            ?>
        </div>
    </body>
</html>