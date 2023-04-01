<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rishton Academy Primary School</title>
    <link rel="stylesheet" href="base.css">
</head>
<body>
    <!-- Start of Body -->
    <?php 
        require_once 'header.php';
        $servername = "sdb-57.hosting.stackcp.net";
        $username = "student27-3530313565eb";
        $password = "ua92-studentAc";
        $dbname = "student27-3530313565eb";

        $link = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT Parent_Id, Email, First_Name, Last_Name, Date_Of_Birth,
        Home_Phone, Mobile_Phone FROM Parents";

    ?>

    <table cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> Parent Id </td> 
            <td> Email </td>
            <td> First_Name </td> 
            <td> last Name </td> 
            <td> Date Of Birth </td> 
            <td> Home Phone </td>
            <td> Mobile Phone </td> 
        </tr>

        <?php 
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["Parent_Id"];
                    $Email = $row["Email"];
                    $FName = $row["First_Name"];
                    $LName = $row["Last_Name"]; 
                    $DOB = $row["Date_Of_Birth"];
                    $HPhone = $row["Home_Phone"];
                    $MPhone = $row["Mobile_Phone"]; 
                    echo '<tr> <td>'.$id.'</td> <td>'.$Email.'</td> <td>'.
                    $FName.'</td><td>'.$LName.'</td> <td>'.$DOB.'</td> <td>'.
                    $HPhone.'</td> <td>'.$MPhone.'</td> </tr>';
                }
            }
        ?>
    </table>

    <!-- End of Body -->
    <?php 
        require_once 'footer.php';
    ?>
</body>
</html>