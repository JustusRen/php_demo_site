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
                <h3 class="title">Show Supplier Who Shipped Part</h3>
                <div class="box">

                    <form action="" method="POST">

                    <div class="field">
                        <div class="control">
                            <div class="select">
                                <select>
                                <?php
                                    $query = $conn->prepare('SELECT Pno FROM part ORDER BY');
                                    $query->execute();

                                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                                    {
                                        echo "<option>" . $row['Pno'] . "</option>";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-info">Show</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>