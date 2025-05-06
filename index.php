<?php
function resultado() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['expresion'])) {
        $expresion = $_POST['expresion'];
        try {
            if (preg_match('/^[0-9\+\-\*\/\.\(\)]+$/', $expresion)) {
                $resultado = eval("return " . $expresion . ";");
                return $resultado;
            } else {
                return "Error: Expresión no válida";
            }
        } catch (Exception $e) {
            return "Error en el cálculo";
        }
    }
    return "";
}

$resultadoCalculo = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultadoCalculo = resultado();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora | Enmanuel</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap');

        body {
            background-color: #457b9d;
            display: flex;
            justify-content: center; 
            align-items: center;     
            height: 100vh;   
            font-family: "Cal Sans", sans-serif;
            font-weight: 400;
            font-style: normal;        
        }

        form {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);   
        }

        button {
            height: 60px;
            font-size: 20px;
            border: none;
            border-radius: 10px;
            background: #e0e0e0;
            cursor: pointer;
            padding: 10px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 60px);
            gap: 10px;
        }

        #display {
            font-size: 30px;
            margin:0;
            padding:0;
        }

    </style>
    <form action="" method="POST">
        <input type="hidden" name="expresion" id="expresionHidden">
        <div class="grid">
            <div id="display" style="padding:50px;  grid-column-start: 1; grid-column-end: 5;"><?php echo $resultadoCalculo; ?></div>

            <button type="button" onclick="calc += '7'; display.innerText = calc">7</button>
            <button type="button" onclick="calc += '8'; display.innerText = calc">8</button>
            <button type="button" onclick="calc += '9'; display.innerText = calc">9</button>
            <button type="button" onclick="calc += '/'; display.innerText = calc">/</button>
            <button type="button" onclick="calc += '4'; display.innerText = calc">4</button>
            <button type="button" onclick="calc += '5'; display.innerText = calc">5</button>
            <button type="button" onclick="calc += '6'; display.innerText = calc">6</button>
            <button type="button" onclick="calc += '*'; display.innerText = calc">*</button>
            <button type="button" onclick="calc += '1'; display.innerText = calc">1</button>
            <button type="button" onclick="calc += '2'; display.innerText = calc">2</button>
            <button type="button" onclick="calc += '3'; display.innerText = calc">3</button>
            <button type="button" onclick="calc += '-'; display.innerText = calc">-</button>
            <button type="button" onclick="calc += '0'; display.innerText = calc">0</button>
            <button type="button" onclick="calc += '.'; display.innerText = calc">.</button>
            <button type="button" onclick="calcularResultado()" style="background-color: #4CAF50" class="item-equal" name="resultado">=</button>
            <button type="button" onclick="calc += '+'; display.innerText = calc">+</button>
            <button type="button" onclick="calc = ''; display.innerText = ''; alert('Calculator clear')" style="text-align:center; background-color: #f44336; grid-column-start: 1; grid-column-end: 5;">C</button>
        </div>
    </form>
    
    <script>
        let calc = '<?php echo $resultadoCalculo; ?>';
        const display = document.getElementById('display');
        const expresionHidden = document.getElementById('expresionHidden');
        
        function calcularResultado() {
            display.innerText = eval(calc);
            calc = display.innerText;
            
            expresionHidden.value = calc;
            document.forms[0].submit();
        }
    </script>
</body>
</html>