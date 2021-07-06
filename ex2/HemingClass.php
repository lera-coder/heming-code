<?php

class HemingClass {

    public $word = '';
    public $hex = '';
    public $bin = '';
    public $heming = '';
    private $counter = 0;

    //  Конструктор, первый аргкмент это слово в виде двоичного кода или в utf-8
    //  Второй аргумент - булеан, если нам нужна конвертация из utf-8, то он true, если слово в двоичном коде, false
    function __construct($word, $indicator){
        if($indicator){
            $this->word = $word;
            $this->convertToHex();
            $this->convertToBin();
        }
        else{
            $this->bin = $word;
        }
        
    }


    //Конвертируем данные в 16-ричную систему
    protected function convertToHex(){
        $this->hex = bin2hex($this->word);
    }

    //Конвертируем данные в двоичную систему
    protected function convertToBin(){
        $this->bin = base_convert($this->hex, 16, 2);
    }




    //функция для создания кода хемминга из двоичного кода
    public function createHemingCode(){
        $heming = str_split($this->bin); //массив
        $counter = 0;

        //создаем контрольные биты, но пока их не считаем
        for($i = 0; $i< count($heming); $i++){
            if($i == pow(2, $counter)-1){
            array_splice( $heming, $i, 0, '0' );
            $counter++;
            }
            
        }

        $this->counter = $counter;
        return $this->fillHemingCode($heming);
    }


    //Меняем уже существующие биты на нули
    public function updateHemingCode(){

        $heming = str_split($this->bin); //массив
        echo('<br>'.implode($heming));
        $counter = 0;

        //создаем контрольные биты, но пока их не считаем
        for($i = 0; $i< count($heming); $i++){
            if($i == pow(2, $counter)- 1){
            $heming[$i] = 0;
            $counter++;
            }
            
        }

        $this->counter = $counter;
        return $this->fillHemingCode($heming);

    }


    //Заполняем код хеминга правильно
    public function fillHemingCode($heming){
        
        //считаем контрольные биты, здесь массив по количеству раз, когда мы будем проходиться по массиву хеминга
        for($i = 0; $i< $this->counter; $i++){
            $sum = 0;
            $ind = true;

            //номер контрольного бита и интервал с которым будем считать биты
            $interval = pow(2, $i);
            $j = $interval - 1;

                while($j< count($heming)){
                    if($ind){
                        for($z = 0; $z < $interval; $z++){
                            if($j >= count($heming)) break;

                            $sum+= $heming[$j];
                            $j++;
                        }
                        
                    }
                    else{
                    $j+=$interval;
                    }

                    $ind = !$ind;

                }
                
            $heming[$interval - 1] =  ($sum % 2 == 0)? 0 : 1;
            
        }

        $this->heming = $heming;
        return $heming;
    }


    //Ищем ошибки в имеющемся коде и том, что дают
    public function findMistakes($heming1){
        $heming = $this->heming;
        $number = 0;

        for($i = 0; $i < count($heming); $i++){
            if($heming[$i] != $heming1[$i]){
                $number+= $i + 1;
            }
        }

    
        //Если ошибки нет
        if($number != 0){
        $heming1[$number - 1] = ($heming1[$number - 1]==0) ? 1:0;
        }

        $this->heming = str_split($heming1);
        return $number;
    }



    


}



?>