<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 17:17:06
  from 'D:\xampp\htdocs\projekt\views\DodajDjecjiVrtic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee63f727df388_06266022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba7409c824a28608c3b070c36afc5428e4c94e5f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\DodajDjecjiVrtic.tpl',
      1 => 1592147821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee63f727df388_06266022 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="registracija">
    <div class="registracija-container">
        <form novalidate class="registracija-form" method="POST" action="?pg=administracija&subpag=noviDjecjiVrtic">
            <div class="registracija-container-item">
                <label for="registracija-ime">Naziv vrtića</label>
                <input id="registracija-ime" name="registracija-ime" type="text" placeholder="Ime"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-prezime">Adresa</label> 
                <input name="registracija-prezime" id="registracija-prezime" type="text" placeholder="Prezime"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-korisnicko-ime">Moderator</label> 
                <select name="moderator" id="moderator">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
            </div> 
            <div class="registracija-container-item">
                <input id="registracija-btnPosalji" name="registracija-btnPosalji" class="registracija-btnPosalji" type="submit" value="Dodaj">
            </div>
        </form>
    </div>
</section>    

<?php }
}
