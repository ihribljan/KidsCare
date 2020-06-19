    <section id="login">
        <div class="login-container">			

			<div class="registracija-container-item">
                <label for="djecji-vrtici-poslovna-godina">Godina</label> 
                <input name="djecji-vrtici-poslovna-godina" id="djecji-vrtici-poslovna-godina" type="number" value="{$poslovna_godina}" readonly> 
            </div> 
			<div class="registracija-container-item">
                <label for="djecji-vrtici-mjesec">Mjesec</label> 
                <select name="djecji-vrtici-mjesec" id="djecji-vrtici-mjesec">
                    <option value="0">- Odaberite -</option>
                    {foreach $mjeseci as $i}
                        <option value="{$i}">{$i}</option>
                    {/foreach}
                </select>
            </div>

			<div class="loading-overlay" style="display: none;">
				<div class="overlay-content">Učitavam podatke...</div>
			</div>
			
            <table id="djecji-vrtici-tablica">
                <thead>
                    <tr>
                        <th>Dijete</th>
                        <th>Vrtić</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody id="djecji-vrtici-tablica-body">                
                
                </tbody>
            </table>   
			
			<ul id="paginacija"></ul>
			
            <script>
				
				$(document).ready(function () {
					
                });

				 $('select').on('change', function() {
                	kliknutaGodinaIliMjesec();
            	});

				 function kliknutaGodinaIliMjesec()
				{
					let godina = $('#djecji-vrtici-poslovna-godina').val();
					let mjesec = $('#djecji-vrtici-mjesec').val();
					
					if(godina != 0 && mjesec != 0)
					{
						getAll('', 1, 'asc', 0, godina, mjesec);
					}
				}

				let zapisaPoStranici = {$stranicenje_broj_stranica};
			
				function getAll(val, sortPolje, sortTip, zapocniSaZapisom, godina, mjesec) {
								
					$.ajax({
						type: 'POST',
						url: 'controllers/KorisniciDolasci.php',
						data: 'id={$id}&sort_polje=' + sortPolje + '&sort_tip=' + sortTip + '&zapocni_sa_zapisom=' + zapocniSaZapisom + '&zapisa_po_stranici=' + zapisaPoStranici
							+ '&godina=' + godina + '&mjesec=' + mjesec,
						
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
										'<td>' + val.Dijete + '</td>' +
										'<td>' + val.Naziv + '</td>' +
										'<td>' + moment(val.Datum).format('L') + ' ' + moment(val.Datum).format('LT') + '</td>' +
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