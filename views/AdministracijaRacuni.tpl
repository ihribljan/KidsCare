    <section id="login">
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
			
            <script>
				
				$(document).ready(function () {
					// kod otvaranja dokumenta pokreni dohvat podataka, bez pojam za pretraživanje i zadani poredak
                    getAll('', 1, 'asc', 0);
                });

				let zapisaPoStranici = {$stranicenje_broj_stranica};
			
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