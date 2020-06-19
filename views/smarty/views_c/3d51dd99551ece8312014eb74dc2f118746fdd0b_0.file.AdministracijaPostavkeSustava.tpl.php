<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 12:03:47
  from 'D:\xampp\htdocs\projekt\views\AdministracijaPostavkeSustava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb3c0301c5e5_58634253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d51dd99551ece8312014eb74dc2f118746fdd0b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\AdministracijaPostavkeSustava.tpl',
      1 => 1592474620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eeb3c0301c5e5_58634253 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="registracija">
    <div class="registracija-container">
        <form novalidate class="registracija-form" method="POST" action="?pg=administracija&subpag=postavkeSustava">
            <div class="registracija-container-item">
                <label for="postavke-stranicenje">Straničenje (broj stranica)</label>
                <input name="postavke-stranicenje" value="<?php echo $_smarty_tpl->tpl_vars['stranicenje']->value;?>
" />
            </div>
            <div class="registracija-container-item">
                <label for="postavke-broj-neuspjesnih-prijava">Broj neuspješnih prijava</label> 
                <input name="postavke-broj-neuspjesnih-prijava" value="<?php echo $_smarty_tpl->tpl_vars['neuspjesnaPrijava']->value;?>
"/>

            </div>
            <div class="registracija-container-item">
                <label for="postavke-vrijeme-trajanja-sesije">Vrijeme trajanja sesije (sati)</label> 
                <input name="postavke-vrijeme-trajanja-sesije" value="<?php echo $_smarty_tpl->tpl_vars['trajanjeSesije']->value;?>
"/>

            </div>            
            <div class="registracija-container-item">
                <label for="postavke-poslovna-godina">Poslovna godina</label> 
                <input name="postavke-poslovna-godina" value="<?php echo $_smarty_tpl->tpl_vars['poslovnaGodina']->value;?>
"/>

            </div>            
            <div class="registracija-container-item">
                <label for="postavke-trajanje-tokena">Trajanje tokena (sati)</label> 
                <input name="postavke-trajanje-tokena" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
"/>

            </div>
            <div class="registracija-container-item">
                <label for="postavke-dark-mode">Dark mode</label> 
                <input name="postavke-dark-mode" value="<?php echo $_smarty_tpl->tpl_vars['darkMode']->value;?>
"/>

            </div>
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Spremi">
            </div>
        </form>
    </div>
</section>    

<?php }
}
