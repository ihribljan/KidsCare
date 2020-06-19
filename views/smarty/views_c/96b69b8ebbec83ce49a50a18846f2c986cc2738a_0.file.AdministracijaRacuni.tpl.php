<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 11:31:42
  from 'D:\xampp\htdocs\projekt\views\AdministracijaRacuni.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee9e2fe66c380_07895645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96b69b8ebbec83ce49a50a18846f2c986cc2738a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\AdministracijaRacuni.tpl',
      1 => 1592386296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9e2fe66c380_07895645 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section id="login">
        <div class="login-container">			
			<div class="loading-overlay" style="display: none;">
				<div class="overlay-content">Učitavam podatke...</div>
			</div>
			
            <table id="djecji-vrtici-tablica">
                <thead>
                    <tr>
                        <th>Vrtić</th>
                        <th>Broj djece</th>
                        <th>Ukupno računa</th>
                        <th>Plaćeni računi</th>
                        <th>Neplaćeni računi</th>
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
						url: 'controllers/DjecjiVrticiRacuni.php',
						data: 'sort_polje=' + sortPolje + '&sort_tip=' + sortTip + '&zapocni_sa_zapisom=' + zapocniSaZapisom + '&zapisa_po_stranici=' + zapisaPoStranici,
						
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
										'<td>' + val.Naziv + '</td>' +
										'<td>' + val.Broj_Djece + '</td>' +
										'<td>' + val.Ukupno_Racuna + '</td>' +
										'<td>' + val.Placeni_Racuni + '</td>' +
										'<td>' + val.Neplaceni_Racuni + '</td>' +
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
