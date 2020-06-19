function paginacija(ukupno_zapisa, zapisaPoStranici, zapocniSaZapisom, nazivFunkcije, val, sortPolje, sortTip)
{
    let ukStranica = 0, trenutnaStranica = 0;
														
    // ukupan broj stranice je broj svih zapisa podijeljen sa zapisom po stranici (zaokružen na veći cijeli broj)
    if(zapisaPoStranici != 0)
        ukStranica = Math.ceil(ukupno_zapisa/zapisaPoStranici);
                                
    // ako sam započeo sa prvim zapisom, onda je trenutna stranica 1
    if(zapocniSaZapisom == 0)
    {
        trenutnaStranica = 1;
    }
    // trenutnu stranicu dobijem tako da vidim sa kojim zapisom sam sad započeo, i podijelim ga sa brojem zapisa koji idu po stranici
    else
    {
        if(zapisaPoStranici != 0)
            trenutnaStranica = Math.ceil(zapocniSaZapisom / zapisaPoStranici) + 1;
    }

    // navigacija po stranicama
    let pag = '';

    /*
     linkovi su zamišljeni PRVA NATRAG trenutna NAPRIJED ZADNJA
        ako sam na 2. str, onda nemam NATRAG, imam samo PRVA; a ako sam na predzadnjoj onda nemam NAPRIJED, nego imam samo ZADNJA
    */
    
    // ako nisam na prvoj stranici, stavi link na prvu
    if(trenutnaStranica != 1)
    {
        pag += '<a href="#" onClick="return ' + nazivFunkcije + '(\'' + val + '\', \'' + sortPolje + '\', \'' + sortTip + '\', ' + 0 + ');"><li>Prva</li></a>';
    }
    
    // ako sam na 3+ staviti link na prethodnu stranicu
    if(trenutnaStranica > 2)
    {
        pag += '<a href="#" onClick="return ' + nazivFunkcije + '(\'' + val + '\', \'' + sortPolje + '\', \'' + sortTip + '\', ' + (zapocniSaZapisom-zapisaPoStranici) + ');"><li>Natrag</li></a>';
    }							
    
    // trenutna pozicija
    if(ukupno_zapisa != 0)
        pag += '<li>Stranica ' + trenutnaStranica + ' od ' + ukStranica + '</li>';
    else
        pag += '<li>Nema zapisa</li>';
                            
    // vidi ima li smisla link na naprijed (ako nije na predzadnjoj stranici - trenutna stranica mora biti manja od ukupnog broja stranica -1)
    if(trenutnaStranica < ukStranica-1)
    {
        pag += '<a href="#" onClick="return ' + nazivFunkcije + '(\'' + val + '\', \'' + sortPolje + '\', \'' + sortTip + '\', ' + (zapocniSaZapisom+zapisaPoStranici) + ');"><li>Naprijed</li></a>';
    }
    
    // vidi ima li zadnja stranica (znači trenutna stranica je manja od ukupnog broja stranica)
    if(trenutnaStranica < ukStranica)
    {
        // izračunaj koji je prvi zapis na zadnoj stranici (koliko ima stranica -1, pomnoži sa brojem zapisa po stranici)
        let zadnjaStranicaPrviZapis = (ukStranica-1) * zapisaPoStranici;
        pag += '<a href="#" onClick="return ' + nazivFunkcije + '(\'' + val + '\', \'' + sortPolje + '\', \'' + sortTip + '\', ' + zadnjaStranicaPrviZapis + ');"><li>Zadnja</li></a>';
    }

    return pag;
}


