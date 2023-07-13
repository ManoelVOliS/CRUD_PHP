<?php 

include 'secured.php';

$id = $_GET['id'];

$fp = fopen('funcionarios.csv', 'r');

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $id){
        $found = true;
        $data = $row;
    }
}

if(!$found){
    header('location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Funcionario nome <?= $data[0] ?></h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data[0]?>">
        <input type="text" name="name" placeholder="name" value="<?= $data[0]?>">
        <input type="text" name="cargo" placeholder="cargo" min="1" value="<?= $data[1]?>">
        <input type="text" name="departamento" placeholder="departamento" value="<?= $data[2]?>">
        <input type="number" name="salario" placeholder="salario" min="1" value="<?= $data[3]?>">
        <input type="date" name="data" placeholder="data da contratação" value="<?= $data[4]?>">        
        <button>Save</button>
    </form>
</body>

<style>
    body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

input[type="text"], input[type="number"],input[type="date"],input[type="currency"], select {
  padding: 10px;
  margin: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box;
}

button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #3e8e41;
}

a {
    display: block;
    text-align: right;
    margin: 10px;
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
</html>