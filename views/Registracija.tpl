<section id="registracija">
    <div class="registracija-container">

        {if $kliknuta_registracija == 1}
            <p>
                {if $registracija_uspjesna == 1}
                    Registracija uspješna!
                {/if}
                {if $registracija_uspjesna == 0}
                    {$registracija_greska}
                {/if}
            </p>
        {/if}

        <form novalidate class="registracija-form" method="POST" action="?pg=registracija">
            <div class="registracija-container-item">
                <label for="registracija-ime">Ime</label>
                <input id="registracija-ime" name="registracija-ime" type="text" placeholder="Ime"> 
                <div id="registracija-ime-provjera"></div>
            </div>
            <div class="registracija-container-item">
                <label for="registracija-prezime">Prezime</label> 
                <input name="registracija-prezime" id="registracija-prezime" type="text" placeholder="Prezime"> 
                <div id="registracija-prezime-provjera"></div>
            </div>
            <div class="registracija-container-item">
                <label for="registracija-korisnicko-ime">Korisničko ime</label> 
                <input name="registracija-korisnicko-ime" id="registracija-korisnicko-ime" type="text" maxlength="15" size="15" placeholder="Korisničko ime">
                <div id="registracija-korisnicko-ime-provjera"></div>
            </div> 
            <div class="registracija-container-item">
                <label for="registracija-godina-rodenja">Godina rođenja</label> 
                <input name="registracija-godina-rodenja" id="registracija-godina-rodenja" placeholder="2015" type="number" min="1900" max="2020"> 
                <div id="registracija-godina-rodenja-provjera"></div>
            </div>
            <div class="registracija-container-item">
                <label for="registracija-email">E-mail</label> 
                <input name="registracija-email" id="registracija-email" type="email" placeholder="email@address.com"> 
                <div id="registracija-email-provjera"></div>
            </div>
            <div class="registracija-container-item">
                <label for="registracija-lozinka">Lozinka</label> 
                <input name="registracija-lozinka" id="registracija-lozinka" type="password" placeholder="Lozinka"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-lozinka-potvrda">Potvrda lozinke</label> 
                <input name="registracija-lozinka-potvrda" id="registracija-lozinka-potvrda" type="password" placeholder="Lozinka"> 
                <div id="registracija-lozinka-provjera"></div>
            </div>
            <div class="registracija-container-item">
                <label>Ovdje još stavite kvačicu (označite da niste "robot"):</label>
                <div class="g-recaptcha" data-sitekey="6LdJwJ8UAAAAAB35FyMdg-03FOOge8fj-YvFQRne" style="margin: 0 auto;"></div>
            </div>
            <div class="registracija-container-item">
                <input id="registracija-btnPosalji" name="registracija-btnPosalji" class="registracija-btnPosalji" type="submit" value="Registracija">
            </div>
        </form>
    </div>
</section>    

