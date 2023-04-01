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
    <?php 
        require_once 'header.php';
        $servername = "sdb-57.hosting.stackcp.net";
        $username = "student27-3530313565eb";
        $password = "ua92-studentAc";
        $dbname = "student27-3530313565eb";

        $link = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT Family_Id, Student_Id, `Parent-1`, `Parent-2` FROM Family";

    ?>

    <table cellspacing="2" cellpadding="2" > 
        <tr> 
            <td> Family_Id </td> 
            <td> Student Id </td> 
            <td> Parent 1 </td> 
            <td> Parent 2  </td> 
        </tr>

        <?php 
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $f_id = $row["Family_Id"];
                    $s_id = $row["Student_Id"];
                    $parent_1 = $row["Parent-1"];
                    $parent_2 = $row["Parent-2"]; 
                    echo '<tr> <td>'.$f_id.'</td> <td>'.$s_id.'</td> <td>'.
                    $parent_1.'</td><td>'.$parent_2.'</td> </tr>';
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