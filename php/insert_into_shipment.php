<!DOCTYPE html>
<html>

<?php include '../static/html/head.html'; ?>




<body>
    <?php
        include 'connect_to_db.php';
    ?>

    <?php
        try {
            if(isset($_POST['sno'])) {
            
            }
            if(isset($_POST['pno'])) {
            
            }
            if(isset($_POST['qty'])) {
            
            }
            if(isset($_POST['price'])) {
            
            } 
        } catch(PDOException $e){
            
        }
    ?>
    
    
    <section class="hero is-info is-fullheight">
        <div class="hero-head">
           <?php include '../static/html/navbar.html'; ?>
        </div>
        <div class="hero-body">
            <div class="column is-4 is-offset-4">
                <h3 class="title">Insert Into Shipment</h3>
                <div class="box">

                    <form method="POST">

                        <div class="field">
                            <div class="control">
                                <div class="select" >
                                    <select name="sno">
                                    <?php
                                        $query = $conn->prepare('SELECT Sno FROM supplier');
                                        $query->execute();

                                        while ($row = $query->fetch(PDO::FETCH_ASSOC))
                                        {
                                            echo "<option>" . $row['Sno'] . "</option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="field">
                            <div class="control">
                                <div class="select">
                                    <select name="pno">
                                    <?php
                                        $query = $conn->prepare('SELECT Pno FROM part');
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
                                <input class="input" name="qty" type="text" placeholder="Qty">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input" name="price" type="text" placeholder="Price">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-info">Insert Data</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>