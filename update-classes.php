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

    <form method = "POST" class="form" action = "update-classes.php">
      
        <p class="input">
            Enter The Class ID: <br>
            <input type="text" class ="input__box" name = "C_ID" 
            placeholder="Class ID Number" required>
        </p>
     
        <p class="input">
            Enter The Teachers ID: <br>
            <input type="text" class ="input__box" name = "T_ID" 
            placeholder="Teachers ID Number" required>
        </p>
      
        <p class="input">
            Enter The Student ID: <br>
            <input type="text" class ="input__box" name = "S_ID" 
            placeholder="Students ID Number">
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
        require_once 'footer.php';
        
        $servername = "sdb-57.hosting.stackcp.net";
        $username = "student27-3530313565eb";
        $password = "ua92-studentAc";
        $dbname = "student27-3530313565eb";
        
        $link = mysqli_connect($servername, $username, $password, $dbname);
        
        if ($link === false) {
            die("Connection failed: ".mysqli_connect_error($link));
        }

        if (isset($_POST['submit'])) {
            $C_ID = $_POST['C_ID'];
            $T_ID = $_POST['T_ID'];
            $S_ID = $_POST['S_ID'];
            $Year = $_POST['Year'];
            $Grade = $_POST['Grade'];
            

            $sql = "UPDATE Class SET Teacher_Id = '$T_ID', Student_Id = '$S_ID', Year = '$Year ',
            Name_Of_Grade = '$Grade' WHERE Class_Id = $C_ID";
            echo $sql;
            $result = mysqli_query($link, $sql);
            
            if (!$result){
                echo mysqli_error($link);
            }else{
                echo "<h1> Class Updated Succefully </h1>";
            }
        }
    ?>
</body>
</html>