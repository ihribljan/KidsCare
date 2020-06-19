<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 20:16:33
  from 'D:\xampp\htdocs\projekt\views\Pocetna.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eebaf8148d751_68209326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b3685004be388ba9e54c8a65f8e5a51f91118c2' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\Pocetna.tpl',
      1 => 1592491779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eebaf8148d751_68209326 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="login">
    <div class="login-container">
        <?php if ($_smarty_tpl->tpl_vars['logiran']->value == 1) {?>
        <span>
            Dobrodošli, <?php echo $_smarty_tpl->tpl_vars['korisnicko_ime']->value;?>
<br />
            <a href="?pg=odjava">
                <button type="button" class="btnPrijava">ODJAVI SE</button>
            </a>
        </span>
        <?php } else { ?>
        <span>
            <a href="?pg=prijava">
                <button type="button" class="btnPrijava">PRIJAVI SE</button>
            </a>
            <a href="?pg=registracija">
                <button type="button" class="btnRegistracija">REGISTRIRAJ SE</button>
            </a>
        </span>
        <?php }?>
    </div>
</section><?php }
}
