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

    <form method = "POST" class="form" action = "new-parents.php">

        <p class="input">
            Enter The Parents Email Address: <br>
            <input type="email" class ="input__box" name = "Email" 
            placeholder="Email" required>
        </p>

        <p class="input">
            Enter The Parents First Name: <br>
            <input type="text" class ="input__box" name = "FName" 
            placeholder="First Name" required>
        </p> 

        <p class="input">
            Enter The Parents Second Name: <br>
            <input type="text" class ="input__box" name = "LName" 
            placeholder="Second Name" required>
        </p> 

        <p class="input">
            Enter The Parents Date Of Birth: <br>
            <input type="date" class ="input__box" name = "DOB" required>
        </p>

        <p class="input">
            Enter The Parents Home Phone Number: <br>
            <input type="tel" class ="input__box" name = "HPhone" 
            placeholder="Home Phone Number">
        </p>

        <p class="input">
            Enter The Parents Mobile Phone Number: <br>
            <input type="tel" class ="input__box" name = "MPhone" 
            placeholder="Mobile Phone Number" required>
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

        if ($link === false) {
            die("Connection failed: ".mysqli_connect_error());
        }

        if (isset($_POST['submit'])) {
            $email = $_POST['Email'];
            $sname = $_POST['FName'];
            $lname = $_POST['LName'];
            $DOB = $_POST['DOB'];
            $hphone = $_POST['HPhone'];
            $mphone = $_POST['MPhone'];

            $sql = "INSERT INTO Parents (Email, First_Name, Last_Name, Date_Of_Birth, Home_Phone, 
            Mobile_Phone) VALUES ( '$email', '$sname','$lname', '$DOB', '$hphone', '$mphone')";

            $result = mysqli_query($link, $sql);

            if (!$result){
                echo mysqli_error($link);
            }else{
                echo "<script> alert('You Have Added A New Parent') </script>";
            }
        }
        require_once 'footer.php';

    ?>
</body>
</html>