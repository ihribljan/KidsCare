    <section id="login">
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
			
            <script>
				
				$(document).ready(function () {
					// kod otvaranja dokumenta pokreni dohvat podataka, bez pojam za pretraživanje i zadani poredak
                    getAll('', 1, 'asc', 0);
                });

				let zapisaPoStranici = {$stranicenje_broj_stranica};
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
								
					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciPrijaveZaUpis.php',
						data: 'id={$id}&sort_polje=' + sortPolje + '&sort_tip=' + sortTip + '&zapocni_sa_zapisom=' + zapocniSaZapisom + '&zapisa_po_stranici=' + zapisaPoStranici,
						
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
										'<td>' + moment(val.Datum).format('L') + ' ' + moment(val.Datum).format('LT') + '</td>' +
										'<td>' + val.Javni_Poziv + '</td>' +
										'<td>' + val.Roditelj + '</td>' +
										'<td>' + val.Vrtic + '</td>' +
										'<td>' + bool_u_tekst(val.Prihvaceno) + '</td>' +
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
            </script>

        </div>
    </section>