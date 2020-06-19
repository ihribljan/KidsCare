<section id="login">
    <div class="login-container">
        {if $logiran == 1}
        <span>
            Dobrodošli, {$korisnicko_ime}<br />
            <a href="?pg=odjava">
                <button type="button" class="btnPrijava">ODJAVI SE</button>
            </a>
        </span>
        {else if}
        <span>
            <a href="?pg=prijava">
                <button type="button" class="btnPrijava">PRIJAVI SE</button>
            </a>
            <a href="?pg=registracija">
                <button type="button" class="btnRegistracija">REGISTRIRAJ SE</button>
            </a>
        </span>
        {/if}
    </div>
</section>