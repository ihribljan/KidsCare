<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 20:39:39
  from 'D:\xampp\htdocs\projekt\views\Administracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee911eb283c09_65149017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd07a9b411c26b7fbf466e1c4ec95a434a4d7e94e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\Administracija.tpl',
      1 => 1592332776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee911eb283c09_65149017 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="login">
    <div class="login-container">
        <span>
            Dobrodošli u administraciju, <?php echo $_smarty_tpl->tpl_vars['korisnicko_ime']->value;?>
<br />
            <a href="?pg=administracija&subpag=pomak">
                <button type="button" class="btnPrijava">Pomak vremena</button>
            </a>
            <a href="?pg=administracija&subpag=dodajVrtic">
                <button type="button" class="btnPrijava">Dodaj dječji vrtić</button>
            </a>
            <a href="?pg=administracija&subpag=racuni">
                <button type="button" class="btnPrijava">Računi</button>
            </a>
            <a href="?pg=administracija&subpag=ocjene">
                <button type="button" class="btnPrijava">Ocjene</button>
            </a>
            <a href="?pg=administracija&subpag=statusKorisnika">
                <button type="button" class="btnPrijava">Status korisnika</button>
            </a>
            <a href="?pg=administracija&subpag=dnevnik">
                <button type="button" class="btnPrijava">Dnevnik</button>
            </a>
            <a href="?pg=administracija&subpag=postavkeSustava">
                <button type="button" class="btnPrijava">Postavke sustava</button>
            </a>
        </span>
    </div>
</section><?php }
}
