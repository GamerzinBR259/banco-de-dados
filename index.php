<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "author" content="Victor Baccon">
    <title>Formulario php sql</title>
</head>
<body>
  <!-- incluir formulario para enviar dados ao php -->
  <form action="index.php" method="post">
  Nome :<input type="text" name="n" ><br>
  Email : <input type="text" name="e" ><br>
  Mensagem : <input type="text" name="m" ><br>
  <input type="submit" value="Enviar"><br>
</form>

<?php 
$nome =$_POST["n"];
$email =$_POST["e"];
$mensagem =$_POST["m"];
echo "Nome:" . $nome . "<br>";
echo "Email:" . $email . "<br>";
echo "Mensagem:" . $mensagem . "<br>";

$servername = "localhost";
$username = "contato";
$password = "123";
$db = "contato";


$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error) {
  die("Conexão com o banco de dados falhou :(" . $conn->connect_error);
}


$sql = "INSERT INTO nomes (nome, email, mensagem)
VALUES ('$nome', '$email', '$mensagem')";

if ($conn->query($sql) === TRUE) {
  echo "Conectado ao banco de dados com sucesso! :)";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


</body>
</html>