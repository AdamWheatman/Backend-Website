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

    <form method = "POST" class="form" action = "new-teachers.php">

        <p class="input">
            Enter The Teachers Email Address: <br>
            <input type="email" class ="input__box" name = "Email" 
            placeholder="Email" autocomplete="off" required>
        </p>

        <p class="input">
            Enter The Teachers Password: <br>
            <input type="password" class ="input__box" name = "Password" 
            placeholder="Password">
        </p>


        <p class="input">
            Enter The Teachers First Name: <br>
            <input type="text" class ="input__box" name = "FName" 
            placeholder="First Name" required>
        </p> 

        <p class="input">
            Enter The Teachers Second Name: <br>
            <input type="text" class ="input__box" name = "LName" 
            placeholder="Second Name" required>
        </p> 

        <p class="input">
            Enter The Teachers Date Of Birth: <br>
            <input type="date" class ="input__box" name = "DOB" required>
        </p>

        <p class="input">
            Enter The Teachers Home Phone Number: <br>
            <input type="tel" class ="input__box" name = "HPhone" 
            placeholder="Home Phone Number">
        </p>

        <p class="input">
            Enter The Teachers Mobile Phone Number: <br>
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

        if (isset($_POST['submit'])) {
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            $sname = $_POST['FName'];
            $lname = $_POST['LName'];
            $DOB = $_POST['DOB'];
            $hphone = $_POST['HPhone'];
            $mphone = $_POST['MPhone'];


            $sql = "INSERT INTO Teachers (Email, Password, First_Name, Last_Name, Date_Of_Birth, 
            Home_Phone, Mobile_Phone) 
            VALUES( '$email', '$password' ,'$sname','$lname', '$DOB', '$hphone', '$mphone')";

            $result = mysqli_query($link, $sql);

            if (!$result){
                echo mysqli_error($link);
            }else{
                echo "<h1> You Have Successfully Added a new Teacher </h1>";
            }
        }
        require_once 'footer.php';
    ?>
</body>
</html>