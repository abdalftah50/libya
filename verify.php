<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verificationId = htmlspecialchars($_POST['verificationId']);

    $file = 'data.txt';
    $contents = file_get_contents($file);

    if (strpos($contents, "رقم تسجيل: $verificationId") !== false) {
        echo "<!DOCTYPE html>
        <html lang='ar'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>تحقق من التسجيل</title>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f0f8ff;
                    color: #333;
                }
                .container {
                    max-width: 700px;
                    margin: 50px auto;
                    background: #ffffff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                }
                h1 {
                    text-align: center;
                    color: #007bff;
                    margin-bottom: 20px;
                }
                p {
                    text-align: center;
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>تم التحقق بنجاح!</h1>
                <p>رقم تسجيلك: <strong>$verificationId</strong></p>
                <p>شكرًا لتسجيلك. سيتم إدخالك في السحب.</p>
            </div>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html lang='ar'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>تحقق من التسجيل</title>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f0f8ff;
                    color: #333;
                }
                .container {
                    max-width: 700px;
                    margin: 50px auto;
                    background: #ffffff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                }
                h1 {
                    text-align: center;
                    color: #dc3545;
                    margin-bottom: 20px;
                }
                p {
                    text-align: center;
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>رقم تسجيل غير صحيح</h1>
                <p>لم يتم العثور على رقم التسجيل. يرجى التحقق من الرقم وإعادة المحاولة.</p>
            </div>
        </body>
        </html>";
    }
}
?>
