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

    <form method = "POST" action = "delete-students.php" class = "delete_form" >
        <label>Enter The ID For The Student You Would Like To Delete: </label>
        <input type = "text" name = "ID" placeholder = "Enter Students ID: " required>  
        <input type = "submit" name = "submission"> 
    </form>

    <?php
        if(isset($_POST['submission'])){
            if (is_numeric($_POST['ID'])){

                $S_ID = $_POST['ID'];
                $sql1 = "DELETE FROM Class WHERE Student_Id = $S_ID";
                $sql2 = "DELETE FROM Family WHERE Student_Id = $S_ID";
                $sql = "DELETE FROM Students WHERE Student_Id = $S_ID";
            
                mysqli_query($link, $sql1);
                mysqli_query($link, $sql2);
                $result = mysqli_query($link, $sql);

                if (!$result){
                    echo "Error";
                }else{
                    echo "<h1> Student Deleted Successfully </h1>";
                }
            }else{
                Echo "Please Enter A Number";
            }
        }
    ?>
  
      <table border="1" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> Student Id </td> 
            <td> First Name </td> 
            <td> Last Name </td> 
            <td> Date of Birth </td> 
            <td> Home Phone </td> 
            <td> Mobile Phone </td>  
            <td> Medical Information </td> 
            <td> Date of Joining </td> 
            <td> Activity Status  </td> 
        </tr>

        <?php 
        
            $name_sql = "SELECT Student_Id, First_Name, Last_Name, Date_Of_Birth, Home_Phone,
            Mobile_Phone, Medical_Information, Date_Of_Joining, Status FROM Students";
        
            $names = $link->query($name_sql);
            if ($names->num_rows > 0) {
                while ($row = $names->fetch_assoc()) {
                    $id = $row["Student_Id"];
                    $FName = $row["First_Name"];
                    $LName = $row["Last_Name"];
                    $DOB = $row["Date_Of_Birth"];
                    $HPhone = $row["Home_Phone"]; 
                    $MPhone = $row["Mobile_Phone"];
                    $Medical = $row["Medical_Information"];
                    $DOJ = $row["Date_Of_Joining"];
                    $Status = $row["Status"]; 
                    echo '<tr> <td>'.$id.'</td> <td>'.$FName.'</td> <td>'.$LName.'</td> 
                    <td>'.$DOB.'</td><td>'.$HPhone.'</td> <td>'.$MPhone.'</td><td>'
                    .$Medical.'</td> <td>'.$DOJ.'</td> <td>'.$Status.'</td> </tr>';
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