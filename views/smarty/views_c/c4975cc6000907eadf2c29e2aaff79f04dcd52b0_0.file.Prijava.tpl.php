<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 12:18:41
  from 'D:\xampp\htdocs\projekt\views\Prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee9ee01255157_86814815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4975cc6000907eadf2c29e2aaff79f04dcd52b0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\Prijava.tpl',
      1 => 1592389109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9ee01255157_86814815 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="prijava">
    <div class="prijava-container">
        <?php if ($_smarty_tpl->tpl_vars['status_prijava']->value != 0) {?>
            <?php if ($_smarty_tpl->tpl_vars['status_prijava']->value == 1) {?>
                Neispravni podaci.
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['status_prijava']->value == 2) {?>
                Korisnik ne postoji!
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['status_prijava']->value == 3) {?>
                Korisnik nije aktivan. Aktivirajte svoj račun putem emaila ili se javite administatoru.
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['status_prijava']->value == 4) {?>
                Neispravni podaci. Zbog previše uzastopnih pogrešnih prijava račun je blokiran. Javite se administratoru.
            <?php }?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['status_zaboravljena_lozinka']->value != 0) {?>
            <?php if ($_smarty_tpl->tpl_vars['status_zaboravljena_lozinka']->value == 1) {?>
                Nova lozinka je poslana na email
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['status_zaboravljena_lozinka']->value == 2) {?>
                Korisnik ne postoji!
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['status_zaboravljena_lozinka']->value == 3) {?>
                Korisnik nije aktivan. Javite se administatoru.
            <?php }?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['istek_sesije']->value == 1) {?>
            Vaša sesija je istekla. Molimo, prijavite se ponovno.
        <?php }?>

        <form name="prijava-form" class="prijava-form" method="POST" action="">
            <div class="prijava-container-item">
                <label for="prijava-korisnicko-ime">Korisničko ime</label> 
                <input name="prijava-korisnicko-ime" id="prijava-korisnicko-ime" type="text" maxlength="15" size="15"
                    placeholder="Korisničko ime" value="<?php echo $_smarty_tpl->tpl_vars['predefinirano_korisnicko_ime']->value;?>
">
            </div> 
            <div class="prijava-container-item">
                <label for="prijava-lozinka">Lozinka</label> 
                <input name="prijava-lozinka" id="prijava-lozinka" type="password" placeholder="Lozinka"> 
            </div>
            <div class="prijava-container-item">
                <label for="prijava-zapamti">Zapamti me</label>
                <input type="checkbox" name="prijava-zapamti" id="prijava-zapamti">
            </div>
            <div class="prijava-container-item">
                <input name="prijava-btnPosalji" class="btnPrijava" type="submit" value="Prijava">
                <input name="prijava-btnZaboravljenaLozinka" class="btnPrijava" type="submit" value="Zaboravljena lozinka">
            </div>
        </form>
    </div>
</section><?php }
}
