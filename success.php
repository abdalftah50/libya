<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم التسجيل بنجاح</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            padding: 20px;
        }

        .message {
            background-color: #e0ffe0;
            padding: 20px;
            border: 1px solid #4CAF50;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>تم التسجيل بنجاح!</h1>

    <div class="message">
        <p>شكرًا لك، <strong><?php echo htmlspecialchars($_GET['name']); ?></strong>، لقد تم تسجيلك بنجاح في المسابقة.</p>
        <p>رقمك الإشاري هو: <strong><?php echo htmlspecialchars($_GET['idNumber']); ?></strong></p>
        <p>سيتم التواصل معك عبر البريد الإلكتروني أو الهاتف.</p>
    </div>

</body>
</html>