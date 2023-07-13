<?php 

session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    header('location: /login.php');
    exit();
}

$fp = fopen('./funcionarios.csv', 'r');

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
    <a href="/logout.php" class="sair">Sair</a>
    <h1>Funcionarios</h1>
        <table>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Departamento</th>
            <th>Salario</th>
            <th>Data da contratação</th>
            <th>Deletar</th>
            <th>Editar</th>
        
        <?php while(($row = fgetcsv($fp)) !== false): ?>
            <tr>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
                <td><?= $row[3] ?></td>
                <td><?= $row[4] ?></td>
                <td>
                    <a href="delete.php?id=<?= $row[0] ?>">Delete</a>
                </td>
                <td>
                    <a href="edit.php?id=<?= $row[0] ?>">Editar</a>
                </td>
            </tr>
        <?php endwhile?>
        </table>
        <h1>Adicionar funcionario</h1>
        <form action="create.php" method="POST">
            <input type="text" name="name" placeholder="nome" min="1">
            <input type="text" name="cargo" placeholder="cargo" min="1">
            <input type="text" name="departamento" placeholder="departamento" min="1">
            <input type="currency" name="salario" placeholder="salario" min="1">
            <input type="date" name="data" placeholder="data da contratação" min="1">
            <button>Salvar</button>
        </form>
</body>

<style>

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.sair{
    display: inline-block;
    padding: 5px 10px;
    background-color: #0077cc;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-left: 1230px;
    margin-top: 20px;
    cursor: pointer;
}
.sair:hover {
    background-color: #035e9e;
}

h1 {
  text-align: center;
}

a {
  display: block;
  margin: 10px;
  text-align: right;
}

table {
  border-collapse: collapse;
  margin: 10px auto;
}

th, td {
  border: 1px solid #ccc;
  padding: 10px;
}

th {
  background-color: #0077cc;
  color: white;
  
}

td a {
  display: inline-block;
  padding: 5px 10px;
  background-color: #ff6666;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  margin-right: 10px;

}

td a:hover {
  background-color: #cc0000;
}

td a:last-of-type {
  margin-right: 0;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr td{
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
  padding: 10px 20px;
  margin: 10px;
  border-radius: 5px;
  border: none;
  background-color: #0077cc;
  color: white;
  font-weight: bold;
  cursor: pointer;
}

button:hover {
    background-color: #035e9e;
}

button:last-of-type {
    margin-right: 0;
}


</style>

</html>