<!DOCTYPE html>
<html>

<?php include '../static/html/head.html'; ?>

<body>
    <?php
        include 'connect_to_db.php';
    ?>
    <?php 
         if(array_key_exists('increase', $_POST)) {
            try {
                $sql = "UPDATE supplier SET Status = Status*1.1";
                $query = $conn->prepare($sql);
                $query->execute();
                echo 'Success: Increased status!';
            } catch (Exception $e) {
                echo 'Error: Could not increase status!';
            }
        }
    ?>
    <section class="hero is-info is-fullheight">
        <div class="hero-head">
           <?php include '../static/html/navbar.html'; ?>
        </div>
        <div class="hero-body">
            <div class="column is-4 is-offset-4">
                <h3 class="title">Increase Status</h3>
                <div class="box">
                    <ul>
                        <?php
                            $query = $conn->prepare('SELECT * FROM supplier');
                            $query->execute();

                            while ($row = $query->fetch(PDO::FETCH_ASSOC))
                            {
                                echo "<li>" . "Sno: " . $row['Sno'] . " | Sname: " .  $row['Sname'] . " | Status: " . $row['Status'] . " | City: " . $row['City'] . "</li> <br>";
                            }
                        ?>
                    </ul>
                    <form method="POST">
                        <div class="field">
                            <div class="control">
                                <button name='increase' class="button is-info">Increase Status</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>