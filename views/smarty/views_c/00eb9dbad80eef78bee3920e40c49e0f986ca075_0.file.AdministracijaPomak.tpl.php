<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 11:08:13
  from 'D:\xampp\htdocs\projekt\views\AdministracijaPomak.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee9dd7dee3546_83422769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00eb9dbad80eef78bee3920e40c49e0f986ca075' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\AdministracijaPomak.tpl',
      1 => 1592384892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9dd7dee3546_83422769 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="login">
    <div class="login-container">
        <span>
            <p>
                <?php if ($_smarty_tpl->tpl_vars['kliknut_pomak']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['ok']->value) {?>
                        OBAVIJEST: Pomak virtualnog vremena je uspješno izvršen.
                    <?php } else { ?>
                        OBAVIJEST: Greška kod pomaka virtualnog vremena.
                    <?php }?>
                <?php }?>
            </p>
            <p>Serversko vrijeme je <?php echo $_smarty_tpl->tpl_vars['serversko_vrijeme']->value;?>
.</p>
            <p>Trenutni pomak u mojim podacima je <?php echo $_smarty_tpl->tpl_vars['pomak']->value;?>
 h.</p>
            <p>Trenutno virtualno vrijeme aplikacije je <?php echo $_smarty_tpl->tpl_vars['virtualno_vrijeme']->value;?>
.</p>
         </span>
         <br />
         <p>Konfiguracijska json datoteka ima upisan pomak na <?php echo $_smarty_tpl->tpl_vars['sati_procitano']->value;?>
 h.</p>
         <form novalidate class="registracija-form" method="POST" action="?pg=administracija&subpag=pomak">
            <div class="registracija-container-item">
                <input id="pomak-btnPosalji" name="pomak-btnPosalji" class="registracija-btnPosalji" type="submit" value="Izvrši novi pomak">
            </div>
        </form>
    </div>
</section><?php }
}
