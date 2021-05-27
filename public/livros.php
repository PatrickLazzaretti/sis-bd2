<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }

        table{
            border-collapse: collapse;
            width: 150%;
        }
        td, th{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        tr:nth-child(even){background-color: #f2f2f2;}
        tr:hover {background-color: #ddd;}
        th {
            background-color: #04AA6D;
            color: white;
        }

    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $cod_livros = 'cod_livros';
        $nome = 'nome';
        $ano_primeira_publicacao = 'ano_primeira_publicacao';
        $categoria = 'categoria';
        $classificacao = 'classificacao';
        $autor = 'autor';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $cod_livros .
            '     , ' . $nome .
            '     , ' . $ano_primeira_publicacao .
            '     , ' . $categoria .
            '     , ' . $classificacao .
            '     , ' . $autor .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM livros';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $cod_livros . '</th>' .
            '        <th>' . $nome . '</th>' .
            '        <th>' . $ano_primeira_publicacao . '</th>' .
            '        <th>' . $categoria . '</th>' .
            '        <th>' . $classificacao . '</th>' .
            '        <th>' . $autor . '</th>' .
            '    </tr>';
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */


        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$cod_livros] . '</td>' .
                    '<td>' . $registro[$nome] . '</td>' .
                    '<td>' . $registro[$ano_primeira_publicacao] . '</td>' .
                    '<td>' . $registro[$categoria] . '</td>' .
                    '<td>' . $registro[$classificacao] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>';
                    /* TODO-4: Adicione a tabela os novos registros. */
                echo '</tr>';                     
                
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>