<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 18:04:39
  from 'D:\xampp\htdocs\projekt\views\AdministracijaDodajVrtic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee64a973fe3f2_80432994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09367e0130e6ca6c91b2e1998a9b024b1852b12b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\AdministracijaDodajVrtic.tpl',
      1 => 1592150645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee64a973fe3f2_80432994 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="registracija">
    <div class="registracija-container">
        <?php if ($_smarty_tpl->tpl_vars['status_spremanja']->value != 0) {?>
        <div>
            <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
        </div>
        <?php }?>
        <form novalidate class="registracija-form" method="POST" action="?pg=administracija&subpag=dodajVrtic">
            <div class="registracija-container-item">
                <label for="djecji-vrtici-naziv">Naziv vrtića</label>
                <input id="djecji-vrtici-naziv" name="djecji-vrtici-naziv" type="text" placeholder="Ime"> 
            </div>
            <div class="registracija-container-item">
                <label for="djecji-vrtici-adresa">Adresa</label> 
                <input name="djecji-vrtici-adresa" id="djecji-vrtici-adresa" type="text" placeholder="Prezime"> 
            </div>
            <div class="registracija-container-item">
                <label for="djecji-vrtici-moderator">Moderator</label> 
                <select name="djecji-vrtici-moderator" id="djecji-vrtici-moderator">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista_moderatori']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value->Id;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value->ImePrezime;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div> 
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Dodaj">
            </div>
        </form>
    </div>
</section>    

<?php }
}
