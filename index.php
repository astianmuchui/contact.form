<?php
$recepient = "astianseb730@gmail.com";
$subject = "Web form submission";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$submit = $_POST['submit'];
$body = '<div class="mess">
<h1>Contact request</h1><h4>Name</h4><p>'.$name.'</p><h4>Email</h4><p>'.$email.'</p><h4>Message</h4><p>'.$message.'</p></div>';
    if(isset($_POST['submit'])){
        //start validating
        #make sure our fields are not empty
            if(empty($name) && empty($email) && empty($message)){
                echo '<div class="error">
                <h1>Please fill in all fields</h1>
            </div>';
                }
        //Make sure we have a valid email
                        if(filter_var('$email' , FILTER_VALIDATE_EMAIL) === true){
                                return true;
                            }else{
                                echo '<div class="error">
                                <h1>Please use a valid email</h1>
                                </div>';
                            }
                        //Validation over #
                        if(!empty($name) && !empty($email) && !empty($message)){
                            mail($recepient,$subject,$body);       
                        }
                        if(mail($recepient,$subject,$body)){
                            echo '<div class="sucess"><h2>Mail has been sent to agent please wait for reply</h2></div>';
                        }
    }else{
        echo '<div class="error"><h2>ERR: could not connect to mail server</h2></div>';
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Test mail server </title>
</head>
<body>
    <div class="contact">
        <form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="POST">
        <label for="text">Name</label> <br> <br>
        <input type="text" name="name" placeholder="name"> <br> <br>
        <label for="email">Email</label> <br> <br>
        <input type="email" name="email" id="email" placeholder="email"> <br> <br>
        <label for="message">Message</label> <br> <br>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="message"></textarea> <br> <br>
        <input type="submit" value="submit form" name="submit">
    </form>
    </div>
    
</body>
</html>