<?php

    include ('./HemingClass.php');
    include ('./TextHemingClass.php');

    $heming = new TextHemingClass('Lera', true);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heming code. Work with Textfiles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="saveFiles.php" method="post">
        <h1>Welcome to Heming-webapp. Here you can work with text files.</h1>
        <h2>Text from text file</h2>
        <textarea disabled name="text" id="" rows="50">   
        <?php  echo $heming->readText();  ?>
        </textarea>

        <h2>Text from text file in binary</h2>
        <textarea disabled name="binary" id="" rows="50">   
        <?php  echo $heming->makeBlocks($heming->bin);  ?>
        </textarea>

        <h2>Text from text file in Heming code</h2>
        <textarea name = "heming" id="" rows="50">   
        <?php  echo $heming->makeBlocks(implode($heming->createHemingCode()));  ?>
        </textarea>

        <button type = "submit">Save</button>
    </form>
    
</body>
</html>