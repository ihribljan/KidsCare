<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 21:28:36
  from 'D:\xampp\htdocs\projekt\views\JavniPozivi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eebc0641778a0_35243379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2d14e004eb16cd6d443c3715bb08646cd729a81' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\JavniPozivi.tpl',
      1 => 1592491765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eebc0641778a0_35243379 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section id="login">
        <div class="login-container">
            <div class="filter">
				<input id="djecjiVrticTekst" name="djecjiVrticTekst" type="text" placeholder="Naziv dječjeg vrtića..">
				<input name="djecjiVrticSubmit" id="djecjiVrticSubmit" type="button" value="Traži" onclick="getAll($('#djecjiVrticTekst').val(), 1, 'asc', 0)"/>
				<input name="djecjiVrticOcisti" type="reset" value="Očisti" onclick="ocisti()"/>
				<span id="ukupanBrojZapisa"></span>
            </div>
			
			<div class="loading-overlay" style="display: none;">
				<div class="overlay-content">Učitavam podatke...</div>
			</div>
			
            <table id="javni-pozivi-tablica">
                <thead>
                    <tr>
                        <th>Broj</th>
                        <th>Datum</th>
                        <th>
							Datum od
							<a href="#" onClick="getAll($('#djecjiVrticTekst').val(), 'Datum_Od', 'asc', 0)">&#8593;</a> 
							<a href="#" onClick="getAll($('#djecjiVrticTekst').val(), 'Datum_Od', 'desc', 0)">&#8595;</a> 
						</th>
                        <th>
							Datum do
							<a href="#" onClick="getAll($('#djecjiVrticTekst').val(), 'Datum_Do', 'asc', 0)">&#8593;</a> 
							<a href="#" onClick="getAll($('#djecjiVrticTekst').val(), 'Datum_Do', 'desc', 0)">&#8595;</a> 
						</th>
                        <th>Moderator</th>
                        <th>Broj mjesta</th>
                        <th>Dječji vrtić</th>
                    </tr>
                </thead>
                <tbody id="javni-pozivi-tablica-body">                
                
                </tbody>
            </table>   
			
			<ul id="paginacija"></ul>
			
            <?php echo '<script'; ?>
>
				
				$(document).ready(function () {
					// kod otvaranja dokumenta pokreni dohvat podataka, bez pojam za pretraživanje i zadani poredak
                    getAll('', 1, 'asc', 0);
                });
			
				function ocisti() {
					$('#djecjiVrticTekst').val('');
					getAll('', 1, 'asc', 0);
				}
				
				let zapisaPoStranici = <?php echo $_smarty_tpl->tpl_vars['stranicenje_broj_stranica']->value;?>
;
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
									
					$.ajax({
						type: 'POST',
						url: 'controllers/JavniPoziviTrazi.php',
						data: 'val=' + val + '&sort_polje=' + sortPolje + '&sort_tip=' + sortTip + '&zapocni_sa_zapisom=' + zapocniSaZapisom + '&zapisa_po_stranici=' + zapisaPoStranici,
						
						beforeSend:function(html){
							$('.loading-overlay').show();
							$('#ukupanBrojZapisa').html('');
						},
						success:function(json){
							$('.loading-overlay').hide();							
							
							// iz jsona array složit u tablicu
							$('#javni-pozivi-tablica-body').html('');

							var obj = jQuery.parseJSON(json);
										
							$.each(obj.lista, function(index, val) {
								let html = 
									'<tr>' +
										'<td>' + val.Broj + '</td>' +
										'<td>' + moment(val.Datum).format('L') + '</td>' +
										'<td>' + moment(val.Datum_Od).format('L') + ' ' + moment(val.Datum_Od).format('LT') + '</td>' +
										'<td>' + moment(val.Datum_Do).format('L') + ' ' + moment(val.Datum_Do).format('LT') + '</td>' +
										'<td>' + val.Moderator + '</td>' +
										'<td>' + val.Broj_Mjesta + '</td>' +
										'<td>' + val.Vrtic + '</td>' +
									'</tr>';
								
								$('#javni-pozivi-tablica-body').append(html);
							});
							
							if(obj.ukupno_zapisa != 0)
								$('#ukupanBrojZapisa').html('Ukupno zapisa: ' + obj.ukupno_zapisa);

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
    </section>
<?php }
}
