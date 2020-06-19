<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-13 22:31:13
  from 'D:\xampp\htdocs\projekt\views\Aktivacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee53791409d73_15576569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e773dcf91df3cf0d0bd9668017d8e5e60da84b3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\Aktivacija.tpl',
      1 => 1592080236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee53791409d73_15576569 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="login">
    <div class="login-container">
        <span>
           <?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>

           <?php if ($_smarty_tpl->tpl_vars['as']->value == 4) {?>
                <a href="?pg=prijava">
                    <button type="button" class="btnPrijava">PRIJAVI SE</button>
                </a>
           <?php }?>
        </span>
    </div>
</section><?php }
}
