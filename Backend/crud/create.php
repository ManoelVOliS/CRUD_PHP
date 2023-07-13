<?php 

session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    header('location: /login.php');
    exit();
}


$name = $_POST['name'];
$cargo = $_POST['cargo'];
$departamento = $_POST['departamento'];
$salario = $_POST['salario'];
$data = $_POST['data'];

$fp = fopen('funcionarios.csv', 'r');

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $name) {
        header('location: index.php');
        exit();
    }
}
fclose($fp);

$fp = fopen('funcionarios.csv', 'a');
if(empty($name) || empty($cargo) || empty($departamento) || empty($salario) || empty($data)) {  
    header('location: index.php?error=emptyfields');
    exit();
}

fputcsv($fp, [$name,$cargo,$departamento,$salario,$data]);


header('location: index.php');

?>