<section id="registracija">
    <div class="registracija-container">
        <form novalidate class="registracija-form" method="GET" action="http://barka.foi.hr/WebDiP/2019/materijali/zadace/ispis_forme.php">
            <div class="registracija-container-item">
                <label for="registracija-ime">Ime</label>
                <input id="registracija-ime" name="registracija-ime" type="text" placeholder="Ime"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-prezime">Prezime</label> 
                <input name="registracija-prezime" id="registracija-prezime" type="text" placeholder="Prezime"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-korisnicko-ime">Korisničko ime</label> 
                <input name="registracija-korisnicko-ime" id="registracija-korisnicko-ime" type="text" maxlength="15" size="15" placeholder="Korisničko ime">
            </div> 
            <div class="registracija-container-item">
                <label for="registracija-godina-rodenja">Godina rođenja</label> 
                <input name="registracija-godina-rodenja" id="registracija-godina-rodenja" type="number" value="2015"  min="1900" max="2020"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-email">E-mail</label> 
                <input name="registracija-email" id="registracija-email" type="email" placeholder="email@address.com"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-lozinka">Lozinka</label> 
                <input name="registracija-lozinka" id="registracija-lozinka" type="password" placeholder="Lozinka"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-lozinka-potvrda">Potvrda lozinke</label> 
                <input name="registracija-lozinka-potvrda" id="registracija-lozinka-potvrda" type="password" placeholder="Lozinka"> 
            </div>
            <div class="registracija-container-item">
                <label for="registracija-uvjeti">Uvjeti korištenja</label>
                <input type="checkbox" name="prihvacam" id ="prihvacam">
            </div>
            <div class="registracija-container-item">
                <input id="registracija-btnPosalji" class="registracija-btnPosalji" type="submit" value="Registracija">
            </div>
        </form>
    </div>
</section>    


