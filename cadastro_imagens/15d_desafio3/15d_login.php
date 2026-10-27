<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
</head>
<body>
    <form method="post" action="">
        <h2>Cadastro de Usuários</h2>
        
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <option value="cor">Escolha uma cor: </option>
        <select name="cor" id="cor">
            <option value="verde">Verde</option>
            <option value="amarelo">Amarelo</option>
            <option value="roxo">Roxo</option>
            <option value="vermelho">Vermelho</option>
            <option value="azul-claro">Azul-claro</option>
            <option value="preto">Preto</option>
            <option value="rosa">Rosa</option>
            <option value="cinza">Cinza</option>
            <option value="marrom">Marrom</option>
            <option value="azul-escuro">Azul-escuro</option>
            <option value="branco">Branco</option>
            <option value="laranja">Laranja</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $cor = $_POST['cor'];

        $servername = "localhost"; 
        $username   = "root";
        $password   = "Senai@118";
        $dbname     = "exercicio";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
    

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($sql);
    
    $conn->select_db($dbname);

    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
             id INT AUTO_INCREMENT PRIMARY KEY,
             usuario VARCHAR(100) NOT NULL,
             senha VARCHAR(100) NOT NULL
            )";

$conn->query($sql);

$sql = "INSERT INTO usuarios (usuario, senha, cor) VALUES ('$usuario', '$senha', '$cor')";

if ($conn->query($sql)) {
    echo "<p style='color: darkgreen;'>Usuário cadastrado com sucesso!</p>";
} else {
    echo "<p style='color: red;'>Erro ao cadastrar.</p>";
}

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta usuário no BD
        $sql = "SELECT * FROM usuarios
                WHERE usuario = '$usuario' AND senha = '$senha'";

        $result = $conn->query($sql);

        // Verifica se encontrou o usuário
        if ($result->num_rows > 0) {
            $_SESSION['usuario'] = $usuario;

            header("Location: 15d_perfil.php");
            echo "<script>;
                   window.location.href = '15d_perfil.php';
                 </script>";
                 exit();
        } else {
            echo "<p style='color: red;'>Usuário ou senha incorretos!</p>";
        }
}
?>
</body>
</html>