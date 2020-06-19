<section id="prijava">
    <div class="prijava-container">
        {if $status_prijava != 0}
            {if $status_prijava == 1}
                Neispravni podaci.
            {/if}
            {if $status_prijava == 2}
                Korisnik ne postoji!
            {/if}
            {if $status_prijava == 3}
                Korisnik nije aktivan. Aktivirajte svoj račun putem emaila ili se javite administatoru.
            {/if}
            {if $status_prijava == 4}
                Neispravni podaci. Zbog previše uzastopnih pogrešnih prijava račun je blokiran. Javite se administratoru.
            {/if}
        {/if}

        {if $status_zaboravljena_lozinka != 0}
            {if $status_zaboravljena_lozinka == 1}
                Nova lozinka je poslana na email
            {/if}
            {if $status_zaboravljena_lozinka == 2}
                Korisnik ne postoji!
            {/if}
            {if $status_zaboravljena_lozinka == 3}
                Korisnik nije aktivan. Javite se administatoru.
            {/if}
        {/if}

        {if $istek_sesije == 1}
            Vaša sesija je istekla. Molimo, prijavite se ponovno.
        {/if}

        <form name="prijava-form" class="prijava-form" method="POST" action="">
            <div class="prijava-container-item">
                <label for="prijava-korisnicko-ime">Korisničko ime</label> 
                <input name="prijava-korisnicko-ime" id="prijava-korisnicko-ime" type="text" maxlength="15" size="15"
                    placeholder="Korisničko ime" value="{$predefinirano_korisnicko_ime}">
            </div> 
            <div class="prijava-container-item">
                <label for="prijava-lozinka">Lozinka</label> 
                <input name="prijava-lozinka" id="prijava-lozinka" type="password" placeholder="Lozinka"> 
            </div>
            <div class="prijava-container-item">
                <label for="prijava-zapamti">Zapamti me</label>
                <input type="checkbox" name="prijava-zapamti" id="prijava-zapamti">
            </div>
            <div class="prijava-container-item">
                <input name="prijava-btnPosalji" class="btnPrijava" type="submit" value="Prijava">
                <input name="prijava-btnZaboravljenaLozinka" class="btnPrijava" type="submit" value="Zaboravljena lozinka">
            </div>
        </form>
    </div>
</section>