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
                                <select name="pno">
                                <?php
                                    $query = $conn->prepare('SELECT Pno FROM part ORDER BY pno');
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
                    <ul>
                        <?php
                            if(isset($_POST['pno'])) {
                                try {
                                    $query = $conn->prepare("
                                    SELECT * 
                                    FROM supplier  
                                    WHERE sno IN    (SELECT sno 
                                                    FROM shipment
                                                    WHERE pno=:id);");
                                    $query->execute(array('id'=>$_POST['pno']));
                                    echo "<br>";
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                                    {
                                        echo "<li>" . "Sno: ". $row['Sno'] . "<br>" .  "Sname: ". $row['Sname'] . "<br>" . "Status: ". $row['Status'] . "<br>" .  "City: ". $row['City'] . "<br><br>" . "</li>";
                                    }
                                } catch (Exception $e) {
                                    echo 'Error: Could execute query!';
                                }
                            }    
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

</html>