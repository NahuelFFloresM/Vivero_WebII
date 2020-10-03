<?php
/* Smarty version 3.1.33, created on 2020-10-03 21:59:56
  from 'C:\xampp\htdocs\web2tpe\templates\info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f78d83c658127_51300834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '693ebeecd4e5b595f96d8f5e0a6bf0bc18e60daa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2tpe\\templates\\info.tpl',
      1 => 1601742013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:header.tpl' => 1,
    'file:body_info.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f78d83c658127_51300834 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:body_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
