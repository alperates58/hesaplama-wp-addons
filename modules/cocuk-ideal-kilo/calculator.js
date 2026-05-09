function hcCocukIdealKiloHesapla() {
    const yas = parseInt(document.getElementById('hc-cik-yas').value);
    
    if (isNaN(yas) || yas <= 0) {
        alert('Lütfen çocuğun yaşını giriniz.');
        return;
    }

    let idealKilo = 0;
    
    // Weech's formulas
    if (yas === 1) {
        idealKilo = 10;
    } else if (yas <= 6) {
        idealKilo = (yas * 2) + 8;
    } else if (yas <= 12) {
        idealKilo = ((yas * 7) - 5) / 2;
    } else {
        // Simple BMI based estimation for older kids
        idealKilo = (yas * 3); // Very rough, but usually kids are around age*3 in late childhood
    }

    document.getElementById('hc-cik-res-kilo').innerText = Math.round(idealKilo) + ' kg';
    document.getElementById('hc-cocuk-ideal-kilo-result').classList.add('visible');
}
