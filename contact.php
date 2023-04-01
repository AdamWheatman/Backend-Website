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
    <form method = "post" action = "contact.php">
    
        <p class = input>
            Please Enter Your First Name : 
            <input type = "text" name = "FName" class = "input__box"
            placeholder = "First Name:" requried> 
        </p>
        
        <p class = input>  
            Please Enter Your Last Name :
            <input type = "text" name = "LName" class = "input__box" 
            placeholder = "Last Name:" requried>
        </p> 
        
        <p class = input>
            Please Enter Your Email Address :
            <input type = "text" name = "Email" class = "input__box" 
            placeholder = "Email Address:" requried>
        </p>
        
        <p class = input>
            Please Enter Your Message :
            <textarea name = "message" class = "input__box" requried></textarea>
        </p>
        
        <p class = input>
            <input type = "submit" name = "submission"> 
        </p>  
        
    </form>

    <?php 
    if (isset($_POST['submission'])){
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $Email = $_POST['Email'];
        $Message = $_POST['message'];

        // I Know This Section Looks Awful But I Can't Change It.
        // Changing It Will Mess Up The Formatting Of The Email
        // And I Would Prefer The Email To Look Good Rather Than The Code Itself
    
        mail($Email, "Thank You For Contacting Us", "Dear ". $FName. " " .$LName. "," .
          "  
          
".
"This is an automated email of acknowledgement sent out because you have filled in the Contact Form on our Webpage 
          
          
Here is The Message that we recieved:" . "



". $Message . "


"."Yours Sincerely,
        Rishton Academy Primary School" );
    }
  
    ?>  
  
  P.S. 
  This will send out an actual email so put in a real email address to test it out <br><br>
  
  P.P.S 
  If you have filled in the form and have not recieved an email, check your Spam / Junk folder 
  <br><br>
  
  P.P.P.S
  This will only work if the server that your using to host the website has a built in mailing server. This was tested using the SwiftWebHost which was able to send emails so it may not work when you try it 
    <!-- End of Body -->

    <?php 
        require_once 'footer.php';
    ?>
</body>
</html>