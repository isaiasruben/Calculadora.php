<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        #formulario{
            width: 300px;
            height: 400px;
            color: blue;
            border-width: 1;
            border: 3px;
        }
    </style>

<?php 
$numero_01 = $_POST['numero_01'] ?? NULL;
$numero_02 = $_POST['numero_02'] ?? NULL;
$selecionar=isset($_POST['select'])?$_POST['select']: " ";
$resultado = 0;

function is_selected ($option)
{
    if($GLOBALS['selecionar']==$option){
        echo "Selected";
    }
}
if($_SERVER ['REQUEST_METHOD']=='POST'){
    switch ($GLOBALS['selecionar']) {
    case 'adicionar':
        $resultado = $numero_01 + $numero_02;
        break;
    
        case 'subtrair':
            $resultado = $numero_01 - $numero_02;
            break;
        break;

        case 'multiplicar':
            $resultado = $numero_01 * $numero_02;
            break;

            case 'dividir':
                if($numero_01==0 || $numero_02==0)
                {
                    $resultado=0;
                }
                else
                {
                    $resultado = $numero_01 / $numero_02;
                }
               
                break;

                case 'raiz':
                    $resultado = sqrt($numero_01);
                    break;
}
}
?>
    <div id="formulario">
    <form action=" <?php echo $_SERVER ['PHP_SELF'];?>" method="post">
    <lagend style="color: blue;">Calculadora</lagend>
    <br><br>
    <input type="number" name="resultado" value="<?php echo $resultado; ?>" readOnly>
    <P><label>Numero 01: </label></P>
    <input type="number" name="numero_01">
    <P><label>Numero 02:</label></P>
    <input type="number" name="numero_02">
    <p>Selecionar</p>
<select name="select" >
                <option value="adicionar" <?php is_selected ('adicionar'); ?>>adicao</option>
                <option value="multiplicar" <?php is_selected ('multiplicar'); ?>>multiplicacao</option>
                <option value="subtrair" <?php is_selected ('subtrair'); ?>>subtracao</option>
                <option value="dividir" <?php is_selected ('dividir'); ?>>Divisao</option>
                <option value="raiz" <?php is_selected ('raiz'); ?>>Raiz</option>
</select>
<p><input type="submit" value="Calcular"></p>
    </div>
    
</head>
<body>
    
</body>
</html>