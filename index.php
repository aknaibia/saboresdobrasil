<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saep"; // Substitua pelo nome do seu banco de dados

// Criando conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta ao banco de dados
$sql = "SELECT foto, titulo, prato, local, cidade, empresa_id FROM publicacao";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabores da Terra</title>
    <link rel="stylesheet" href="style_index.css">
</head>
<body>
    <header>
        <h1>Sabores da Terra</h1>
    </header>
    <main>
        <section class="publicacoes">
            <?php
            // Exibindo os dados obtidos da consulta
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="publicacao">
                        <img src="' . $row["foto"] . '" alt="Imagem do prato">
                        <h2>' . $row["titulo"] . '</h2>
                        <p>Prato: ' . $row["prato"] . '</p>
                        <p>Local: ' . $row["local"] . '</p>
                        <p>Cidade: ' . $row["cidade"] . '</p>
                        <p>Empresa: ' . $row["empresa"] . '</p>
                    </div>';
                }
            } else {
                echo "<p>Sem publicações disponíveis.</p>";
            }

            // Fechando conexão
            $conn->close();
            ?>
        </section>
    </main>
    <footer>
        <p>Copyright - 2024</p>
    </footer>
</body>
</html>