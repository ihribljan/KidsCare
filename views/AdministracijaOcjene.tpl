<section id="registracija">
    <div class="registracija-container">
        <div id="rezultat"></div>
            <div class="registracija-container-item">
                <label for="djecji-vrtici-poslovna-godina">Godina</label> 
                <input name="djecji-vrtici-poslovna-godina" id="djecji-vrtici-poslovna-godina" type="number" value="{$poslovna_godina}" readonly> 
            </div> 
            <div class="registracija-container-item">
                <label for="djecji-vrtici-id">Dječji vrtić</label>
                <select name="djecji-vrtici-id" id="djecji-vrtici-id">
                    <option value="0">- Odaberite -</option>
                    {foreach $lista_djecji_vrtici as $i}
                        <option value="{$i->Id}">{$i->Naziv}</option>
                    {/foreach}
                </select>
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
            <div class="registracija-container-item">
                <label for="djecji-vrtici-ocjena">Ocjena</label> 
                <input name="djecji-vrtici-ocjena" id="djecji-vrtici-ocjena" type="number" min="1" max="10"> <!-- kod pokretanja forme, ako postoji ocjena za taj mjesec, proslijedit parametar u smartyu ocjenu iz baze -->
            </div> 
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Spremi">
            </div>

        <script>

            $('select').on('change', function() {
                kliknutVrticIliMjesec();
            });

            $('#djecji-vrtici-dodaj-btnPosalji').on('click', function() {
                kliknutSpremi();
            });

            function kliknutVrticIliMjesec()
            {
                let djecjiVrticiId = $('#djecji-vrtici-id').val();
                let godina = $('#djecji-vrtici-poslovna-godina').val();
                let mjesec = $('#djecji-vrtici-mjesec').val();
                
                if(djecjiVrticiId != 0 && godina != 0 && mjesec != 0)
                {
                    $.ajax({
                        type: 'GET',
                        url: 'controllers/AdministracijaOcjene.php',
                        data: 'djecjiVrticiId=' + djecjiVrticiId + '&godina=' + godina + '&mjesec=' + mjesec + '&trenutniKorisnik=' + '{$trenutni_korisnik}',
                        
                        beforeSend:function(html){
                            $('.loading-overlay').show();
                        },
                        success:function(json){
                            $('.loading-overlay').hide();
                            let ocjena = jQuery.parseJSON(json);
                            $('#djecji-vrtici-ocjena').val(ocjena);
                        }
                    });
                }
            }

            function kliknutSpremi()
            {
                let djecjiVrticiId = $('#djecji-vrtici-id').val();
                let godina = $('#djecji-vrtici-poslovna-godina').val();
                let mjesec = $('#djecji-vrtici-mjesec').val();
                let ocjena = $('#djecji-vrtici-ocjena').val();
                
                if(djecjiVrticiId != 0 && godina != 0 && mjesec != 0)
                {
                    $.ajax({
                        type: 'POST',
                        url: 'controllers/AdministracijaOcjene.php',
                        data: 'djecjiVrticiId=' + djecjiVrticiId + '&godina=' + godina + '&mjesec=' + mjesec 
                            + '&ocjena=' + ocjena + '&trenutniKorisnik=' + '{$trenutni_korisnik}' + '&trenutniKorisnikId=' + '{$trenutni_korisnik_id}',
                        
                        beforeSend:function(html){
                            $('.loading-overlay').show();
                            $('#rezultat').html('Spremam...');
                        },
                        success:function(json){
                            $('.loading-overlay').hide();

                            let ok = jQuery.parseJSON(json);

                            if(ok != true)
                                $('#rezultat').html('Greška kod upisa ocjene!');
                            else
                                $('#rezultat').html('Ocjena je uspješno spremljena.');

                        }
                    });
                }

                // get nove ocjene
                kliknutVrticIliMjesec();
            }

        </script>
    </div>
</section>    

