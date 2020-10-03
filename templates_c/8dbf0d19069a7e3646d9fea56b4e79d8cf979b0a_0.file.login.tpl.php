<?php
/* Smarty version 3.1.33, created on 2020-10-04 00:04:54
  from 'D:\xampp\htdocs\Floreria\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f78f5868f67c4_88626381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dbf0d19069a7e3646d9fea56b4e79d8cf979b0a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Floreria\\templates\\login.tpl',
      1 => 1601762690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f78f5868f67c4_88626381 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 bg-light text-dark rounded mt-5 mb-5">
            <form action="loguser">
            <div class="form-group">
                <label for="exampleInputEmail1">Direccion de Correo / Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@mail.com">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña / Password</label>
                <input required type="password" class="form-control" id="exampleInputPassword1" placeholder="Es un secreto">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['errormsg']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['errormsg']->value;?>

<?php }?>
</body>
<div class="fixed-bottom">
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div>
<?php }
}
