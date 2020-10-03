<?php
/* Smarty version 3.1.33, created on 2020-10-03 22:25:42
  from 'C:\xampp\htdocs\web2tpe\templates\body_contacto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f78de463f5689_05877522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce6ea04bdbd9bb8f5bd3bbb5c2266e2e35eec4d7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2tpe\\templates\\body_contacto.tpl',
      1 => 1601756735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f78de463f5689_05877522 (Smarty_Internal_Template $_smarty_tpl) {
?><article class=" container titleStyle">
    <h1>¿Estás pensando en comprar una Very Mëy?</h1>
    <h2>Dejame tu nombre, tu e-mail y contame que te interesa, y te responderé pronto!</h2>
</article>

<div class="container d-flex justify-content-center">
    <form id="formulario" class="formStyle">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="control-label col-md-4">Nombre:</label>
                <div class="col-md-8">
                    <input type="nombre" class="form-control" id="nombre" placeholder="Escribe aquí tu Nombre">
                </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2" class="control-label col-md-4">E-mail:</label>
            <div class="col-md-8">
                <input type="email" class="form-control" id="e-mail" placeholder="nombre@example.com">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="control-label col-md-4">Comentario:</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
        </div>

        <div class="form-group">
            <div class="item">
                <label class="labelContacto" name="captcha"> Código de Verificación:</label>
                <label class="captchaNumero" id="captchaNumero"></label>
                    <input class="captchaInput" id="captchaInput" type="number" value="" required
                    placeholder="Código" />
                <label class="labelError" id="captchaError"></label>
            </div>
        </div>

        <div class="form-group">
            <button id="btn-enviar" type="submit" class="btn btn-primary" class="btnMey">Enviar!</button>
        </div>
    </form>
</div><?php }
}
