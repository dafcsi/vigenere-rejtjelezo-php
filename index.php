<?php
function betu_titkosit($elsobetu,$masodikbetu){
    $eredeti = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9",".",",","?",";","!",":","'",'"',"(",")","[","]","+","-","/","\ ","%","=","*","_","{","}","@","&","#","$","<",">"," ");
    
    $betuk = $eredeti;
    $sorszam = 0;
    $main_array =array();
    array_push($main_array,$betuk);  
     while($sorszam != 35){ 
        array_push($betuk,$betuk[0]);
        array_shift($betuk);
        array_push($main_array,$betuk);
        $sorszam++;
    }
    return $main_array[array_search($elsobetu, $eredeti)][array_search($masodikbetu, $eredeti)];
}
function titkosit($szoveg,$kulcs){
    
    $titkositott ="";
    $torzs1 =  str_split(str_replace(' ', '', strtoupper($szoveg)));
    $torzs2 = "";
    while(strlen($torzs2) < count($torzs1)){
        $torzs2 = $torzs2 . str_replace(' ', '', strtoupper($kulcs));
    }
    $torzs2 = str_split($torzs2);
    for ($i=0; $i < count($torzs1); $i++) { 
        $betu = betu_titkosit($torzs1[$i],$torzs2[$i]);
        $titkositott = $titkositott . $betu;
    }
    return $titkositott;
}
function megfejt_betu($betu1,$betu2){
    $eredeti = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9",".",",","?",";","!",":","'",'"',"(",")","[","]","+","-","/","\ ","%","=","*","_","{","}","@","&","#","$","<",">"," ");
    $betuk = $eredeti;
    $sorszam = 0;
    $main_array =array();
    $megfejtett_betu = "";
    array_push($main_array,$betuk);  
     while($sorszam != 35){ 
        array_push($betuk,$betuk[0]);
        array_shift($betuk);
        array_push($main_array,$betuk);
        $sorszam++;
    }
    ;
    foreach ($main_array[array_search($betu2, $eredeti)] as $key => $value) {
        if($value == $betu1){
            $megfejtett_betu = $eredeti[$key];
        }
    }
    return $megfejtett_betu;
}
function megfejt($szoveg,$kulcs){
    $megfejtett ="";
    $torzs1 =  str_split(str_replace(' ', '', strtoupper($szoveg)));
    $torzs2 = "";
    while(strlen($torzs2) < count($torzs1)){
        $torzs2 = $torzs2 . str_replace(' ', '', strtoupper($kulcs));
    }
    $torzs2 = str_split($torzs2);
    for ($i=0; $i < count($torzs1); $i++) { 
        $betu = megfejt_betu($torzs1[$i],$torzs2[$i]);
        $megfejtett = $megfejtett . $betu;
    }
    return $megfejtett;

}

$test = titkosit("Megtamadtak minket az 1X4Y13Z mezon","Titkos kulcs");
echo $test;
echo "<br>";
echo megfejt($test,"Titkos kulcs");

?>