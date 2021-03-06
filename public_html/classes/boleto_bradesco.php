<?php
$dadosboleto["nosso_numero"] = $boleto['num_doc']; // Nosso numero sem o DV - REGRA: M�ximo de 11 caracteres!
$dadosboleto["numero_documento"] = $boleto['num_doc']; // Num do pedido ou do documento = Nosso numero
$dadosboleto["data_vencimento"] = $boleto['data_vencimento']; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $boleto['valor']; // Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula
// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $boleto['nome'];
$dadosboleto["endereco1"] = $boleto['endereco'];
$dadosboleto["endereco2"] = $boleto['cidade'] . " - " . $boleto['uf'] . " -  CEP: " . $boleto['cep'];
;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "";
$dadosboleto["demonstrativo2"] = "";
$dadosboleto["demonstrativo3"] = "";
$dadosboleto["instrucoes1"] = "- Em caso de dúvidas entre em contato conosco: (54) 3452.4422";
$dadosboleto["instrucoes2"] = "";
$dadosboleto["instrucoes3"] = "Multa de 2% ao mês";
$dadosboleto["instrucoes4"] = "Juros de 0,03% ao dia";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "001";
$dadosboleto["valor_unitario"] = $valor_boleto;
$dadosboleto["aceite"] = "";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DS";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //
// DADOS DA SUA CONTA - Bradesco
$dadosboleto["agencia"] = "32697"; // Num da agencia, sem digito
$dadosboleto["agencia_dv"] = "0"; // Digito do Num da agencia
$dadosboleto["conta"] = "0074277"; // Num da conta, sem digito
$dadosboleto["conta_dv"] = "5"; // Digito do Num da conta
// DADOS PERSONALIZADOS - Bradesco
$dadosboleto["conta_cedente"] = "417622"; // ContaCedente do Cliente, sem digito (Somente N�meros)
$dadosboleto["conta_cedente_dv"] = "0"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "06"; // C�digo da Carteira: pode ser 06 ou 03
// SEUS DADOS
$dadosboleto["identificacao"] = "FACULDADE CENECISTA DE BENTO GONÇALVES";
$dadosboleto["cpf_cnpj"] = "33.621.384/2020-99";
$dadosboleto["endereco"] = "Rua Arlindo Franklin Barbosa, 460 - São Roque";
$dadosboleto["cidade_uf"] = "Bento Gonçalves - RS - CEP 95700-000";
$dadosboleto["cedente"] = "FACULDADE CENECISTA DE BENTO GONÇALVES";

// NÃO ALTERAR!
include("../includes/funcoes_bradesco.php");
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD html 4.0 Transitional//EN'>
<html>
    <head>
        <title><?php echo $dadosboleto["identificacao"]; ?></title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licença GPL" />
        <style type="text/css">
            <!--
            .cp { font: bold 10px Arial; color: black}
            .ti { font: 9px Arial, Helvetica, sans-serif}
            .ld { font: bold 15px Arial; color: #000000}
            .ct { font: 9px "Arial Narrow"; color: #000033}
            .cn { font: 9px Arial; color: black }
            .bc { font: bold 20px Arial; color: #000000 }
            .ld2 { font: bold 12px Arial; color: #000000 }
            -->
        </style>
    </head>
    <body text="#000000" bgColor="#ffffff" topMargin="0" rightMargin="0" onload="window.print()">
        <table width="666" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td valign="top" class="cp"><div align="center">Instruções de Impressão</div></td>
            </tr>
            <tr>
                <td valign="top" class="cp">
                    <div align="left">
                        <ul>
                            <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).<br /></li>
                            <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.<br /></li>
                            <li>Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.<br /></li>
                            <li>Caso não apareça o código de barras no final, clique em F5 para atualizar esta tela.</li>
                            <li>Caso tenha problemas ao imprimir, copie a sequencia numérica abaixo e pague no caixa eletrônico ou no internet banking:<br /><br />
                                <span class="ld2">
                                    &nbsp;&nbsp;&nbsp;&nbsp;Linha Digitável: &nbsp;<?php echo $dadosboleto["linha_digitavel"] ?><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $dadosboleto["valor_boleto"] ?><br />
                                </span></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
        <br />
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td class="ct" width="666"><img height="1" src="/_img/boleto_bradesco/6.png" width="665" border="0" /></td>
                </tr>
                <tr>
                    <td class="ct" width="666"><div align="right"><b class="cp">Recibo do Sacado</b></div></td>
                </tr>
            </tbody>
        </table>
        <table width="666" cellspacing="5" cellpadding="0" border="0">
            <tr>
                <td width="41"></td>
            </tr>
        </table>
        <table width="666" cellspacing="5" cellpadding="0" border="0" align="default">
            <tr>
                <td width="41"></td>
                <td class="ti" width="455"><?php echo $dadosboleto["identificacao"]; ?> <?php echo isset($dadosboleto["cpf_cnpj"]) ? "<br />" . $dadosboleto["cpf_cnpj"] : '' ?><br />
                    <?php echo $dadosboleto["endereco"]; ?><br />
                    <?php echo $dadosboleto["cidade_uf"]; ?><br />
                </td>
                <td align="right" width="150" class="ti">&nbsp;</td>
            </tr>
        </table>
        <br />
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tr>
                <td class="cp" width="150"><span class="campo"><img src="/_img/boleto_bradesco/logobradesco.jpg" width="150" height="40" border="0" /></span></td>
                <td width="3" valign="bottom"><img height="22" src="/_img/boleto_bradesco/3.png" width="2" border="0" /></td>
                <td class="cpt" width="58" valign="bottom"><div align="center"><font class="bc"><?php echo $dadosboleto["codigo_banco_com_dv"] ?></font></div></td>
                <td width="3" valign="bottom"><img height="22" src="/_img/boleto_bradesco/3.png" width="2" border="0" /></td>
                <td class="ld" align="right" width="453" valign="bottom"><span class="ld"><span class="campotitulo"><?php echo $dadosboleto["linha_digitavel"] ?></span></span></td>
            </tr>
            <tbody>
                <tr>
                    <td colspan="5"><img height="2" src="/_img/boleto_bradesco/2.png" width="666" border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="298" height="13">Cedente</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=126 height="13">Agência/Código do Cedente</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="34" height="13">Espécie</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="53" height="13">Quantidade</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="120" height="13">Nosso número</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="298" height="12"><span class="campo"><?php echo $dadosboleto["cedente"]; ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=126 height="12"><span class="campo"><?php echo $dadosboleto["agencia_codigo"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="34" height="12"><span class="campo"><?php echo $dadosboleto["especie"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="53" height="12"><span class="campo"><?php echo $dadosboleto["quantidade"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width="120" height="12"><span class="campo"><?php echo $dadosboleto["nosso_numero"] ?></span></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="298" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="298" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=126 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=126 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="34" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="34" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="53" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="53" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="120" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="120" border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" colspan="3" height="13">Número do documento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=132 height="13">CPF/CNPJ</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=134 height="13">Vencimento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" />
                    </td><td class="ct" valign="top" width=180 height="13">Valor documento</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" colspan="3" height="12"><span class="campo"><?php echo $dadosboleto["numero_documento"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=132 height="12"><span class="campo"><?php echo $dadosboleto["cpf_cnpj"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=134 height="12"><span class="campo"><?php echo $dadosboleto["data_vencimento"]; ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width=180 height="12"><span class="campo"><?php echo $dadosboleto["valor_boleto"] ?></span></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="113" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="113" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="72" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="72" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=132 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=132 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=134 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=134 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="113" height="13">(-) Desconto / Abatimentos</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=112 height="13">(-) Outras deduções</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="113" height="13">(+) Mora / Multa</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="113" height="13">(+) Outros acréscimos</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=180 height="13">(=) Valor cobrado</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width="113" height="12"></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width=112 height="12"></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width="113" height="12"></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width="113" height="12"></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width=180 height="12"></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="113" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="113" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=112 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=112 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="113" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="113" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="113" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="113" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=659 height="13">Sacado</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=659 height="12"><span class="campo"><?php echo $dadosboleto["sacado"] ?></span></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=659 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=659 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" width="7" height="12"></td>
                    <td class="ct" width="564">Demonstrativo</td>
                    <td class="ct" width="7" height="12"></td>
                    <td class="ct" width="88">Autenticação mecânica</td>
                </tr>
                <tr>
                    <td width="7"></td>
                    <td class="cp" width="564">
                        <span class="campo">
                            <?php echo $dadosboleto["demonstrativo1"] ?><br />
                            <?php echo $dadosboleto["demonstrativo2"] ?><br />
                            <?php echo $dadosboleto["demonstrativo3"] ?><br />
                        </span>
                    </td>
                    <td width="7"></td>
                    <td width="88"></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td width="7"></td>
                    <td width="500" class="cp"><br /><br /><br /></td>
                    <td width="159"></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tr>
                <td class="ct" width="666"></td>
            </tr>
            <tbody>
                <tr>
                    <td class="ct" width="666"><div align="right">Corte na linha pontilhada</div></td>
                </tr>
                <tr>
                    <td class="ct" width="666"><img height="1" src="/_img/boleto_bradesco/6.png" width="665" border="0" /></td>
                </tr>
            </tbody>
        </table>
        <br />
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tr>
                <td class="cp" width="150"><span class="campo"><img src="/_img/boleto_bradesco/logobradesco.jpg" width="150" height="40" border="0" /></span></td>
                <td width="3" valign="bottom"><img height="22" src="/_img/boleto_bradesco/3.png" width="2" border="0" /></td>
                <td class="cpt" width="58"valign="bottom"><div align="center"><font class="bc"><?php echo $dadosboleto["codigo_banco_com_dv"] ?></font></div></td>
                <td width="3" valign="bottom"><img height="22" src="/_img/boleto_bradesco/3.png" width="2" border="0" /></td>
                <td class="ld" align="right" width="453" valign="bottom"><span class="ld"><span class="campotitulo"><?php echo $dadosboleto["linha_digitavel"] ?></span></span></td>
            </tr>
            <tbody>
                <tr>
                    <td colspan="5"><img height="2" src="/_img/boleto_bradesco/2.png" width="666" border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=472 height="13">Local de pagamento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=180 height="13">Vencimento</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=472 height="12">Pagável em qualquer Banco até o vencimento</td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width=180 height="12"><span class="campo"><?php echo $dadosboleto["data_vencimento"] ?></span></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=472 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=472 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=472 height="13">Cedente</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=180 height="13">Agência/Código cedente</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=472 height="12"><span class="campo"><?php echo $dadosboleto["cedente"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width=180 height="12"><span class="campo"><?php echo $dadosboleto["agencia_codigo"] ?></span></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=472 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=472 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="113" height="13">Data do documento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="153" height="13">Nº documento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="62" height="13">Espécie doc.</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="34" height="13">Aceite</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=82 height="13">Data processamento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=180 height="13">Nosso número</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="113" height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["data_documento"] ?></span></div></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="153" height="12"><span class="campo"><?php echo $dadosboleto["numero_documento"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="62" height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["especie_doc"] ?></span></div></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="34" height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["aceite"] ?></span></div></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=82 height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["data_processamento"] ?></span></div></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width=180 height="12"><span class="campo"><?php echo $dadosboleto["nosso_numero"] ?></span></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="113" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="113" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="153" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="153" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="62" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="62" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="34" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="34" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=82 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=82 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" colspan="3" height="13">Uso do banco</td>
                    <td class="ct" valign="top" height="13" width="7"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="83" height="13">Carteira</td>
                    <td class="ct" valign="top" height="13" width="7"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="53" height="13">Espécie</td>
                    <td class="ct" valign="top" height="13" width="7"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=123 height="13">Quantidade</td>
                    <td class="ct" valign="top" height="13" width="7"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width="72" height="13">Valor Documento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=180 height="13">(=) Valor documento</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td valign="top" class="cp" height="12" colspan="3"><div align="left"></div></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="83"><div align="left"> <span class="campo"><?php echo $dadosboleto["carteira"] ?></span></div></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="53"><div align="left"><span class="campo"><?php echo $dadosboleto["especie"] ?></span></div></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=123><span class="campo"><?php echo $dadosboleto["quantidade"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width="72"><span class="campo"><?php echo $dadosboleto["valor_unitario"] ?></span></td>
                    <td class="cp" valign="top" width="7" height="12"> <img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" align="right" width=180 height="12"><span class="campo"><?php echo $dadosboleto["valor_boleto"] ?></span></td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="75" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=31 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=31 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="83" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="83" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="53" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="53" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=123 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=123 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width="72" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="72" border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td align="right" width=10>
                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="1" border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="top" width=468 rowspan=5><font class="ct">Instruções (Texto de responsabilidade do cedente)</font><br /><br /><span class="cp"><font class=campo>
                            <?php echo $dadosboleto["instrucoes1"]; ?><br />
                            <?php echo $dadosboleto["instrucoes2"]; ?><br />
                            <?php echo $dadosboleto["instrucoes3"]; ?><br />
                            <?php echo $dadosboleto["instrucoes4"]; ?></font><br /><br />
                        </span></td>
                    <td align="right" width=188>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="ct" valign="top" width=180 height="13">(-) Desconto / Abatimentos</td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="cp" valign="top" align="right" width=180 height="12"></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right" width=10>
                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="1" border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td align="right" width=188>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="ct" valign="top" width=180 height="13">(-) Outras deduções</td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="cp" valign="top" align="right" width=180 height="12"></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right" width=10>
                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="1" border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td align="right" width=188>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="ct" valign="top" width=180 height="13">(+) Mora / Multa</td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="cp" valign="top" align="right" width=180 height="12"></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right" width=10>
                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="1" border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td align="right" width=188>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="ct" valign="top" width=180 height="13">(+) Outros acréscimos</td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="cp" valign="top" align="right" width=180 height="12"></td>
                                </tr>
                                <tr>
                                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right" width=10>
                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td align="right" width=188>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="ct" valign="top" width=180 height="13">(=) Valor cobrado</td>
                                </tr>
                                <tr>
                                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                                    <td class="cp" valign="top" align="right" width=180 height="12"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td valign="top" width="666" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="666" border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=659 height="13">Sacado</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=659 height="12"><span class="campo"><?php echo $dadosboleto["sacado"] ?></span></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=659 height="12"><span class="campo"><?php echo $dadosboleto["endereco1"] ?></span></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="cp" valign="top" width=472 height="13"><span class="campo"><?php echo $dadosboleto["endereco2"] ?></span></td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="/_img/boleto_bradesco/1.png" width="1" border="0" /></td>
                    <td class="ct" valign="top" width=180 height="13">Cód. baixa</td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=472 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=472 border="0" /></td>
                    <td valign="top" width="7" height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width="7" border="0" /></td>
                    <td valign="top" width=180 height="1"><img height="1" src="/_img/boleto_bradesco/2.png" width=180 border="0" /></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0" width="666">
            <tbody>
                <tr>
                    <td class="ct" width="7" height="12"></td>
                    <td class="ct" width=409>Sacador/Avalista</td>
                    <td class="ct" width="250"><div align="right">Autenticação mecânica - <b class="cp">Ficha de Compensação</b></div></td>
                </tr>
                <tr>
                    <td class="ct" colspan="3"></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td valign="bottom" align="left" height="50"><?php fbarcode($dadosboleto["codigo_barras"]); ?></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tr>
                <td class="ct" width="666"></td>
            </tr>
            <tbody>
                <tr>
                    <td class="ct" width="666"><div align="right">Corte na linha pontilhada</div></td>
                </tr>
                <tr>
                    <td class="ct" width="666"><img height="1" src="/_img/boleto_bradesco/6.png" width="665" border="0" /></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>


