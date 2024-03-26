
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Calculo de Salário</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body> 
    <h1>Calcular Salário</h1>

    <form method="post" action="">
        <h2>Coloque suas informações para calcular a soma dos seus bônus por meta</h2>
        <br>
        <p>Nome: <br><input name="nome" type="text"></p>
        <p>Salário: <br><input name="salario1" type="number"></p>
        <p>Meta Semanal: <br><input name="meta_semanal" type="number"></p>
        <p>Meta Mensal: <br><input name="meta_mensal" type="number"></p>
        <br>
        <h2>Coloque suas irformações</h2>
        <br>
        <p>O quanto que você vendeu por semana: <br><input name="total_semanal" type="number"></p>
        <p>O quanto que você vendeu por mês: <br><input name="total_mensal" type="number"></p>
        <button type="submit">Calcular</button>
    </form>

    <br>
    <br>

    <?php
    if(isset($_POST['salario1'], $_POST['nome'], $_POST['meta_semanal'], $_POST['meta_mensal'],
     $_POST['total_mensal'], $_POST['total_semanal'])){
        $nome = $_POST['nome'];
        $salario1 = $_POST['salario1'];
        $meta_semanal = $_POST['meta_semanal'];
        $meta_mensal = $_POST['meta_mensal'];

        $bonus_semanal = 0;
        if(isset($_POST['total_semanal'])){
            $total_semanal = $_POST['total_semanal'];
            if($total_semanal >= $meta_semanal){
                $bonus_semanal += $meta_semanal * 0.01;
                $excedente_semanal = $total_semanal - $meta_semanal;
                $bonus_semanal += $excedente_semanal * 0.05;
            }
        }
    

        $bonus_mensal = 0;
        if(isset($_POST['total_mensal'])){
            $total_mensal = $_POST['total_mensal'];
            if($total_mensal > $meta_mensal){
                $excedente_mensal = $total_mensal - $meta_mensal;
                $bonus_mensal += $excedente_mensal * 0.10;
            }
        }

        $salario2 = $salario1 + $bonus_semanal + $bonus_mensal;

        echo "<p>Nome: $nome</p>";
        echo "<p>Bônus Semanal: R$ " . number_format($bonus_semanal, 2) . "</p>";
        echo "<p>Bônus Mensal: R$ " . number_format($bonus_mensal, 2) . "</p>";
        echo "<h2>O salário do(a) $nome é de " . number_format($salario2, 2) . "</h2>";
    }
    else {
        echo "<p>Por favor, preencha todos os campos.</p>";
    }
    ?>
</body>
</html>