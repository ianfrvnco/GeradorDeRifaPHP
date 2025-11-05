<?php
// --- BLOCO DE PROCESSAMENTO (PHP) ---

$pares = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $numeroRifas = $_POST['numeroRifas'];
    $itemRifa = $_POST['itemRifa'];
    $valorRifa = $_POST['valorRifa'];
    $tituloRifa = $_POST['tituloRifa'];


    if (!empty($numeroRifas) && !empty($itemRifa) && !empty($valorRifa) && !empty($tituloRifa)) {
        for ($i = 1; $i <= $numeroRifas; $i++) {
            $rifasGeradas[] = [
                'numero' => $i,
                'titulo' => $tituloRifa,
                'item' => $itemRifa,
                'valor' => $valorRifa
            ];
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ex. 1: Média Aritmética</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        div {
            margin-bottom: 10px;
        }

        label,
        h3 {
            display: flex;
            justify-content: center;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30%;
            height: 500px;
            background-color: #3e64cfff;
            border-radius: 15px;
            flex-direction: column;
        }

        .container input {
            border-radius: 5px;
            border-color: black;
            margin: 5px 0;
        }

        .formulario {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .rifa-item {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            /* necessário para posicionar o número */
        }

        .numero-rifa {
            position: absolute;
            top: 10px;
            right: 10px;
            font-weight: bold;
            color: #3e64cf;
        }

        #pagina {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <section class="container">
        <div>
            <h2>Gerador de Rifas.</h2>
        </div>

        <div id="pagina">
            <form method="post" action="">
                <div class="formulario">
                    <label>Numero de rifas a ser gerado:</label>
                    <input type="number" id="numeroRifas" name="numeroRifas">
                    <label>Prêmio do sorteio:</label>
                    <input type="text" id="itemRifa" name="itemRifa">
                    <label>Valor de cada número:</label>
                    <input type="number" id="valorRifa" name="valorRifa">
                    <label>Titulo da rifa:</label>
                    <input type="text" id="tituloRifa" name="tituloRifa">
                    <div>
                        <input type="submit" value="Gerar" id="button">
                    </div>
                </div>

            </form>
        </div>
    </section>

    <div class="rifas">
        <?php
        if (!empty($rifasGeradas)) {
            echo "<div>";
            echo "<h3>Bilhetes Gerados:</h3>";
            foreach ($rifasGeradas as $rifa) {
                $numeroFormatado = str_pad($rifa['numero'], 3, "0", STR_PAD_LEFT);
                
                echo "<div class='rifa-item'>";
                echo "<div class='numero-rifa'>Nº {$numeroFormatado}</div>";
                echo "<strong>Título:</strong> {$rifa['titulo']}<br>";
                echo "<strong>Prêmio:</strong> {$rifa['item']}<br>";
                echo "<strong>Valor:</strong> R$ {$rifa['valor']},00";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>