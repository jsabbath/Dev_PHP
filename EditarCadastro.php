<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Preenchimento</title>
        <link rel="stylesheet" type="text/css" href="style.css">


        <script src="jquery-2.1.1.js"></script>
        <script src="jquery.maskedinput.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.phone_with_ddd').mask('(99) 9999-9999');
            });

        </script>

        <?php
        $cod = $_GET['codigo'];

        $link = mysql_connect("localhost", "root", "");
        $bd = mysql_select_db("banco", $link);

        $sql = mysql_query("SELECT * FROM cadastro WHERE codigo = $cod", $link);
        $reg = mysql_fetch_array($sql);

        mysql_close($link);
        ?>
    </head>
    <body>
        <form id="form_cadastro" name="form_cadastro">
            <table>
                <input type='hidden' id="codigo" name="codigo" class="caixa_entrada_inserir" value="<?php echo $reg['codigo']; ?>">
                <tr>
                    <td>
                        <label class="label">Nome:</label>
                        <br>   
                        <input type='text' id="pnome" name="pnome" class="caixa_entrada_inserir" value="<?php echo $reg['nome']; ?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Sobrenome:</label>
                        <br>
                        <input type="text" id="snome" name="snome" class="caixa_entrada_inserir" value="<?php echo $reg['sobrenome']; ?>"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Idade:</label>
                        <br>
                        <input type="number" id="idade" name="idade" class="caixa_entrada_inserir" value="<?php echo $reg['idade']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Telefone</label>
                        <br>
                        <input type="tel" id="tel" name="tel" class="phone_with_ddd caixa_entrada_inserir" value="<?php echo $reg['telefone']; ?> ">
                    <td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Email:</label>
                        <br>   
                        <input type="email" id="email" name="email" class="caixa_entrada_inserir" value="<?php echo $reg['email']; ?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <input type="button" id="enviar" value="Salvar" onclick="confirmarEdicaoCadastro(document.getElementById('codigo').value, document.getElementById('pnome').value, document.getElementById('snome').value, document.getElementById('idade').value, document.getElementById('tel').value, document.getElementById('email').value)">
                        <input type="button" id="back" value="Voltar" onclick="confirmarBack()">
                    </td>                
                </tr>
            </table>
        </form>
    </body>
</html>

