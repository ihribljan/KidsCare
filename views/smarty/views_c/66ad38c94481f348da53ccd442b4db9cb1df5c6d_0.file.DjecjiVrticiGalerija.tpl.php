<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 21:20:30
  from 'D:\xampp\htdocs\projekt\views\DjecjiVrticiGalerija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eebbe7e07aa44_01179475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66ad38c94481f348da53ccd442b4db9cb1df5c6d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\DjecjiVrticiGalerija.tpl',
      1 => 1592491756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eebbe7e07aa44_01179475 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section id="login">
        <div class="login-container">			
			<div class="loading-overlay" style="display: none;">
				<div class="overlay-content">Učitavam podatke...</div>
			</div>
			
            <table id="djecji-vrtici-tablica">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>God. rođenja</th>
                        <th>Spol</th>
                        <th>Slika</th>
                    </tr>
                </thead>
                <tbody id="djecji-vrtici-tablica-body">                
                
                </tbody>
            </table>   
			
			<ul id="paginacija"></ul>
			
            <?php echo '<script'; ?>
>
				
				$(document).ready(function () {
					// kod otvaranja dokumenta pokreni dohvat podataka, id za pretraživanje i zadani poredak
					getAll(<?php echo $_smarty_tpl->tpl_vars['djecjiVrticiId']->value;?>
, 1, 'asc', 0);
                });

				let zapisaPoStranici = <?php echo $_smarty_tpl->tpl_vars['stranicenje_broj_stranica']->value;?>
;
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
									
					$.ajax({
						type: 'POST',
						url: 'controllers/DjecjiVrticiGalerijaTrazi.php',
						data: 'val=' + val + '&sort_polje=' + sortPolje + '&sort_tip=' + sortTip + '&zapocni_sa_zapisom=' + zapocniSaZapisom + '&zapisa_po_stranici=' + zapisaPoStranici,
						
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
										'<td>' + val.Id + '</td>' +
										'<td>' + val.Ime + '</td>' +
										'<td>' + val.Prezime + '</td>' +
										'<td>' + val.Godina_Rodenja + '</td>' +
										'<td>' + val.Spol + '</td>';
									if(val.Potvrda == 1)
										html += '<td><img src="' +  val.Slika + '" alt="" style="width: 100px; height: 75px;" /></td>';
									else
										html += '<td>Slika nedostupna</td>'
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
