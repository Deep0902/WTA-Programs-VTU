<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WTA Program 7 - Clock</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #487eb0;
        }
        p{
            color: #dcdde1;
            font-size: 30px;
            text-align: center;
        }
    </style>
    <p>
        <?php
             date_default_timezone_set('Asia/Kolkata');
             echo date(" H: i : s a")
        ?>
    </p>
</head>
<body>
    
</body>
</html>