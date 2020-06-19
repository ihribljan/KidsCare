<section id="registracija">
    <div class="registracija-container">
        <form novalidate class="registracija-form" method="POST" action="?pg=administracija&subpag=postavkeSustava">
            <div class="registracija-container-item">
                <label for="postavke-stranicenje">Straničenje (broj stranica)</label>
                <input name="postavke-stranicenje" value="{$stranicenje}" />
            </div>
            <div class="registracija-container-item">
                <label for="postavke-broj-neuspjesnih-prijava">Broj neuspješnih prijava</label> 
                <input name="postavke-broj-neuspjesnih-prijava" value="{$neuspjesnaPrijava}"/>

            </div>
            <div class="registracija-container-item">
                <label for="postavke-vrijeme-trajanja-sesije">Vrijeme trajanja sesije (sati)</label> 
                <input name="postavke-vrijeme-trajanja-sesije" value="{$trajanjeSesije}"/>

            </div>            
            <div class="registracija-container-item">
                <label for="postavke-poslovna-godina">Poslovna godina</label> 
                <input name="postavke-poslovna-godina" value="{$poslovnaGodina}"/>

            </div>            
            <div class="registracija-container-item">
                <label for="postavke-trajanje-tokena">Trajanje tokena (sati)</label> 
                <input name="postavke-trajanje-tokena" value="{$token}"/>

            </div>
            <div class="registracija-container-item">
                <label for="postavke-dark-mode">Dark mode</label> 
                <input name="postavke-dark-mode" value="{$darkMode}"/>

            </div>
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Spremi">
            </div>
        </form>
    </div>
</section>    

