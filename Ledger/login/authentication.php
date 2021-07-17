<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<body style=\"background-color:yellow;\">"; 
            echo "<h1 ><center><font color=\"green\"> Login successful</font></center></h1>";
            echo "<h2><p style=”background-color : yellow;”>Here👇, your transaction details</h2>";  
            $sql = "SELECT * FROM customer";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<b>Username: </b>" . $row["username"]. "<br>";
                    echo "<b>Customer Name: </b>" . $row["cname"]. "<br>";
                    echo "<b><font color=\"green\">Paid: </b>Rs." . $row["paid"]. "/-</font><br>";
                    echo "<b><font color=\"red\">Due: </b>Rs." . $row["due"]. "/-</font><br>";
                    echo "<b>Total: </b>Rs." . $row["total"]. "/-<br>";
                    echo "<b>Item Name: </b>" . $row["item_name"]. "<br>";
                    echo "<b>Item Type: </b>" . $row["item_type"]. "<br>";
                    echo "<b>Date: </b>" . $row["date"]. "<br>";
                    echo "<b>Remarks: </b>" . $row["remarks"]. "<br>";
                    echo "<img src=\"7654085237_php.png\" alt=\"Prayash Patel bought php book\" title=\"Prayash Patel bought php book\" width=\"431.5\" height=\"259\">";
                }
            }
            else {
                echo "0 results";
            }
            $con->close();
        }  
        else{  
            echo "<h1><center> Invalid username or password - <font color=\"red\">Login failed</center></font></h1>";  
        }     
?>