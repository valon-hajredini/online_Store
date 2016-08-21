<?php
include "models/database/Database.php";
class Email_controller extends Database{
    public $dataase;
    public function __construct(Database $database ){
        $this->dataase = $database;
    }
    public function find_the_user_email($user_id){
        $conn = $this->connectDB();
        $query = "SELECT * FROM `users` where id = $user_id limit 1";
        $result = mysqli_query($conn, $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

    }
    public function html_format_email($content, $user_email){

        $message = '
            <html>
            <head>
              <title>Birthday Reminders for August</title>
            </head>
            <body>
            <h1>Hello from Online Store</h1>
            <h3>from: '.$user_email.'</h3>
            <p>Message: '.$content.'</p>
            </body>
            </html>
            ';
        return $message;
    }
    public function email_selelr($user_email, $seller_email, $email_content){
        $to      = $seller_email;
        $subject = "About Some product";
        $message = $email_content;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
        $headers .= 'To: Mary <'.$to.'>, Kelly <kelly@example.com>' . "\r\n";
        $headers .= 'From: OnlineStore <customer@onlineStore.com>' . "\r\n".
            'Reply-To:'.$user_email.' ' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();;

        mail($to, $subject, $message, $headers);
    }
}



$conn = new Email_controller(new Database());
if (isset($_POST["submit_email"])){
    $user_id = $_POST["user"];
    $seller_email = $_POST["seller_email"];
    $email_content = $_POST["email_content"];
    $user_email = $conn->find_the_user_email($_POST["user"])["email"];

    $email = new Email_controller(new Database());
    if($email->email_selelr($user_email, $seller_email, $email->html_format_email($email_content,$user_email))){
        header("Location: ../product.php?product=".$_POST['product']."&message=success");
    }else{
        header("Location: ../product.php?product=".$_POST['product']."&message=Email_wos_not_sent");
    }

}else{
    echo "Is not submited";
}

