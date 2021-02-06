<?php

function abrirBanco(){
    $conexao = new mysqli("localhost", "root", "", "db_sgd");
    return $conexao;
}

function selectAllPendente(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM sgd_divida WHERE status ='P'";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}