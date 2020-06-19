<section id="login">
    <div class="login-container">
            <div class="filter">
				<input id="statusKorisnikaTekst" name="statusKorisnikaTekst" type="text" placeholder="Korisničko ime..">
				<input name="statusKorisnikaSubmit" id="statusKorisnikaSubmit" type="button" value="Traži" onclick="getAll($('#statusKorisnikaTekst').val(), 1, 'asc', 0)"/>
				<input name="statusKorisnikaOcisti" type="reset" value="Očisti" onclick="ocisti()"/>
				<span id="ukupanBrojZapisa"></span>
            </div>
            <table id="djecji-vrtici-tablica">
                <thead>
                    <tr>
                        <th>Radnja</th>
                        <th>Virtualno vrijeme
							<a href="#" onClick="getAll($('#statusKorisnikaTekst').val(), 'Vrijeme', 'asc', 0)">&#8593;</a> 
							<a href="#" onClick="getAll($('#statusKorisnikaTekst').val(), 'Vrijeme', 'desc', 0)">&#8595;</a> 
						</th>
                        <th>Korisničko ime</th>
                        <th>Ip adresa</th>
                        <th>Opis</th>
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
			
				function ocisti() {
					$('#statusKorisnikaTekst').val('');
					getAll('', 1, 'asc', 0);
				}

				let zapisaPoStranici = {$stranicenje_broj_stranica};
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
									
					$.ajax({
						type: 'POST',
						url: 'controllers/DnevnikTrazi.php',
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
									'<tr id=\"korisnik-' + val.Id + '\">' +
										'<td>' + val.Sifra_Radnje + '</td>' +
										'<td>' + moment(val.Vrijeme * 1000).format('LLLL') + '</td>' +
										'<td>' + val.Korisnicko_Ime + '</td>' +
										'<td>' + val.Ip + '</td>' +
										'<td>' + val.Opis_Radnje + '</td>' +
									'</tr>';
								
								$('#djecji-vrtici-tablica-body').append(html);
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
					
		
            </script>
    </div>
</section>