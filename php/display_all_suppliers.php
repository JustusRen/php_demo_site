<!DOCTYPE html>
<html>

<?php include '../static/html/head.html'; ?>

<body>
    <?php
        include 'connect_to_db.php';
    ?>
    
    <section class="hero is-info is-fullheight">
        <div class="hero-head">
           <?php include '../static/html/navbar.html'; ?>
        </div>
        <div class="hero-body">
            <div class="column is-4 is-offset-4">
                <h3 class="title">Display All Suppliers</h3>
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
                </div>
            </div>
        </div>
    </section>
</body>

</html>