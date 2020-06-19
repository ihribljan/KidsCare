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
                        <th>Id</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Korisničko ime</th>
                        <th>E-mail</th>
                        <th>Godina rođenja</th>
                        <th>Tip korisnika</th>
                        <th>Aktivan</th>
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
			
				function ocisti() {
					$('#statusKorisnikaTekst').val('');
					getAll('', 1, 'asc', 0);
				}

				function kliknutKorisnik(korisnickoIme, id)
				{
					//alert('klik id: ' + id + ' kor_ime: ' + korisnickoIme);

					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciStatus.php',
						data: 'korisnickoIme=' + korisnickoIme + '&trenutniKorisnik=' + '{$trenutni_korisnik}', // OVAKO SE KORISTI SMARTY VARIJABLA U JAVASCRIPTU => '{$trenutni_korisnik}'
						
						beforeSend:function(html){
							$('.loading-overlay').show();
						},
						success:function(json){
							$('.loading-overlay').hide();

							let novoPoljeAktivan = jQuery.parseJSON(json);
							//alert(novoPoljeAktivan);

							$("#korisnik-" + id + " td.aktivan").html(novoPoljeAktivan);
							$("#korisnik-" + id + " td.link").html(sloziLink(korisnickoIme, id, novoPoljeAktivan));
							//alert('ok');
						}
					});

				}

				function sloziLink(korisnickoIme, id, aktivan)
				{
					let html = '<a href=\"#\" onClick=\"kliknutKorisnik(\'' + korisnickoIme + '\', \'' + id + '\');\">';
						
					if(aktivan == 1)
						html += 'Blokiraj';
					else
						html += 'Aktiviraj';

					html += '</a>';

					return html;
				}
				
				let zapisaPoStranici = {$stranicenje_broj_stranica};
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom) {
									
					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciTrazi.php',
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
										'<td>' + val.Id + '</td>' +
										'<td>' + val.Ime + '</td>' +
										'<td>' + val.Prezime + '</td>' +
										'<td>' + val.Korisnicko_Ime + '</td>' +
										'<td>' + val.Email + '</td>' +
										'<td>' + val.Godina_Rodenja + '</td>' +
										'<td>' + val.Tipovi_Korisnika_Id + '</td>' +
										'<td class="aktivan">' + bool_u_tekst(val.Aktivan) + '</td>' +
										'<td class="link">' + sloziLink(val.Korisnicko_Ime, val.Id, val.Aktivan) + '</td>' +
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