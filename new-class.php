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

    <form method = "POST" class="form" action = "new-class.php">

        <p class="input">
            Enter The Teachers ID: <br>
            <input type="text" class ="input__box" name = "T_ID" 
            placeholder="Teachers ID Number" required>
        </p>

        <p class="input">
            Enter The Enroll ID: <br>
            <input type="text" class ="input__box" name = "E_ID" 
            placeholder="Enrollment ID Number">
        </p>


        <p class="input">
            Enter The Year: <br>
            <input type="text" class ="input__box" name = "Year" 
            placeholder="First Name" required>
        </p> 

        <p class="input">
            Enter The Grade: <br>
            <select class ="input__box" name = "Grade" required>
                <option value = "Reception">Reception</option> 
                <option value = "Year One">Year One</option>  
                <option value = "Year Two">Year Two</option> 
                <option value = "Year Three">Year Three</option> 
                <option value = "Year Four">Year Four</option> 
                <option value = "Year Five">Year Five</option> 
                <option value = "Year Six">Year Six</option> 
            </select>
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
            $T_ID = $_POST['T_ID'];
            $E_ID = $_POST['E_ID'];
            $Year = $_POST['Year'];
            $Grade = $_POST['Grade'];


            $sql = "INSERT INTO Class (Teacher_Id, Enroll_Id, Year, Name_Of_Grade) VALUES 
            ( '$T_ID', '$E_ID', '$Year', '$Grade')";

            $result = mysqli_query($link, $sql);

            if (!$result){
                echo "Error";
            }else{
                echo "<h1> Class Added Successfully </h1>";
            }
        }
        require_once 'footer.php';
    ?>
</body>
</html>
