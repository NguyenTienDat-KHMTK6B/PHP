<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Product</title>
</head>
<body>
    <?php
        require_once "BT3_DBproset.php";
        $dbProduct = new DBProduct();
        $dbProduct->ConnectDB();
        $dbProduct->ShowProduct();
    ?>
</body>
</html>
