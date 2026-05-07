function hcKahveKafeinHesapla() {
    const tur = document.getElementById('hc-kkh-tur').value;
    const boyut = document.getElementById('hc-kkh-boyut').value;
    const adet = parseFloat(document.getElementById('hc-kkh-adet').value) || 0;

    let mgPer100ml = 40;
    let fixMg = 0;

    // Standard mg values per serving or per 100ml
    if (tur === 'espresso') { fixMg = 63; } // per shot
    else if (tur === 'turk') { fixMg = 60; } // per small cup
    else if (tur === 'filtre') { mgPer100ml = 40; }
    else if (tur === 'hazir') { mgPer100ml = 30; }
    else if (tur === 'americano') { fixMg = 120; } // typical 2 shots
    else if (tur === 'latte') { fixMg = 63; } // typical 1 shot
    else if (tur === 'coldbrew') { mgPer100ml = 60; }

    let ml = 0;
    if (boyut === 'kucuk') ml = 150;
    else if (boyut === 'orta') ml = 240;
    else if (boyut === 'buyuk') ml = 350;
    else if (boyut === 'shot') ml = 30;

    let total = 0;
    if (fixMg > 0) {
        total = fixMg * adet;
    } else {
        total = (mgPer100ml * (ml / 100)) * adet;
    }

    document.getElementById('hc-kkh-res-mg').innerText = Math.round(total) + ' mg';
    document.getElementById('hc-kahve-kafein-hesaplama-result').classList.add('visible');
}
