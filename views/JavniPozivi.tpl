<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>

    <section id="login">
        <div class="login-container">
            <div class="filter">
                <input name="search" id="search" type="search" placeholder="Naziv dječjeg vrtića..">
            </div>
            <table id='javni-pozivi-tablica'> 
                <thead>
                    <tr>
                        <th>Broj</th>
                        <th>Datum</th>
                        <th>Datum od</th>
                        <th>Datum do</th>
                        <th>Moderator</th>
                        <th>Broj mjesta</th>
                        <th>Dječji vrtić</th>
                    </tr>
                </thead>
                <tbody>                
                        {section name=i loop=$lista}
                        <tr>
                            <td>{$lista[i]->Broj}</td>
                            <td>{$lista[i]->Datum}</td>
                            <td>{$lista[i]->Datum_Od}</td>
                            <td>{$lista[i]->Datum_Do}</td>
                            <td>{$lista[i]->Moderator}</td>
                            <td>{$lista[i]->Broj_Mjesta}</td>
                            <td>{$lista[i]->Vrtic}</td>
                        </tr>
                        {/section} 
                </tbody>
            </table>   

            <script>
                $(document).ready(function () {

                    $('#search').keyup(function() {
                        let naziv = document.getElementById("search").value;
                        console.log(naziv);
                    });
                });
            </script>

        </div>
    </section>
</html>