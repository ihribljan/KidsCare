<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 12:19:34
  from 'D:\xampp\htdocs\projekt\views\ModeratorKreirajSkupinu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb3fb66b5da9_14417708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6dc76d1caaae29a352960ee3cf77890e8dcdc7bf' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\ModeratorKreirajSkupinu.tpl',
      1 => 1592475523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eeb3fb66b5da9_14417708 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="registracija">
    <div class="registracija-container">
        <?php if ($_smarty_tpl->tpl_vars['status_spremanja']->value != 0) {?>
            <div>
                <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
            </div>
        <?php }?>
        <form novalidate class="registracija-form" method="POST" action="?pg=moderator&subpag=skupine">
            <div class="registracija-container-item">
                <label for="skupine-naziv">Naziv skupine</label>
                <input id="skupine-naziv" name="skupine-naziv" type="text" placeholder="Naziv"> 
            </div>
            <div class="registracija-container-item">
                <label for="skupine-cijena">Cijena</label> 
                <input name="skupine-cijena" id="skupine-cijena" type="number" placeholder="Cijena"> 
            </div>
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Dodaj">
            </div>
        </form>
    </div>
</section>    

<?php }
}
