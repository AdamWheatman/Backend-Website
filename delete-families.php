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
        
    ?>

    <form method = "POST" action = "delete-families.php" class = delete_form>
        <label>Enter The ID For The Family You Would Like To Delete: </label>
        <input type = "text" name = "ID" placeholder = "Enter Family ID: ">  
        <input type = "submit" name = "submission"> 
    </form>
  
  
<p>
    <?php
        if(isset($_POST['submission'])){
            if (is_numeric($_POST['ID'])){
                $F_ID = $_POST['ID'];
                $sql = "DELETE FROM Family WHERE Family_Id = $F_ID";
                $result = mysqli_query($link, $sql);

                if (!$result){
                    echo "Error";
                }else{
                    echo "<h1> Family Deleted Successfully </h1>";
                }
            }else{
                Echo "Please Enter A Number";
            }
        }
    ?>
</p>
  <table cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> Family_Id </td> 
            <td> Student Id </td> 
            <td> Parent 1 </td> 
            <td> Parent 2  </td> 
        </tr>

        <?php 
            $sql_family = "SELECT Family_Id, Student_Id, `Parent-1`, `Parent-2` FROM Family";
            $result = $link->query($sql_family);
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