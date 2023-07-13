<?php 

include 'secured.php';

$id = $_POST['id'];
$name = $_POST['name'];
$cargo = $_POST['cargo'];
$departamento = $_POST['departamento'];
$salario = $_POST['salario'];
$data = $_POST['data'];

$tempFile = tempnam('.', '');

$fpTemp = fopen($tempFile, 'w');
$fpOriginal = fopen('funcionarios.csv', 'r');

while(($row = fgetcsv($fpOriginal)) !== false){
    if($row[0] != $id){
        fputcsv($fpTemp, $row);
    } else{
        fputcsv($fpTemp, [$name,$cargo,$departamento,$salario,$data,$id]);
        
    }
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'funcionarios.csv');

header('location: index.php');

?>