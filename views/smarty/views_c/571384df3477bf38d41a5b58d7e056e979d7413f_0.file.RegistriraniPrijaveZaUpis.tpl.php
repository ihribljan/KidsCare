<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 11:57:52
  from 'D:\xampp\htdocs\projekt\views\RegistriraniPrijaveZaUpis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee9e9205bf0c2_21255030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '571384df3477bf38d41a5b58d7e056e979d7413f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\RegistriraniPrijaveZaUpis.tpl',
      1 => 1592386383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9e9205bf0c2_21255030 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section id="login">
        <div class="login-container">			
			<div class="loading-overlay" style="display: none;">
				<div class="overlay-content">Učitavam podatke...</div>
			</div>
			
            <table id="djecji-vrtici-tablica">
                <thead>
                    <tr>
                        <th>Broj</th>
                        <th>Vrijeme</th>
                        <th>Javni poziv br.</th>
                        <th>Roditelj</th>
                        <th>Vrtić</th>
                        <th>Prihvaćeno</th>
                    </tr>
                </thead>
                <tbody id="djecji-vrtici-tablica-body">                
                
                </tbody>
            </table>   
			
			<ul id="paginacija"></ul>
			
            <?php echo '<script'; ?>
>
				
				$(document).ready(function () {
					// kod otvaranja dokumenta pokreni dohvat podataka, bez pojam za pretraživanje i zadani poredak
                    getAll('', 1, 'asc', 0);
                });

				let zapisaPoStranici = <?php echo $_smarty_tpl->tpl_vars['stranicenje_broj_stranica']->value;?>
;
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
								
					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciPrijaveZaUpis.php',
						data: 'id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&sort_polje=' + sortPolje + '&sort_tip=' + sortTip + '&zapocni_sa_zapisom=' + zapocniSaZapisom + '&zapisa_po_stranici=' + zapisaPoStranici,
						
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
										'<td>' + val.Broj + '</td>' +
										//'<td>' + val.Datum + '</td>' +
										'<td>' + moment(val.Datum).format('L') + ' ' + moment(val.Datum).format('LT') + '</td>' +
										'<td>' + val.Javni_Poziv + '</td>' +
										'<td>' + val.Roditelj + '</td>' +
										'<td>' + val.Vrtic + '</td>' +
										'<td>' + bool_u_tekst(val.Prihvaceno) + '</td>' +
									'</tr>';
								
								$('#djecji-vrtici-tablica-body').append(html);
							});
							
							//if(obj.ukupno_zapisa != 0)
								//$('#ukupanBrojZapisa').html('Ukupno zapisa: ' + obj.ukupno_zapisa);

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
