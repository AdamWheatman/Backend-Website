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

    <form method ="POST" action= "update-parents.php">
        <p class="input">
            Enter The Parents ID: <br>
            <input type="text" class ="input__box" name = "parent_id" 
            placeholder="Parents ID" required>
        </p>
      
        <p class = "input">
            Enter The Parents Email Address: <br> 
            <input type="email" class ="input__box" name = "Email" 
            placeholder="Parents Email Address" required> 
        </p>

        <p class="input"> Enter The Parents First Name: <br>
            <input type="text" class ="input__box" name = "FName" 
            placeholder="First Name" required> 
        </p>
  
        <p class = "input">
            Enter The Parents Second Name: <br> 
            <input type="text" class ="input__box" name = "LName" 
            placeholder="Second Name" required> 
        </p> 

        <p class = "input">Enter The Parents Home Phone Number: <br> 
            <input type="tel" class ="input__box" name = "HPhone" 
            placeholder="Home Phone Number">
        </p>

        <p class = "input">Enter The Parents Mobile Phone Number: <br>   
            <input type="tel" class ="input__box" name = "MPhone" 
            placeholder="Mobile Phone Number" required> 
        </p>
      
        <p class = "input">Enter The Parents Date Of Birth: <br> 
            <input type="date" class ="input__box" name = "DOB" required>   
        </p>

        <button type = "submit" name = "submit">
            Submit Form
        </button>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $P_ID = $_POST['parent_id'];
            $Email = $_POST['Email'];
            $FName = $_POST['FName'];
            $LName = $_POST['LName'];
            $DOB = $_POST['DOB'];
            $HPhone = $_POST['HPhone']; 
            $MPhone = $_POST['MPhone'];
            $sql = "UPDATE Parents SET Email = '$Email' ,First_Name = '$FName',
            Last_Name = '$LName',  Date_Of_Birth = '$DOB',Home_Phone = '$HPhone', 
            Mobile_Phone = '$MPhone' WHERE Parent_Id = $P_ID";
            if ($link->query($sql) === TRUE) {
                echo "<h1> Record updated successfully </h1>";
            } 
        }
        require_once 'footer.php';
    ?>
</body>
</html>