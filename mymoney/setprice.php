<?php

if (isset($_POST['price'])) {
    $con = mysqli_connect("localhost", "root", "", "price");
    $price = $_POST['price'];
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($price <= 450) {
        $sum = 0;
        $sql2 = "SELECT * FROM `salary` where `id`=1";
        $result = $con->query($sql2);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $sum = $row["price"]+$price;
               
            }
        }

       

        $sql = "UPDATE `salary` SET `price`='$sum' where `id`=1";
        if ($con->query($sql) === TRUE) {
            echo $sum;
        } else {
            echo "Error updating record: " . $con->error;
        }
    } else {
        echo "Today Limit Cost";
    }
}
