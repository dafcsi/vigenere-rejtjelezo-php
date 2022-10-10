
<?php
function betu_titkosit($elsobetu,$masodikbetu){
    //megadjuk a szótárat, ezt fogja a program felhasználni a diagramm elkészítéséhez.
    $eredeti = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9",".",",","?",";","!",":","'",'"',"(",")","[","]","+","-","/","\ ","%","=","*","_","{","}","@","&","#","$","<",">"," ");
    
    $betuk = $eredeti;
    $sorszam = 0;
    $main_array =array();
    array_push($main_array,$betuk);  
    //a while függvény a szótár hosszáig működik.
     while($sorszam != count($eredeti)){ 
        //a program az első betűt hozzáadja a tömbhöz, majd kitörli az első betűt, így megkapjuk a 2. sor-t például
        array_push($betuk,$betuk[0]);
        array_shift($betuk);
        //hozzáadjuk a fő tömbbe a létrehozott sort.
        array_push($main_array,$betuk);
        $sorszam++;
    }
    // a return megkeresi a két betűnek az indexét az eredeti szótárban és ezt adja vissza .
    return $main_array[array_search($elsobetu, $eredeti)][array_search($masodikbetu, $eredeti)];
}
function titkosit($szoveg,$kulcs){
    
    $titkositott ="";
    //feldaraboljuk a szöveget betűkre, és nagybetűssé tesszük.
    $torzs1 =  str_split(str_replace(' ', '', strtoupper($szoveg)));
    $torzs2 = "";
    //mivel a kulcs nem feltétlenül olyan hosszú mint a szöveg, ezért csak addig fut a while mint a szöveg hossza.
    while(strlen($torzs2) < count($torzs1)){
        $torzs2 = $torzs2 . str_replace(' ', '', strtoupper($kulcs));
    }
    $torzs2 = str_split($torzs2);
    // a for meghívja a betű titkosítás függvényt minden betűnél, és a visszatérő titkosított betűt tárolja és visszaadja
    for ($i=0; $i < count($torzs1); $i++) { 
        $betu = betu_titkosit($torzs1[$i],$torzs2[$i]);
        $titkositott = $titkositott . $betu;
    }
    return $titkositott;
}
function megfejt_betu($betu1,$betu2){
    // itt is megadjuk az alap szótárat, ami fontos hogy ugyan azokat az elemeket tartalmazza mint a titkosítás függvény.
    $eredeti = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9",".",",","?",";","!",":","'",'"',"(",")","[","]","+","-","/","\ ","%","=","*","_","{","}","@","&","#","$","<",">"," ");
    $betuk = $eredeti;
    $sorszam = 0;
    $main_array =array();
    $megfejtett_betu = "";
    array_push($main_array,$betuk);  
    // a titkosításhoz hasonlóan itt is létrehozzuk a fő tömböt.
     while($sorszam != count($eredeti)){ 
        array_push($betuk,$betuk[0]);
        array_shift($betuk);
        array_push($main_array,$betuk);
        $sorszam++;
    }
    // a foreach megkeresi az eredetileg titkosított betű és a kulcsból következtethető eredeti betűt.
    foreach ($main_array[array_search($betu2, $eredeti)] as $key => $value) {
        if($value == $betu1){
            $megfejtett_betu = $eredeti[$key];
        }
    }
    //végül visszaadja a megfejtett betűt
    return $megfejtett_betu;
}
function megfejt($szoveg,$kulcs){
    //hasonló a titkosítás függvény működéséhez.
    $megfejtett ="";
    $torzs1 =  str_split(str_replace(' ', '', strtoupper($szoveg)));
    $torzs2 = "";
    while(strlen($torzs2) < count($torzs1)){
        $torzs2 = $torzs2 . str_replace(' ', '', strtoupper($kulcs));
    }
    $torzs2 = str_split($torzs2);
    //a for végigmegy a betűkön és eltárolja a megjfejtett betűket.
    for ($i=0; $i < count($torzs1); $i++) { 
        $betu = megfejt_betu($torzs1[$i],$torzs2[$i]);
        $megfejtett = $megfejtett . $betu;
    }
    //végül visszaadja a megfejtett szöveget.
    return $megfejtett;

}
//példa
$test = titkosit("Megtamadtak minket az 1X4Y13Z mezon","Titkos kulcs");
echo $test;
echo "<br>";
echo megfejt($test,"Titkos kulcs");

?>