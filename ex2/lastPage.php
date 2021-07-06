<?php
include ('./HemingClass.php');
include ('./TextHemingClass.php');

$hem = $_POST['heming'];
$heming_code = trim(str_replace(' ', '', $_POST['heming']));
$heming = new TextHemingClass($heming_code, false);
$heming->saveText($heming_code);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go home</title>
</head>
<body>

<h1>Thank you for work. You may go <a href = "index.php">Home</a></h1>
    
</body>
</html>