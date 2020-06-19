$(document).ready(function(){

    // provjera korisničkog imena u bazi
    $('#registracija-korisnicko-ime').keyup(function (){
        
        $("#registracija-korisnicko-ime-provjera").html('');
        
        let username = $(this).val();
        console.log(username);
        $.ajax({
            url: 'controllers/RegistracijaProvjeraPodataka.php',
            method: 'post',
            data: {AJAXusername: username},
                success: function(data){
                    let obj = jQuery.parseJSON(data);
                    if(obj.broj != "0")
                        $("#registracija-korisnicko-ime-provjera").html('Korisničko ime već postoji!');
                }
        });
    });

    // email 
    $("#registracija-email").keyup(function (){
        
        let podaciOk = true; 

        let reg = /^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
        //console.log(reg);
        //console.log($("#registracija-email").val());

        $("#registracija-email-provjera").text(null);
        
        if(!reg.exec($("#registracija-email").val())) {
            podaciOk = false;
        }

        let email = $(this).val();
        //console.log(email);
        $.ajax({
            url: 'controllers/RegistracijaProvjeraPodataka.php',
            method: 'post',
            data: {AJAXemail: email},
                success: function(data){
                    let obj = jQuery.parseJSON(data);
                    if(obj.broj != "0")
                        $("#registracija-email-provjera").html('Email postoji!');
                }
        });

        //console.log('podaci: ' + podaciOk + ' postoji: ' + postoji);

        if(!podaciOk)
            $("#registracija-email-provjera").html('Email je u neispravnom formatu.');
    });

    // lozinka i potvrda lozinke iste!
    $('#registracija-lozinka-potvrda').keyup(function (){
        let lozinka = document.getElementById("registracija-lozinka").value;
        let lozinkaPotvrda = document.getElementById("registracija-lozinka-potvrda").value;
        $("#registracija-lozinka-provjera").text(null);
        if(lozinka != lozinkaPotvrda) {
            $("#registracija-lozinka-provjera").text('Lozinke nisu jednake!');
        }
    });

    // ime samo slova i prvo veliko
    $("#registracija-ime").keyup(function (){
        
        let reg = /^[A-ZŠĐČĆŽ]([A-ZŠĐČĆŽa-zšđčćž]{0,29})$/;
        console.log(reg);
        console.log($("#registracija-ime").val());

        $("#registracija-ime-provjera").text(null);
        
        if(reg.exec($("#registracija-ime").val())) {
            $("#registracija-ime-provjera").text('');
        }
        else {
            $("#registracija-ime-provjera").text('Ime mora počinjati velikim slovom!');
        }
    });

    // prezime samo slova i prvo veliko
    $("#registracija-prezime").keyup(function (){
        
        let reg = /^[A-ZŠĐČĆŽ]([A-ZŠĐČĆŽa-zšđčćž]{0,29})$/;
        console.log(reg);
        console.log($("#registracija-prezime").val());

        $("#registracija-prezime-provjera").text(null);
        
        if(reg.exec($("#registracija-prezime").val())) {
            $("#registracija-prezime-provjera").text('');
        }
        else {
            $("#registracija-prezime-provjera").text('Prezime mora počinjati velikim slovom!');
        }
    });

    //godina ne smije bit veća od 2020
    $("#registracija-godina-rodenja").keyup(function (){
        let godina = document.getElementById("registracija-godina-rodenja").value;
        $("#registracija-godina-rodenja-provjera").text(null);
        if(godina > 2020) {
            $("#registracija-godina-rodenja-provjera").text("Godina nije ispravna!");
        }
    })

});

