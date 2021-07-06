<?php

include ('./HemingClass.php');

$heming = $_POST['heming'];
$hem = new HemingClass($heming, false);
$heming_right = $hem->updateHemingCode();
$mistakes_quantity = $hem->findMistakes($heming);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Mistakes</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form class = "main-container">
<a class = "back-button" href = "#" onclick="history.back();">Back</a>
<h1>Heming Code</h1>
<h2>by Valery Selivanova</h2>
<?php
    echo '<p> Code with mistake: <br> <br>'.$heming.'</p>';
    echo '<p> Code with right control bits: <br> <br>'.implode($heming_right).'</p>';
    echo '<p> Right code: <br> <br>'.implode($hem->heming).'</p>';
    echo '<p> Mistake is on position '.$mistakes_quantity.'</p>';

?>
</form>
    
</body>
</html>