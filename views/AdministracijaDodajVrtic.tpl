<section id="registracija">
    <div class="registracija-container">
        {if $status_spremanja != 0}
        <div>
            <p>{$poruka}</p>
        </div>
        {/if}
        <form novalidate class="registracija-form" method="POST" action="?pg=administracija&subpag=dodajVrtic">
            <div class="registracija-container-item">
                <label for="djecji-vrtici-naziv">Naziv vrtića</label>
                <input id="djecji-vrtici-naziv" name="djecji-vrtici-naziv" type="text" placeholder="Ime"> 
            </div>
            <div class="registracija-container-item">
                <label for="djecji-vrtici-adresa">Adresa</label> 
                <input name="djecji-vrtici-adresa" id="djecji-vrtici-adresa" type="text" placeholder="Prezime"> 
            </div>
            <div class="registracija-container-item">
                <label for="djecji-vrtici-moderator">Moderator</label> 
                <select name="djecji-vrtici-moderator" id="djecji-vrtici-moderator">
                    {foreach $lista_moderatori as $i}
                        <option value="{$i->Id}">{$i->ImePrezime}</option>
                    {/foreach}
                </select>
            </div> 
            <div class="registracija-container-item">
                <input id="djecji-vrtici-dodaj-btnPosalji" name="djecji-vrtici-dodaj-btnPosalji" class="registracija-btnPosalji" type="submit" value="Dodaj">
            </div>
        </form>
    </div>
</section>    

