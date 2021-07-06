<?php
    include ('./HemingClass.php');
    include ('./TextHemingClass.php');

    $hem = $_POST['heming'];
    $heming_code = trim(str_replace(' ', '', $_POST['heming']));

    $heming = new TextHemingClass($heming_code, false);
    $heming->saveText($heming_code);

    $heming_right = $heming->updateHemingCode();

    $mistakes_quantity = $heming->findMistakes($heming_code);
    $heming_result = $heming->heming;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>You saved it thank you!</title>
</head>
<body>
<form action="lastPage.php" method = "post">
<h1>You saved it thank you!</h1>
<h2>Text from text file(wrong)</h2>

        <textarea disabled name="text" id="" rows="50">   
        <?php  echo $heming->makeBlocks($heming_code) ?>
        </textarea>

        <h2>Text from text file with right control bits</h2>
        <textarea disabled name=""  rows="50">   
        <?php  echo $heming->makeBlocks(implode($heming_right));  ?>
        </textarea>

       <?php echo '<p> Mistake is on position '.$mistakes_quantity.'</p>';?>

        <h2>Text from text file in Heming code</h2>
        <textarea name = "heming" id="" rows="50">   
         <?php  $heming->makeBlocks(implode($heming_result));  ?>
        </textarea>

        <button type = "submit">Send</button>
</form>

    
</body>
</html>