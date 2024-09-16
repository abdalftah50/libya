<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التحقق من الرقم الإشاري</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            padding: 20px;
            background-color: #f4f4f9;
            margin: 0;
        }

        h1 {
            color: #4CAF50;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 4px;
            font-size: 16px;
        }

        .success {
            background-color: #e0ffe0;
            color: #4CAF50;
            border: 1px solid #4CAF50;
        }

        .error {
            background-color: #ffe0e0;
            color: #d9534f;
            border: 1px solid #d9534f;
        }
    </style>
</head>
<body>

    <h1>التحقق من الرقم الإشاري</h1>

    <form method="POST" action="">
        <label for="idNumber">الرقم الإشاري</label>
        <input type="text" id="idNumber" name="idNumber" required>

        <label for="password">كلمة المرور</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">تحقق</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // استلام البيانات المدخلة من المستخدم
        $enteredId = $_POST['idNumber'];
        $enteredPassword = $_POST['password'];

        // قراءة البيانات المخزنة من الملف النصي
        $file = 'admin.txt';

        // التحقق من وجود الملف
        if (!file_exists($file)) {
            echo '<div class="message error">الملف غير موجود. تحقق من مسار الملف.</div>';
            exit();
        }

        $data = file($file, FILE_IGNORE_NEW_LINES);

        // تحقق من الرقم الإشاري وكلمة المرور
        $isValid = false;
        $registrantName = '';
        foreach ($data as $line) {
            list($id, $password, $name) = explode(",", $line);
            if ($enteredId == $id && $enteredPassword == $password) {
                $isValid = true;
                $registrantName = $name;
                break;
            }
        }

        if ($isValid) {
            echo '<div class="message success">تم التحقق بنجاح! الرقم الإشاري صحيح وكلمة المرور مطابقة. اسم المسجل: ' . htmlspecialchars($registrantName) . '</div>';
        } else {
            echo '<div class="message error">فشل التحقق! الرقم الإشاري أو كلمة المرور غير صحيحة.</div>';
        }
    }
    ?>

</body>
</html>