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
        $sql = "SELECT Class_Id, Teacher_Id, Enroll_Id, Year, Name_Of_Grade FROM Class";

    ?>

    <table cellspacing="2" cellpadding="2" > 
        <tr> 
            <td> Class Id </td> 
            <td> Teacher Id </td> 
            <td> Enrollment Id </td> 
            <td> Year </td> 
            <td> Grade </td> 
        </tr>

        <?php 
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $c_id = $row["Class_Id"];
                    $t_id = $row["Teacher_Id"];
                    $e_id = $row["Enroll_Id"];
                    $year= $row["Year"];
                    $grade = $row["Name_Of_Grade"]; 
                    echo '<tr> <td>'.$c_id.'</td> <td>'.$t_id.'</td> <td>'.$e_id.'</td> <td>'.
                    $year.'</td><td>'.$grade.'</td> </tr>';
                }
            }
        ?>
    </table>
  
  <table cellspacing="2" cellpadding="2" > 
        <tr> 
            <td> Enrollment Id </td> 
            <td> Student - 1 </td> 
            <td> Student - 2 </td> 
            <td> Student - 3 </td> 
        </tr>

        <?php 
            $sql_2 = "SELECT Enroll_Id, `Student-1`, `Student-2`, `Student-3` FROM Enroll";
            $result2 = $link->query($sql_2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $e_id = $row2["Enroll_Id"];
                    $s1 = $row2["Student-1"];
                    $s2 = $row2["Student-2"];
                    $s3= $row2["Student-3"];
                    echo '<tr> <td>'.$e_id.'</td> <td>'.$s1.'</td> <td>'.$s2.'</td><td>'.
                    $s3.'</td></tr>';
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