<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <section id="login">
        <div class="login-container">
            <table id='djecji-vrtici-tablica'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Naziv</th>
                        <th>Adresa</th>
                        <th>Kapacitet</th>
                        <th>Administrator</th>
                        <th>Moderator</th>
                        <th>Prosječna ocjena</th>
                    </tr>
                </thead>
                <tbody>                
                        {section name=i loop=$lista}
                        <tr>
                            <td>{$lista[i]->Id}</td>
                            <td>{$lista[i]->Naziv}</td>
                            <td>{$lista[i]->Adresa}</td>
                            <td>{$lista[i]->Kapacitet}</td>
                            <td>{$lista[i]->Administrator}</td>
                            <td>{$lista[i]->Moderator}</td>
                            <td>{$lista[i]->Prosjecna_Ocjena}</td>
                        </tr>
                        {/section}
                </tbody>
            </table>   

            <script>
                $(document).ready(function () {

                    $("#djecji-vrtici-tablica").find('tr').click(function () {

                        // get id vrtića
                        let red = $(this).find('td:first').text();

                        let path = '/projekt/uploads/photogalleries/' + red + '/index.jfif';

                        console.log("path: " + path);

                        window.open(path, '_blank');
                    });
                });
            </script>

        </div>
    </section>
</html>