    <section id="login">
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
			
            <script>
				
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
						data: 'korisnickoIme={$korisnicko_ime}&idRacuna=' + idRacuna,
						
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

				let zapisaPoStranici = {$stranicenje_broj_stranica};
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
								
					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciRacuni.php',
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