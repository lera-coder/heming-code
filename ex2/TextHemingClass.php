<?php

class TextHemingClass extends HemingClass{

    public $path = './text.txt';

    public function readText(){
        $content = file_get_contents($this->path);
        $this->word = $content;
        $this->convertToHex();
        $this->convertToBin();
        return $content;
    }

    public function makeBlocks($text){
        $elements_quantity = 8;
        return chunk_split($text, $elements_quantity, ' ');

    }

    public function saveText($content){
        file_put_contents($this->path, $content);
    }
    
}




?>