<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifyId = htmlspecialchars($_POST['verifyId']);

    // قراءة بيانات الملف
    $file = 'data.txt';
    $contents = file_get_contents($file);

    // البحث عن الرقم التعريفي في الملف
    $pattern = "/رقم تعريفي: $verifyId/";
    if (preg_match($pattern, $contents)) {
        echo "<!DOCTYPE html>
<html lang='ar'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>التحقق</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            color: #28a745;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>رقم التعريفي صحيح!</h1>
        <p>بياناتك موجودة وتم التحقق منها.</p>
        <p><a href='index.html'>الرجوع إلى النموذج</a></p>
    </div>
</body>
</html>";
    } else {
        echo "<!DOCTYPE html>
<html lang='ar'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>التحقق</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            color: #dc3545;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>رقم التعريفي غير صحيح!</h1>
        <p>لم يتم العثور على البيانات. يرجى التحقق من الرقم وإعادة المحاولة.</p>
        <p><a href='verify.php'>الرجوع إلى صفحة التحقق</a></p>
    </div>
</body>
</html>";
    }
}
?>
