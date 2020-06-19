<html>
    <section id="login">
        <div class="login-container">
            <table id='korisnici-tablica'>
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Korisničko ime</th>
                        <th>Tip korisnika</th>
                        <th>Lozinka</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>                
                        {section name=i loop=$lista}
                        <tr>
                            <td>{$lista[i]->Ime}</td>
                            <td>{$lista[i]->Prezime}</td>
                            <td>{$lista[i]->Korisnicko_Ime}</td>
                            <td>{$lista[i]->Tipovi_Korisnika_Id}</td>
                            <td>{$lista[i]->Lozinka_Sha}</td>
                            <td>{$lista[i]->Email}</td>
                        </tr>
                        {/section}
                </tbody>
            </table>   
        </div>
    </section>
</html>