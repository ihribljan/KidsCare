<section id="registracija">
    <div class="registracija-container">
        {if $status_spremanja != 0}
            <div>
                <p>{$poruka}</p>
            </div>
        {/if}
        <form novalidate class="registracija-form" method="POST" action="?pg=moderator&subpag=skupine">
            <div class="registracija-container-item">
                <label for="skupine-naziv">Naziv skupine</label>
                <input id="skupine-naziv" name="skupine-naziv" type="text" placeholder="Naziv"> 
            </div>
            <div class="registracija-container-item">
                <label for="skupine-cijena">Cijena</label> 
                <input name="skupine-cijena" id="skupine-cijena" type="number" placeholder="Cijena"> 
            </div>
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Dodaj">
            </div>
        </form>
    </div>
</section>    

