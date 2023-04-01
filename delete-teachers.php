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

    <form method = "POST" action = "delete-teachers.php" class = delete_form>
        <label>Enter The ID For The Teacher You Would Like To Delete: </label>
        <input type = "text" name = "ID" placeholder = "Enter Teachers ID: ">  
        <input type = "submit" name = "submission"> 
    </form>
  
  
<p>
    <?php
        if(isset($_POST['submission'])){
            if (is_numeric($_POST['ID'])){
                $T_ID = $_POST['ID'];
                $sql = "DELETE FROM Teachers WHERE Teacher_Id = $T_ID";
                $result = mysqli_query($link, $sql);

                if (!$result){
                    echo "Error";
                }else{
                    echo "<h1> Parent Deleted Successfully </h1>";
                }
            }else{
                echo "Please Enter a Number";
            }
        }
    ?>
</p>
  
  
  <table cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> Parent ID </td> 
            <td> Email </td> 
            <td> Password  </td>
            <td> First Name  </td> 
            <td> Last Name  </td>
            <td> Date Of Birth </td> 
            <td> Home Phone  </td> 
            <td> Mobile Phone  </td>
            <td> Annual Salary  </td> 
            <td> Background Check  </td>
        </tr>

        <?php 
            $sql_family = "SELECT Teacher_Id, Email, Password,  First_Name, Last_Name,
            Date_Of_Birth, Home_Phone, Mobile_Phone, Annual_Salary, Background_Check FROM 
            Teachers";
    
            $result = $link->query($sql_family);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $t_id = $row["Teacher_Id"];
                    $email = $row["Email"];
                    $pass = $row['Password'];
                    $FName = $row["First_Name"];
                    $LName = $row["Last_Name"]; 
                    $DOB = $row["Date_Of_Birth"]; 
                    $HPhone = $row["Home_Phone"]; 
                    $MPhone = $row["Mobile_Phone"]; 
                    $Salary = $row["Annual_Salary"]; 
                    $BGC = $row["Background_Check"]; 
                  
                  
                    echo '<tr> <td>'.$t_id.'</td> <td>'.$email.'</td> <td>'.
                    $pass.'</td><td>'.$FName.'</td><td>'.$LName.'</td><td>'.$DOB.'</td>
                    <td>'.$HPhone.'</td> <td>'.$MPhone.'</td><td>'.$Salary.'</td>
                    <td>'.$BGC.'</td> </tr>';
                }
            }
        ?>
    </table>
  
  
  <?php 
       require_once 'footer.php';
  ?> 
</body>
</html>