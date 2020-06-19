<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 11:54:01
  from 'D:\xampp\htdocs\projekt\views\RegistriraniRacuni.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee9e839c6c8a6_54279975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab6c34045951a5abd37bb43645f8394d5ab98786' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\RegistriraniRacuni.tpl',
      1 => 1592386388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9e839c6c8a6_54279975 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section id="login">
        <div class="login-container">			
			<div class="loading-overlay" style="display: none;">
				<div class="overlay-content">Učitavam podatke...</div>
			</div>
			
            <table id="djecji-vrtici-tablica">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Datum računa</th>
                        <th>Vrtić</th>
                        <th>Roditelj</th>
                        <th>Dijete</th>
                        <th>Iznos</th>
                        <th>Plaćeno</th>
                        <th>Akcija</th>
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


				function kliknutRacun(idRacuna)
				{
					//alert('klik id: ' + idRacuna);

					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciRacunPlati.php',
						data: 'korisnickoIme=<?php echo $_smarty_tpl->tpl_vars['korisnicko_ime']->value;?>
&idRacuna=' + idRacuna,
						
						beforeSend:function(html){
							$('.loading-overlay').show();
						},
						success:function(json){
							$('.loading-overlay').hide();

							// dohvat novog status računa iz jsona (plaćeno ili ne)
							let novoPoljeAktivan = jQuery.parseJSON(json);
							//alert(novoPoljeAktivan);

							$("#racun-" + idRacuna + " td.placeno").html(novoPoljeAktivan);
							$("#racun-" + idRacuna + " td.link").html(sloziLink(idRacuna, novoPoljeAktivan));
							//alert('ok');
						}
					});

				}

				function sloziLink(id, placeno)
				{
					let html = '';
					
					if(placeno == 0)
						html = '<a href=\"#\" onClick=\"kliknutRacun(\'' + id + '\');\">Plati!</a>';
					else
						html = ''; //'Plaćeno';

					return html;
				}

				let zapisaPoStranici = <?php echo $_smarty_tpl->tpl_vars['stranicenje_broj_stranica']->value;?>
;
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
								
					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciRacuni.php',
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
									'<tr id=\"racun-' + val.Id + '\">' +
										'<td>' + val.Id + '</td>' +
										'<td>' + moment(val.Datum).format('L') + '</td>' +
										'<td>' + val.Naziv + '</td>' +
										'<td>' + val.Roditelj + '</td>' +
										'<td>' + val.Dijete + '</td>' +
										'<td>' + val.Iznos + '</td>' +
										'<td class=\"placeno\">' + bool_u_tekst(val.Placeno) + '</td>' +
										'<td class=\"link\">' + sloziLink(val.Id, val.Placeno) + '</td>' +
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
