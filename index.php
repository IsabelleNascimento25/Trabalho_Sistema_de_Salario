
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Calculo de Salário</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="index.css" media='screen' href='main.css'>
    
</head>
<body> 
    <h1>Calcular Salário</h1>

    <form method="post" action="">
        <h2>Coloque as informações da empresa para calcular a soma dos seus bônus por meta</h2>
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
        <div ontouchstart="">
  
        <button name="button" type="submit">Calcular</button>
    </form>
    <!-- Configurando a parte de dentro -->
    <?php

    //pegando os dados e configurando em variaveis para a programação do sistema
    if(isset($_POST['salario1'], $_POST['nome'], $_POST['meta_semanal'], $_POST['meta_mensal'],
     $_POST['total_mensal'], $_POST['total_semanal'])){
        $nome = $_POST['nome'];
        $salario1 = $_POST['salario1'];
        $meta_semanal = $_POST['meta_semanal'];
        $meta_mensal = $_POST['meta_mensal'];

        $bonus_semanal = 0; // Inicializa a variável de bônus semanal com 0
        if(isset($_POST['total_semanal'])){ // Verifica se o formulário foi enviado com o campo 'total_semanal'
            $total_semanal = $_POST['total_semanal']; // Junta 'total_semanal' do html à variável $total_semanal
            if($total_semanal >= $meta_semanal){ // Verifica se o total semanal atinge ou nao a meta semanal
                $bonus_semanal += $meta_semanal * 0.01; // Calcula o bônus básico (1% da meta semanal) e adiciona ao bônus semanal
                $excedente_semanal = $total_semanal - $meta_semanal; //Calcula o valor que sobrou
                $bonus_semanal += $excedente_semanal * 0.05; //Calcula 5% que sobrou
            }
        }

    
        $bonus_mensal = 0; // Inicializa a variável de bônus mensal com 0

        if(isset($_POST['total_mensal'])){ // Verifica se o formulário foi enviado para o  'total_mensal'
            $total_mensal = $_POST['total_mensal']; // Junta 'total_mensal' do html à variável $total_mensal
            if($total_mensal > $meta_mensal){ // Verifica se o total mensal excede a meta mensal
               $excedente_mensal = $total_mensal - $meta_mensal; // Calcula o valor que sobrou em relação à meta mensal
               $bonus_mensal += $excedente_mensal * 0.10; // Calcula o bônus (10% do que sobra) e adiciona ao bônus mensal
            }
            }
        }

        $salario2 = $salario1 + $bonus_semanal + $bonus_mensal;
        // Junta o salario primario com o bonus mensal e o bonus semanal

        echo "<p>Nome: $nome</p>";
        echo "<p>Bônus Semanal: R$ " . number_format($bonus_semanal, 2) . "</p>";
        echo "<p>Bônus Mensal: R$ " . number_format($bonus_mensal, 2) . "</p>";
        echo "<h2>O salário do(a) $nome é de " . number_format($salario2, 2) . "</h2>";
    else {
        echo "<p>Por favor, preencha todos os campos.</p>";
    }
    ?>
</body>
</html>
