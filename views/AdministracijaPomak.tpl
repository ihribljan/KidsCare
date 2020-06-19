<section id="login">
    <div class="login-container">
        <span>
            <p>
                {if $kliknut_pomak}
                    {if $ok}
                        OBAVIJEST: Pomak virtualnog vremena je uspješno izvršen.
                    {else}
                        OBAVIJEST: Greška kod pomaka virtualnog vremena.
                    {/if}
                {/if}
            </p>
            <p>Serversko vrijeme je {$serversko_vrijeme}.</p>
            <p>Trenutni pomak u mojim podacima je {$pomak} h.</p>
            <p>Trenutno virtualno vrijeme aplikacije je {$virtualno_vrijeme}.</p>
         </span>
         <br />
         <p>Konfiguracijska json datoteka ima upisan pomak na {$sati_procitano} h.</p>
         <form novalidate class="registracija-form" method="POST" action="?pg=administracija&subpag=pomak">
            <div class="registracija-container-item">
                <input id="pomak-btnPosalji" name="pomak-btnPosalji" class="registracija-btnPosalji" type="submit" value="Izvrši novi pomak">
            </div>
        </form>
    </div>
</section>