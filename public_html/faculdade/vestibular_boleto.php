<?php$con = new database();$id = decripfy($baseURL[3], 'c3n3cv1r7');$query = 'SELECT * FROM vestibulares_inscricoes AS vi, vestibulares_boletos AS vb	WHERE vi.id_vestibulares_inscricoe = vb.id_vestibulares_inscricoe AND vi.id_vestibulares_inscricoe = ' . $id;$boleto = $con->query($query);if ($boleto && $boleto->num_rows > 0) {    $boleto = $boleto->fetch_assoc();    if ($boleto['pago'] == 0) {        $dias_de_prazo_para_pagamento = 2;        $taxa_boleto = 0;        $data = split("-", $boleto['data_vencimento']);        //$data = explode('-',date('Y-m-d'));        $data_venc = mktime(0, 0, 0, $data[1], ($data[2]), $data[0]);        $data_venc = strftime("%d/%m/%Y", $data_venc);        $valor_cobrado = number_format($boleto['preco'], 2, ',', '');        $valor_cobrado = str_replace(",", ".", $valor_cobrado);        $valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');        require_once('../classes/boleto_banrisul.php');    } else {        echo 'Boleto já foi pago';    }} else {    echo 'Boleto não encontrado';}