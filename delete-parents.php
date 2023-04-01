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
        
    ?>

    <form method = "POST" action = "delete-parents.php" class = delete_form>
        <label>Enter The ID For The Parent You Would Like To Delete: </label>
        <input type = "text" name = "ID" placeholder = "Enter Parent ID: ">  
        <input type = "submit" name = "submission"> 
    </form>
  
  
<p>
    <?php
        if(isset($_POST['submission'])){
            if (is_numeric($_POST['ID'])){
                $P_ID = $_POST['ID'];
                $sql = "DELETE FROM Parents WHERE Parent_Id = $P_ID";
                $result = mysqli_query($link, $sql);

                if (!$result){
                    echo "Error";
                }else{
                    echo "<h1> Parent Deleted Successfully </h1>";
                }
            }else{
                Echo "Please Enter A Number";
            }
        }       
    ?>
</p>
  
  
  <table cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> Parent ID </td> 
            <td> Email </td> 
            <td> First Name  </td> 
            <td> Last Name  </td>
            <td> Date Of Birth </td> 
            <td> Home Phone  </td> 
            <td> Mobile Phone  </td>
        </tr>

        <?php 
            $sql_family = "SELECT Parent_Id, Email, First_Name, Last_Name, Date_Of_Birth,
            Home_Phone, Mobile_Phone FROM Parents";
    
            $result = $link->query($sql_family);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $p_id = $row["Parent_Id"];
                    $email = $row["Email"];
                    $FName = $row["First_Name"];
                    $LName = $row["Last_Name"]; 
                    $DOB = $row["Date_Of_Birth"]; 
                    $HPhone = $row["Home_Phone"]; 
                    $MPhone = $row["Mobile_Phone"]; 
                  
                    echo '<tr> <td>'.$p_id.'</td> <td>'.$email.'</td> <td>'.
                    $FName.'</td><td>'.$LName.'</td><td>'.$DOB.'</td><td>'.$HPhone.'</td>
                    <td>'.$MPhone.'</td> </tr>';
                }
            }
        ?>
    </table>
  
  <?php 
       require_once 'footer.php';
  ?> 
</body>
</html>