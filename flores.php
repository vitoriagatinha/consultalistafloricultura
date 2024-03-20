<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "Vit452.,mysql";
$dbname = "floresDB";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT Nome, QuantidadeEmEstoque FROM Flores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Flores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: left;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            font-size: 3.8em; 
        }
        p {
            color: #666;
            line-height: 1.6;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 2.3em; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Flores</h1>
        <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<p><strong>Nome:</strong> " . $row["Nome"]. " - <strong>Quantidade em Estoque:</strong> " . $row["QuantidadeEmEstoque"]. "</p>";
            if ($row["QuantidadeEmEstoque"] < 10) {
              echo "<p style='color: red;'>Deverá comprar mais flores.</p>";
            }
          }
        } else {
          echo "<p>Nenhum resultado encontrado</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>


