<?php
define('HOST', 'localhost');
define('USUARIO', 'usuario banco');
define('SENHA', 'senha do seu banco');
define('DB', 'nome do seu banco');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');