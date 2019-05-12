<?php 
    session_start();
    include('header.php');
?>

    <!-- +++++ Projects Section +++++ -->

    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>BAGGER DAVE'S</h3>
                <hr>
                <p>Bagger Dave's is an American Tavern restaurant chain that was founded in Michigan in 2008. 
                The restaurant specializes in Craft Burgers, beer and also sells macaroni and cheese, 
                chili, beer, wine, and bourbon.</p>
            </div>
        </div>
        <div class="row mt centered">   
            <div class="col-lg-8 col-lg-offset-2">
                <p><img class="" src="assets/img/portfolio/5.jpg" alt="" style="position: centered"></p>
                <br>
                <h3 id="menu">MENU</h3>
                <br>
                <br>
                <table border="2">
                    <tr>
                        <td style="font-size: 20px"><b>food name</b></td>
                        <td style="font-size: 20px"><b>ingradients</b></td>
                        <td style="font-size: 20px"><b>price €</b></td>
                        <?php 
                            if (isset($_SESSION["login_user"])) {
                                echo "<td style='font-size: 20px'><b>quantity</b></td>";
                            }
                        ?>
                    </tr>


                    <?php 
                        $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                        $sql = "select * from meals where restaurant_id='5'";
                        $result = $conn->query($sql);
                        $n = $result->num_rows;

                        if ($result->num_rows > 0) {
                        // output data of each row
                            $i = 0;
                            while($row = $result->fetch_assoc()) {
                                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                                echo "<tr>";
                                echo "<td>".$row["meal_name"]."</td>";
                                echo "<td>".$row["ingradients"]."</td>";
                                echo "<td>".$row["price"]."</td>";
                                if (isset($_SESSION["login_user"])) {
                                    echo "<td><input type='number' id='".$row['id']."' size='2' min='1' max='20' value='1'></td>";
                                    echo "<td><a href='restaurant05.php?food_id=".$row["id"]."'><img src='assets\img\shopping_cart.png'></a></td>";
                                }
                                echo "</tr>";
                            }
                        }

                        if (isset($_GET["food_id"])) {
                            if (!isset($_SESSION["sum"])) {
                                $_SESSION["sum"] = 0;
                            }
                            if (!isset($_SESSION["counter"])) {
                                $_SESSION["counter"] = 0;
                            }
                            $fid = $_GET["food_id"];
                            $sql2 = "select price from meals where id='".$fid."'";
                            $result = $conn->query($sql2);
                            $row = $result->fetch_assoc();
                            //echo $row["price"];
                            $_SESSION["sum"] += $row["price"];
                            $_SESSION["counter"]++;
                            //echo "TOTAL: " . $_SESSION["sum"];    
                            echo '<script>document.location.replace("restaurant05.php#menu");</script>';            
                        }
                    ?>


                </table>

            </div>
        </div><!-- /row -->
    </div><!-- /container -->

<?php 
    include('footer.php');
?>