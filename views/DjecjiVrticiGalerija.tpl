    <section id="login">
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
			
            <script>
				
				$(document).ready(function () {
					// kod otvaranja dokumenta pokreni dohvat podataka, id za pretraživanje i zadani poredak
					getAll({$djecjiVrticiId}, 1, 'asc', 0);
                });

				let zapisaPoStranici = {$stranicenje_broj_stranica};
			
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
            </script>

        </div>
    </section>