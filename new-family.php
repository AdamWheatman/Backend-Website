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

    <form method = "POST" class="form" action = "new-family.php">

        <p class="input">
            Enter The Students ID: <br>
            <input type="text" class ="input__box" name = "S_ID" 
            placeholder="Students ID Number" required>
        </p>

        <p class="input">
            Enter The Parent 1's ID Number: <br>
            <input type="text" class ="input__box" name = "P1_ID" 
            placeholder="Parent 1's ID Number" required>
        </p> 

        <p class="input">
            Enter The Parents 2's ID Number: <br>
            <input type="text" class ="input__box" name = "P2_ID"
            placeholder="Parent 2's ID Number">
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
            $S_ID = $_POST['S_ID'];
            $P1_ID = $_POST['P1_ID'];

            if($_POST['P2_ID'] == NULL){
                $sql = "INSERT INTO Family (Student_Id, `Parent-1`) VALUES 
                ( '$S_ID', '$P1_ID')";
            }else{
                $P2_ID = $_POST['P2_ID'];
                $sql = "INSERT INTO Family (Student_Id, `Parent-1`, `Parent-2`) VALUES 
                ( '$S_ID', '$P1_ID', '$P2_ID')";
            }

            $result = mysqli_query($link, $sql);

            if (!$result){
                echo "Error";
            }else{
                echo "<h1> Successfully Added a New Family </h1>";
            }
        }

        require_once 'footer.php';
    ?>
</body>
</html>