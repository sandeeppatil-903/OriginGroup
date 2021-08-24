<?php
$server = "localhost";
$username ="root";
$password ="";
$dbname ="form";

$conn = mysqli_connect($server,$username,$password,$dbname);
if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile'])&& !empty($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $message = $_POST['message'];

         $email_from ='origingroup@gmail.com';

        $email_subject = 'New Form Submission';

        $email_body = "User Name: $name.\n".
               "User Email: $visitor_email.\n".
                "Mobile: $mobile.\n".
                "User Message: $message .\n";         

        $to = 'origintraining@gmail.com';

        $headers = "From: $email_from \r\n";

        $headers .= "Reply-To: $visitor_email \r\n";

        mail($to,$email_subject,$email_body,$headers);

        header("Location: thanku.html");

        $query = "insert into information(name,email,mobile,message) values('$name','$email','$mobile','$message')";

        $run = mysqli_query($conn, $query) or die(mysqli_error());

        if ($run) {
            echo "Form submitted successfully";
        } else {
            echo "Form not submitted";
        }
    }
    else{
        echo "all fields required";
    }
}
      
?>