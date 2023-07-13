<?php 

include 'secured.php';

$id = $_GET['id'];


$tempFile = tempnam('.', '');
$fpTemp = fopen($tempFile, 'w');

$fpOriginal = fopen('funcionarios.csv', 'r');

while(($row = fgetcsv($fpOriginal)) !== false){
    if($row[0] != $id){
        fputcsv($fpTemp, $row);
    }
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'funcionarios.csv');

header('location: index.php');

?>