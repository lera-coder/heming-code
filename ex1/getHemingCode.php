<?php
include ('./HemingClass.php');

$name  = $_POST['name'];
$hem = new HemingClass($name, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converted data</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    



<form action="findMistake.php" class = "main-container" method  = "post">
<a class = "back-button" href = "#" onclick="history.back();">Back</a>

<h1>Heming Code</h1>
<h2>by Valery Selivanova</h2>

    <?php 
    echo '<p>В шестнадцатеричной системе: <br> <br>'.$hem->hex.'<br></p>';
    echo '<p>В двоичной системе: <br><br>'.$hem->bin.' <br></p>';    
    ?>


<p>Heming code:<input name = 'heming' value = <?php echo implode($hem->createHemingCode()); ?> ></p>
<button type="submit">Send</button>
</form>




</body>
</html>



