<?php
function abrirBanco(){
    $conexao = new mysqli("sql302.epizy.com", "epiz_25627353", "OzKcndk34w0", "epiz_25627353_db_sgd");
    return $conexao;
}

function selectAllPendente(){
    $banco = abrirBanco();
    $sql = " SELECT * FROM sgd_cliente INNER JOIN sgd_divida ON sgd_cliente.id = sgd_divida.cliente AND sgd_divida.status='N'";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectAllPagas(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM sgd_cliente INNER JOIN sgd_divida ON sgd_cliente.id = sgd_divida.cliente AND sgd_divida.status='P'";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectTotalP(){
    $banco = abrirBanco();
    $sql = "SELECT valor, status, SUM(valor) AS valor FROM sgd_divida WHERE status='P'";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectTotalN(){
    $banco = abrirBanco();
    $sql = "SELECT valor, status, SUM(valor) AS valor FROM sgd_divida WHERE status='N'";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}