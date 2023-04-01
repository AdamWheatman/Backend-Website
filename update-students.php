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

    <form method ="POST" action= "update-students.php">
        <p class="input">
            Enter The Students ID: <br>
            <input type="text" class ="input__box" name = "student_id" 
            placeholder="Student ID" required>
        </p>

        <p class="input"> Enter The Students First Name: <br>
            <input type="text" class ="input__box" name = "FName" 
            placeholder="First Name" required> 
        </p>
  
        <p class = "input">
            Enter The Students Second Name: <br> 
            <input type="text" class ="input__box" name = "LName" 
            placeholder="Second Name" required> 
        </p> 

        <p class = "input">Enter The Students Home Phone Number: <br> 
            <input type="tel" class ="input__box" name = "HPhone" 
            placeholder="Home Phone Number">
        </p>

        <p class = "input">Enter The Students Mobile Phone Number: <br>   
            <input type="tel" class ="input__box" name = "MPhone" 
            placeholder="Mobile Phone Number" required> 
        </p>
      
        <p class = "input">Enter The Medical Information: <br>   
            <input type="tel" class ="input__box" name = "Medical" 
            placeholder="Medical Info:" required> 
        </p>
      
        <p class = "input">Enter The Students Date Of Birth: <br> 
            <input type="date" class ="input__box" name = "DOB" required>   
        </p>

        <p class = "input">
            Enter The Students Start Date: <br> 
            <input type="date" class ="input__box" name = "Start_date" > 
        </p>

        <button type = "submit" name = "submit">
            Submit Form
        </button>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $student_id = $_POST['student_id'];
            $FName = $_POST['FName'];
            $LName = $_POST['LName'];
            $DOB = $_POST['DOB'];
            $HPhone = $_POST['HPhone']; 
            $MPhone = $_POST['MPhone'];
            $DOJ = $_POST['Start_date'];
          if ($_POST['Medical'] == Null){
            $Medical = "N/A";
          }else{
            $Medical = $_POST['Medical'];
          }
          
            $sql = "UPDATE Students SET First_Name = '$FName', Last_Name = '$LName', 
            Date_Of_Birth = '$DOB', Home_Phone = '$HPhone', Mobile_Phone = '$MPhone', 
            Medical_Information = '$Medical', Date_Of_Joining = '$DOJ' WHERE Student_Id = 
            $student_id";

            if ($link->query($sql) === TRUE) {
                echo "<h1> Record updated successfully </h1>";
            } 
        }
        require_once 'footer.php';
    ?>
</body>
</html>