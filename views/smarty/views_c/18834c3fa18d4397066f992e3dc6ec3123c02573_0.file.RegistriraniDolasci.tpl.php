<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 20:28:37
  from 'D:\xampp\htdocs\projekt\views\RegistriraniDolasci.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eebb255c204b5_59316923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18834c3fa18d4397066f992e3dc6ec3123c02573' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\RegistriraniDolasci.tpl',
      1 => 1592504915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eebb255c204b5_59316923 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section id="login">
        <div class="login-container">			

			<div class="registracija-container-item">
                <label for="djecji-vrtici-poslovna-godina">Godina</label> 
                <input name="djecji-vrtici-poslovna-godina" id="djecji-vrtici-poslovna-godina" type="number" value="<?php echo $_smarty_tpl->tpl_vars['poslovna_godina']->value;?>
" readonly> 
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

			<div class="loading-overlay" style="display: none;">
				<div class="overlay-content">Učitavam podatke...</div>
			</div>
			
            <table id="djecji-vrtici-tablica">
                <thead>
                    <tr>
                        <th>Dijete</th>
                        <th>Vrtić</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody id="djecji-vrtici-tablica-body">                
                
                </tbody>
            </table>   
			
			<ul id="paginacija"></ul>
			
            <?php echo '<script'; ?>
>
				
				$(document).ready(function () {
					
                });

				 $('select').on('change', function() {
                	kliknutaGodinaIliMjesec();
            	});

				 function kliknutaGodinaIliMjesec()
				{
					let godina = $('#djecji-vrtici-poslovna-godina').val();
					let mjesec = $('#djecji-vrtici-mjesec').val();
					
					if(godina != 0 && mjesec != 0)
					{
						getAll('', 1, 'asc', 0, godina, mjesec);
					}
				}

				let zapisaPoStranici = <?php echo $_smarty_tpl->tpl_vars['stranicenje_broj_stranica']->value;?>
;
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom, godina, mjesec) {
								
					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciDolasci.php',
						data: 'id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&sort_polje=' + sortPolje + '&sort_tip=' + sortTip + '&zapocni_sa_zapisom=' + zapocniSaZapisom + '&zapisa_po_stranici=' + zapisaPoStranici
							+ '&godina=' + godina + '&mjesec=' + mjesec,
						
						beforeSend:function(html){
							$('.loading-overlay').show();
							$('#ukupanBrojZapisa').html('');
						},
						success:function(json){
							$('.loading-overlay').hide();							
							
							// iz jsona array složit u tablicu
							$('#djecji-vrtici-tablica-body').html('');

							var obj = jQuery.parseJSON(json);
										
							$.each(obj.lista, function(index, val) {
								let html = 
									'<tr>' +
										'<td>' + val.Dijete + '</td>' +
										'<td>' + val.Naziv + '</td>' +
										'<td>' + moment(val.Datum).format('L') + ' ' + moment(val.Datum).format('LT') + '</td>' +
									'</tr>';
								
								$('#djecji-vrtici-tablica-body').append(html);
							});

							// paginacija
							$('#paginacija').html('');
							let pag = paginacija(obj.ukupno_zapisa, zapisaPoStranici, zapocniSaZapisom, 'getAll', val, sortPolje, sortTip);	
							$('#paginacija').html(pag);				
						}
					});
				}
            <?php echo '</script'; ?>
>

        </div>
    </section><?php }
}
