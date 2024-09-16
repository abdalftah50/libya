<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شكرًا على التسجيل</title>
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .form-group button {
            width: 100%;
            padding: 15px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-group button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>شكرًا على التسجيل!</h1>
        <p>رقم تسجيلك في السحب هو: <strong><?php echo htmlspecialchars($_GET['uniqueId']); ?></strong></p>
        <p>يرجى حفظ هذا الرقم للتحقق من تسجيلك لاحقًا.</p>
        <form action="verify.php" method="POST">
            <div class="form-group">
                <label for="verificationId">أدخل رقم تسجيلك للتحقق:</label>
                <input type="text" id="verificationId" name="verificationId" required>
            </div>
            <div class="form-group">
                <button type="submit">التحقق</button>
            </div>
        </form>
    </div>
</body>
</html>
