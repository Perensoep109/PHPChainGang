<?php
$conn = new mysqli("localhost", "root", "root", "waken_chaingangfietsen");
$brands = ["Pinarello","Eddy Merckx","BMC","Trek","Specialized","Giant"];
$names = ["Move","Verona","ID personal","Dayly Dutch","E Volution", "Fun Tornado","Cargo","Honey"];
$cato = ["Mannen", "Vrouwen" , "Kinderen"];
$frametype = ["Dames", "Heren", "Lage instap"];
$frameMateriaal = ["Metaal","hout", "plastic","carbon"];
$colors = ["Rood","Geel","Blauw","Groen","Oranje","Aqua","Wit","Zwart"];

for($i = 0; $i < 30; $i++)
{
    $randbrand = array_rand($brands);
    $randname = array_rand($names);
    $randcato = array_rand($cato);
    $randframetype = array_rand($frametype);
    $randframemateriaal = array_rand($frameMateriaal);
    $randcolor = array_rand($colors);

    $bikeprice = 399.00;
    $bikebrand = $brands[$randbrand];
    $bikename = $bikebrand ." ". $names[$randname];
    $bikecatogory = $cato[$randcato];
    $bikeframetype = $frametype[$randcato];
    $bikeframemateriaal = $frameMateriaal[$randframemateriaal];
    $bikecolor = $colors[$randcolor];
    $bikeoms = "Cortina Speed N7 2019 Heren

De Cortina Speed N7 weet waar het om draait; je snel van A naar B kunnen verplaatsen. En hoe kan dat beter dan met een stadsfiets die 7 versnellingen heeft? Deze fiets heeft alles in huis voor een snelle én comfortabele fietstocht, dus waar wacht je nog op?


De lichtgewicht commuter bike

De Speed is rijk uitgerust, maar dit is niet te merken aan het gewicht van deze stadsfiets. Met 18 kg is deze topper namelijk behoorlijk licht. En dat merk je in je snelheid! Om het jou wat gemakkelijker te maken, hebben de banden een anti-leklaag en is de fiets voorzien van rollerbrakes, waarmee je goed kunt remmen.


Voor iedere bestemming

Waar je ook naartoe moet, deze stadsfiets ondersteunt je! Ben je benieuwd of deze fiets bij je past? Dan helpen onze specialisten je graag verder. Ook voor andere vragen zijn onze experts te benaderen via de chat, mail of telefoon. Neem gerust contact met ze op!
";
    $conn->query("INSERT INTO `waken_chaingangfietsen`.`allbikes` (`BIKE_NAME`, `BIKE_PRICE`, `BIKE_BRAND`, `BIKE_FRAMETYPE`, `BIKE_MATERIAL`, `BIKE_CATEGORY`, `BIKE_COLOR`, `BIKE_RELEASEYEAR`, `BIKE_IMAGES`, `BIKE_DESCRIPTION`, `BIKE_ON_SALE`) VALUES ('$bikename' ,'$bikeprice' , '$bikebrand', '$bikeframetype', '$bikeframemateriaal', '$bikecatogory', '$bikecolor', 1999, 'images/cat1.jpg,images/cat2.jpg,images/cat3.jpg,images/cat4.jpg','$bikeoms', 0)");
}