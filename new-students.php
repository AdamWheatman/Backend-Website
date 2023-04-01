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
    ?>
    <!-- Start of Body -->

    <form method = "POST" class="form" action = "new-students.php">

        <p class="input">
            Enter The Students First Name: <br>
            <input type="text" class ="input__box" name = "FName" 
            placeholder="First Name" required>
        </p> 

        <p class="input">
            Enter The Students Second Name: <br>
            <input type="text" class ="input__box" name = "LName" 
            placeholder="Second Name" required>
        </p> 

        <p class="input">
            Enter The Students Home Phone Number: <br>
            <input type="tel" class ="input__box" name = "HPhone" 
            placeholder="Home Phone Number">
        </p>

        <p class="input">
            Enter The Students Mobile Phone Number: <br>
            <input type="tel" class ="input__box" name = "MPhone" 
            placeholder="Mobile Phone Number" required>
        </p>
      
        <p class="input">
            Enter The Students Medical Information: <br>
            <input type="text" class ="input__box" name = "Medical" 
            placeholder="Medical Info: " required>
        </p>

        <p class="input">
            Enter The Students Start Date: <br>
            <input type="date" class ="input__box" name = "Start_date" >
        </p>
      
        <p class="input">
            Enter The Students Date Of Birth: <br>
            <input type="date" class ="input__box" name = "DOB" required>
        </p>
      
        <button type = "submit" name = "submit">
            Submit Form
        </button>
    </form>


    <!-- End of Body -->

    <?php  
        $servername = "sdb-57.hosting.stackcp.net";
        $username = "student27-3530313565eb";
        $password = "ua92-studentAc";
        $dbname = "student27-3530313565eb";
    
        $link = mysqli_connect($servername, $username, $password, $dbname);

        if (isset($_POST['submit'])) {

            $sname = $_POST['FName'];
            $lname = $_POST['LName'];
            $DOB = $_POST['DOB'];
            $hphone = $_POST['HPhone'];
            $mphone = $_POST['MPhone'];
            $DOJ = $_POST['Start_date'];
            if ($_POST['Medical'] == NULL){
              $Medical = "N/A";
            }else{
              $Medical = $_POST['Medical'];
            }

            $sql = "INSERT INTO Students (First_Name, Last_Name, Date_of_Birth, 
            Home_Phone, Mobile_Phone, Medical_Information, Date_Of_Joining) VALUES 
            ('$sname','$lname', '$DOB', '$hphone', '$mphone', '$Medical', '$DOJ')";

            $result = mysqli_query($link, $sql);

            if (!$result){
                echo mysqli_error($link);
            }else{
                echo "<h1> Successfully Added a New Student </h1>";
            }
        }
        require_once 'footer.php';
    ?>
</body>
</html>