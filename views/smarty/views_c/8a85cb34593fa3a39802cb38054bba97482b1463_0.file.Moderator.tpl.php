<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 20:14:27
  from 'D:\xampp\htdocs\projekt\views\Moderator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee90c031e84b1_07229028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a85cb34593fa3a39802cb38054bba97482b1463' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\Moderator.tpl',
      1 => 1592330989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee90c031e84b1_07229028 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="login">
    <div class="login-container">
        <span>
            Dobrodošli u postavke moderatora, <?php echo $_smarty_tpl->tpl_vars['korisnicko_ime']->value;?>
<br />
            <a href="?pg=moderator&subpag=skupine">
                <button type="button" class="btnPrijava">Skupine</button>
            </a>
            <a href="?pg=registrirani&subpag=popisRacuna">
                <button type="button" class="btnPrijava">Računi</button>
            </a>
        </span>
    </div>
</section><?php }
}
