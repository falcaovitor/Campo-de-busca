<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca</title>
    <link rel="stylesheet" href="css/busca.css">
</head>
<body>
    <?php

        include 'inc/conexao.php';

        if(empty($_GET['busca'])){
            header('location: index.php');
        }
        
        $busca = $_GET['busca'];
        $consulta = $conexao->query("SELECT * FROM produtos WHERE produto LIKE CONCAT('%', '$busca', '%') OR descricao LIKE CONCAT('%','$busca','%' );");
        if($consulta->rowCount()==0){
            header('location: erro.php');
        }
    ?>
        <div class="container">

        
            <div class="menu">
                <h1>Resultado:</h1>
                <a href="index.php">Voltar</a>
            </div>
        
            <div class="content">
            <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="card">
                    <b>Produto:</b>   
                    <p><?php echo mb_strimwidth($exibe['produto'],'0','20','...'); ?></p>
                    <b>Valor:</b> 
                    <p><?php echo number_format($exibe['preco'],2,',','.'); ?></p>
                </div>
            <?php } ?> 
            </div>
        
        </div>

    
</body>
</html>