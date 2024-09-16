<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $dob = htmlspecialchars($_POST['dob']);
    $age = htmlspecialchars($_POST['age']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);
    $question1 = htmlspecialchars($_POST['question1']);
    $question2 = htmlspecialchars($_POST['question2']);
    $question3 = htmlspecialchars($_POST['question3']);
    $question4 = htmlspecialchars($_POST['question4']);
    $question4_other = isset($_POST['question4_other']) ? htmlspecialchars($_POST['question4_other']) : '';
    $question5 = htmlspecialchars($_POST['question5']);
    $question5_other = isset($_POST['question5_other']) ? htmlspecialchars($_POST['question5_other']) : '';
    $question6 = htmlspecialchars($_POST['question6']);
    $question6_other = isset($_POST['question6_other']) ? htmlspecialchars($_POST['question6_other']) : '';

    // توليد رقم تعريفي فريد
    $uniqueId = rand(100, 999);

    // التحقق من وجود رقم التعريفي في الملف
    $file = 'data.txt';
    $contents = file_get_contents($file);
    while (strpos($contents, "رقم تسجيل: $uniqueId") !== false) {
        $uniqueId = rand(100, 999); // توليد رقم جديد إذا كان موجودًا
        $contents = file_get_contents($file); // إعادة قراءة الملف بعد كل تغيير
    }

    // حفظ البيانات في ملف نصي بصيغة جدول
    $data = "رقم تسجيل: $uniqueId\tاسم: $name\tتاريخ الميلاد: $dob\tعمر: $age\tبريد إلكتروني: $email\tرقم هاتف: $phone\tكلمة مرور: $password\tسؤال 1: $question1\tسؤال 2: $question2\tسؤال 3: $question3\tسؤال 4: $question4";
    if ($question4_other) $data .= " - أخرى: $question4_other";
    $data .= "\tسؤال 5: $question5";
    if ($question5_other) $data .= " - أخرى: $question5_other";
    $data .= "\tسؤال 6: $question6";
    if ($question6_other) $data .= " - أخرى: $question6_other";
    $data .= "\n";
    file_put_contents($file, $data, FILE_APPEND);

    // إعادة التوجيه إلى صفحة الشكر
    header("Location: thank_you.php?uniqueId=$uniqueId");
    exit();
}
?>
