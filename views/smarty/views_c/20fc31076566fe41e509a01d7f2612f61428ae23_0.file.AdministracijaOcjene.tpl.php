<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 14:41:48
  from 'D:\xampp\htdocs\projekt\views\AdministracijaOcjene.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eea0f8c1e5e55_78755016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20fc31076566fe41e509a01d7f2612f61428ae23' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\AdministracijaOcjene.tpl',
      1 => 1592397705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eea0f8c1e5e55_78755016 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="registracija">
    <div class="registracija-container">
        <div id="rezultat"></div>
        <!--<form novalidate class="registracija-form" method="POST" action="">-->
            <div class="registracija-container-item">
                <label for="djecji-vrtici-poslovna-godina">Godina</label> 
                <input name="djecji-vrtici-poslovna-godina" id="djecji-vrtici-poslovna-godina" type="number" value="<?php echo $_smarty_tpl->tpl_vars['poslovna_godina']->value;?>
" readonly> 
            </div> 
            <div class="registracija-container-item">
                <label for="djecji-vrtici-id">Dječji vrtić</label>
                <select name="djecji-vrtici-id" id="djecji-vrtici-id">
                    <option value="0">- Odaberite -</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista_djecji_vrtici']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value->Id;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value->Naziv;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <div class="registracija-container-item">
                <label for="djecji-vrtici-mjesec">Mjesec</label> 
                <select name="djecji-vrtici-mjesec" id="djecji-vrtici-mjesec">
                    <option value="0">- Odaberite -</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mjeseci']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <div class="registracija-container-item">
                <label for="djecji-vrtici-ocjena">Ocjena</label> 
                <input name="djecji-vrtici-ocjena" id="djecji-vrtici-ocjena" type="number" min="1" max="10"> <!-- kod pokretanja forme, ako postoji ocjena za taj mjesec, proslijedit parametar u smartyu ocjenu iz baze -->
            </div> 
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Spremi">
            </div>
        <!--</form>-->

        <?php echo '<script'; ?>
>

            $('select').on('change', function() {
                kliknutVrticIliMjesec();
            });

            $('#djecji-vrtici-dodaj-btnPosalji').on('click', function() {
                kliknutSpremi();
            });

            function kliknutVrticIliMjesec()
            {
                let djecjiVrticiId = $('#djecji-vrtici-id').val();
                let godina = $('#djecji-vrtici-poslovna-godina').val();
                let mjesec = $('#djecji-vrtici-mjesec').val();
                
                if(djecjiVrticiId != 0 && godina != 0 && mjesec != 0)
                {
                    //alert('klik: ' + djecjiVrticiId + ' god: ' + godina + ' mj: ' + mjesec);

                    $.ajax({
                        type: 'GET',
                        url: 'controllers/AdministracijaOcjene.php',
                        data: 'djecjiVrticiId=' + djecjiVrticiId + '&godina=' + godina + '&mjesec=' + mjesec + '&trenutniKorisnik=' + '<?php echo $_smarty_tpl->tpl_vars['trenutni_korisnik']->value;?>
',
                        
                        beforeSend:function(html){
                            $('.loading-overlay').show();
                        },
                        success:function(json){
                            $('.loading-overlay').hide();
                            let ocjena = jQuery.parseJSON(json);
                            $('#djecji-vrtici-ocjena').val(ocjena);
                        }
                    });
                }
            }

            function kliknutSpremi()
            {
                let djecjiVrticiId = $('#djecji-vrtici-id').val();
                let godina = $('#djecji-vrtici-poslovna-godina').val();
                let mjesec = $('#djecji-vrtici-mjesec').val();
                let ocjena = $('#djecji-vrtici-ocjena').val();
                
                if(djecjiVrticiId != 0 && godina != 0 && mjesec != 0)
                {
                    $.ajax({
                        type: 'POST',
                        url: 'controllers/AdministracijaOcjene.php',
                        data: 'djecjiVrticiId=' + djecjiVrticiId + '&godina=' + godina + '&mjesec=' + mjesec 
                            + '&ocjena=' + ocjena + '&trenutniKorisnik=' + '<?php echo $_smarty_tpl->tpl_vars['trenutni_korisnik']->value;?>
' + '&trenutniKorisnikId=' + '<?php echo $_smarty_tpl->tpl_vars['trenutni_korisnik_id']->value;?>
',
                        
                        beforeSend:function(html){
                            $('.loading-overlay').show();
                             $('#rezultat').html('Spremam...');
                        },
                        success:function(json){
                            $('.loading-overlay').hide();

                            let ok = jQuery.parseJSON(json);

                            if(ok != true)
                                $('#rezultat').html('Greška kod upisa ocjene!');
                            else
                                $('#rezultat').html('Ocjena je uspješno spremljena.');

                        }
                    });
                }

                // pokreni dohvat nove ocjene iz baze
                kliknutVrticIliMjesec();
            }

        <?php echo '</script'; ?>
>
    </div>
</section>    

<?php }
}
