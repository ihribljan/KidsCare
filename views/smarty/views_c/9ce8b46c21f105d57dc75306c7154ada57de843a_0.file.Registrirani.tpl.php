<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 23:29:04
  from 'D:\xampp\htdocs\projekt\views\Registrirani.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee939a0867d51_45995675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ce8b46c21f105d57dc75306c7154ada57de843a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\Registrirani.tpl',
      1 => 1592342942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee939a0867d51_45995675 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="login">
    <div class="login-container">
        <span>
            Dobrodošli u postavke registriranog korisnika, <?php echo $_smarty_tpl->tpl_vars['korisnicko_ime']->value;?>
<br />
            <a href="?pg=registrirani&subpag=dolasciDjeteta">
                <button type="button" class="btnPrijava">Dolasci djeteta</button>
            </a>
            <a href="?pg=registrirani&subpag=popisRacuna">
                <button type="button" class="btnPrijava">Računi</button>
            </a>
            <a href="?pg=registrirani&subpag=popisPrijavaZaUpise">
                <button type="button" class="btnPrijava">Prijave za upise</button>
            </a>
        </span>
    </div>
</section><?php }
}
