<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function Registration($EmailID,$Registration_number){
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username = "nominationform2023@gmail.com";
        $mail->Password = "jgrktjkomejfqtid";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('nominationform2023@gmail.com', 'Registration Complete for ICAI 40 Under 40 - CA Business Leaders Awards');
        $mail->addAddress($EmailID);

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Registration Complete for ICAI 40 Under 40 - CA Business Leaders Awards";
        $mail->Body = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thank You for Participating - ICAI 40 Under 40 - CA Business Leaders Awards</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    color: #333;
                    line-height: 1.6;
                    margin: 0;
                    padding: 0;
                    background-color: #d9d4d4a3;
                }
                .email-container {
                    background-color: #ffffff;
                    margin: 20px auto;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    max-width: 600px;
                }
                h1 {
                    color: #0056b3;
                    font-size: 22px;
                }
                p {
                    margin: 10px 0;
                }
                .footer {
                    margin-top: 20px;
                    font-size: 12px;
                    color: #777;
                    text-align: center;
                }
                .footer a {
                    color: #0056b3;
                    text-decoration: none;
                }
                .footer a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class="email-container" style="border: 1px solid;background: #fff8f88f;">
                <h1>Dear Member,</h1>
                <p>Thank you for participating in the first-ever ICAI 40 Under 40 - CA Business Leaders Awards conducted by ICAI.</p>
                <p>We acknowledge the receipt of your nomination form for the Awards. Your Registration Number is <strong>'.$Registration_number.'</strong>.</p>
                <p>In case of any additional information requirement, our team will contact you on your given contact number.</p>
                <p>Best regards,</p>
                <p><strong>ICAI Awards Team</strong></p>
                <div class="footer">
                    <p>© 2024 ICAI. All rights reserved.</p>
                    <p><a href="https://www.icai.org/post/16567">Privacy Policy</a> | <a href="https://www.icai.org/post/contact-us">Contact Us</a></p>
                </div>
            </div>
        </body>
        </html>';    

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function ForgotPassword($username , $fotgotOTP){
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username = "nominationform2023@gmail.com";
        $mail->Password = "jgrktjkomejfqtid";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('nominationform2023@gmail.com', 'Forgot Password for ICAI 40 Under 40 - CA Business Leaders Awards');
        $mail->addAddress($username);

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Forgot Password for ICAI 40 Under 40 - CA Business Leaders Awards";
        $mail->Body = '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Your OTP Code</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        color: #333;
                        line-height: 1.6;
                        margin: 0;
                        padding: 0;
                        background-color: #f7f7f7;
                    }

                    .email-container {
                        background-color: #ffffff;
                        margin: 20px auto;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        max-width: 600px;
                    }

                    h1 {
                        color: #0056b3;
                        font-size: 22px;
                    }

                    p {
                        margin: 10px 0;
                    }

                    .otp {
                        display: block;
                        font-size: 28px;
                        margin: 20px 0;
                        padding: 10px;
                        background-color: #f0f0f0;
                        border-radius: 5px;
                        text-align: center;
                        color: #0056b3;
                        font-weight: bold;
                        letter-spacing: 2px;
                    }

                    .footer {
                        margin-top: 20px;
                        font-size: 12px;
                        color: #777;
                        text-align: center;
                    }

                    .footer a {
                        color: #0056b3;
                        text-decoration: none;
                    }

                    .footer a:hover {
                        text-decoration: underline;
                    }
                </style>
            </head>

            <body>
                <div class="email-container" style="border: 1px solid;background: #fff8f88f;">
                    <h1>Your OTP Code</h1>
                    <p>Dear Member,</p>
                    <p>Your One-Time Password (OTP) for verification is:</p>
                    <p class="otp">'. $fotgotOTP .'</p> <!-- Replace with actual OTP -->
                    <p>Please use this code to complete your verification.</p>
                    <p>If you did not request this code, please ignore this email.</p>
                    <p>Best regards,</p>
                    <p><strong>ICAI Awards Team</strong></p>
                    <div class="footer">
                        <p>© 2024 ICAI. All rights reserved.</p>
                        <p><a href="https://www.icai.org/post/16567">Privacy Policy</a> | <a
                                href="https://www.icai.org/post/contact-us">Contact Us</a></p>
                    </div>
                </div>
            </body>

            </html>';    

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function CreateAccount($email , $name){
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username = "nominationform2023@gmail.com";
        $mail->Password = "jgrktjkomejfqtid";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('nominationform2023@gmail.com', 'Account Created Successfully for ICAI 40 Under 40 - CA Business Leaders Awards');
        $mail->addAddress($email);

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Account Created Successfully for ICAI 40 Under 40 - CA Business Leaders Awards";
        $mail->Body = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Account Created Successfully</title><style>body {font-family: Arial, sans-serif;color: #333;line-height: 1.6;margin: 0;padding: 0;background-color: #f7f7f7;}.email-container {background-color: #ffffff;margin: 20px auto;padding: 20px;border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);max-width: 600px;}h1 {color: #0056b3;font-size: 24px;margin-bottom: 20px;}p {margin: 10px 0;}.login-button {display: inline-block;padding: 10px 20px;background-color: #28a745;color: #ffffff;text-decoration: none;border-radius: 5px;font-size: 16px;font-weight: bold;margin: 20px 0;text-align: center;}.login-button:hover {background-color: #218838;}.footer {margin-top: 20px;font-size: 12px;color: #777;text-align: center;}.footer a {color: #0056b3;text-decoration: none;}.footer a:hover {text-decoration: underline;}</style></head><body><div class="email-container" style="border: 1px solid;"><h1>Account Created Successfully!</h1><p>Dear '. $name .',</p><p>Your account has been successfully created with ICAI Awards. We are excited to have you on board!</p><p>Click the button below to log in to your account:</p><p style="text-align: center;"><a href="https://acpltest.co.in/icai/" target="_blank" class="login-button text-white">Log in to Your Account</a>
        </p><p>If you did not create this account, please ignore this email.</p><p>Best regards,</p><p><strong>ICAI Awards Team</strong></p><div class="footer"><p>2024 ICAI Awards. All rights reserved.</p><p><a href="https://www.icai.org/post/16567" target="_blank">Privacy Policy</a> | <a href="https://www.icai.org/post/contact-us" target="_blank">Contact Us</a></p></div></div></body></html>';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
