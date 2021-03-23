<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './assets/php-mailer/Exception.php';
require './assets/php-mailer/PHPMailer.php';
require './assets/php-mailer/SMTP.php'; 

// define variables to empty values  
$nameErr = $lastnameErr = $genderErr = $emailErr = $countryErr = $subjectErr = $textareaErr = "";  
$name = $lastname = $gender = $email = $country = $subject = $textarea ="";  

//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  

    //name string Validation  
    if (empty($_POST["name"])) {  
        $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
            else if (!filter_var($name, FILTER_SANITIZE_STRING)) {  
                $nameErr = "Invalid name format";  
            }  
    }  

    //lastname string Validation 
    if (empty($_POST["lastname"])) {  
        $lastnameErr = "Lastname is required";  
    } else {  
        $lastname = input_data($_POST["lastname"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {  
                $lastnameErr = "Only alphabets and white space are allowed";  
            }  
            else if (!filter_var($lastname, FILTER_SANITIZE_STRING)) {  
                $lastnameErr = "Invalid lastname format";  
            }  
    } 
    
    //gender Validation 
    if (empty($_POST["gender"])) {  
        $genderErr = "Gender is required";  
    } else {  
        $gender = input_data($_POST["gender"]);  
        if (!filter_var($gender, FILTER_SANITIZE_STRING)) {  
            $genderErr = "Invalid gender";  
        }  
    } 

    //Email Validation   
    if (empty($_POST["email"])) {  
        $emailErr = "Email is required";  
    } else {  
        $email = input_data($_POST["email"]);  
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {  
            $emailErr = "Invalid email format";  
        }
    }  
    
    //country Validation  
    if (empty($_POST['country'])){  
        $countryErr = "Choose one contry.";  
    } else {  
        $country = input_data($_POST["country"]);  
        if (!filter_var($country, FILTER_SANITIZE_STRING)) {  
            $countryErr = "Invalid country";  
        }  
    }
    //subject Validatio
    if (empty($_POST['subject'])){  
        $subjectErr = "Choose one subject.";  
    } else {  
        $subject = input_data($_POST["subject"]);  
        if (!filter_var($subject, FILTER_SANITIZE_STRING)) {  
            $subjectErr = "Invalid subject";  
        }  
    }  


    if(empty($_POST["textarea"])){
        $textareaErr = "Please enter your comment.";     
    } else{
        $textarea = input_data($_POST["textarea"]);
        if (!filter_var($textarea, FILTER_SANITIZE_STRING)) {  
            $textareaErr = "Invalid textarea";  
        }  
    }

    if (empty($nameErr) && empty($lastnameErr) && empty($genderErr) && empty($emailErr) && empty($countryErr) && empty($subjectErr) && empty($textareaErr) ){
        $mail = new PHPMailer();
        try {
            $mail->IsSMTP();
            $mail->Mailer = "smtp";

            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "itraspberry147@gmail.com";
            $mail->Password   = "123becode";

            $mail->AddAddress("itraspberry147@gmail.com", "Zack");
            $mail->SetFrom("$email", "$name $lastname");
            
            $mail->IsHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = "Name: $name $lastname $gender to :  $country <br>from: $email <br> The content:  $textarea";
            $mail -> send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}  

// help to secure
function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
}  

?>  


<!-- 
//Number Validation  
    if (empty($_POST["mobileno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobileno"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }   -->


    <!-- //URL Validation      
    if (empty($_POST["website"])) {  
        $website = "";  
    } else {  
            $website = input_data($_POST["website"]);  
            // check if URL address syntax is valid  
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {  
                $websiteErr = "Invalid URL";  
            }      
    }  
    -->