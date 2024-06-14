<?php
/**
 * CRUD Teste para Essentia Pharma
 *
 * @category    CRUD
 * @package     crud
 * @copyright  Copyright (c) 2018 Mario SAM (http://www.mariosam.com.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Modelo de CRUD para Essentia Pharma</title>
    <link rel="stylesheet" type="text/css" href="styles.css" async>
    <script src="scripts.js"></script>
</head>

<body>
<div id="conteudo">
    <h2>produtos</h2>
    <div id="msg-php" class="no-display"></div>

    <form method="POST" enctype="multipart/form-data" onSubmit="salvarFormP(); return false;" id="frmProdutos">
    <fieldset>
        <legend>Nome:</legend>
        <input id="nome" type=text class=input-text required placeholder="Digite o nome do produto aqui" size=20 name=nome onFocus="inputOn(this)" onBlur="inputOff(this)"/>
        <legend>preço:</legend>
        <input id="preço" type=number class=input-text required placeholder="Informe o preço unitário do produto (apenas números)" size=30 name=email onFocus="inputOn(this)" onBlur="inputOff(this)"/>
        <legend>quantidade:</legend>
        <input id="quantidade" type=number class=input-text required pattern="\d*" placeholder="insira a quantidade unitária do produto. (apenas números)" size=10 name=telefone onFocus="inputOn(this)" onBlur="inputOff(this)"/>
    </fieldset>
    <fieldset>
        <legend>Foto:</legend>
        <input type=file id="foto" name=foto class=input-text accept="image/png, image/jpeg"/>
        <img id="image" class=thumb />
    </fieldset>
    <input id="id" type=hidden value="-1" />
    <input id="nomeFoto" type=hidden value="" />
    <input type=reset class=button id="btnLimpar" value="Limpar" />
    <input type=submit class=button id="btnSalvar" value="Salvar" />
    </form>
</div>

<div id="lista">
    <script type="text/javascript">carregarListaP();</script>
</div>
<p class="rodape">coded by <a href="http://mariosam.com.br/">Mario SAM</a>!</p>
</body>
</html>