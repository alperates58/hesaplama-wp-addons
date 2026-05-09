function hcEERHesapla() {
    const cinsiyet = document.getElementById('hc-eer-cinsiyet').value;
    const yas = parseFloat(document.getElementById('hc-eer-yas').value);
    const boy = parseFloat(document.getElementById('hc-eer-boy').value) / 100; // m
    const kilo = parseFloat(document.getElementById('hc-eer-kilo').value);
    const aktivite = document.getElementById('hc-eer-aktivite').value;

    if (!yas || !boy || !kilo) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    let pa = 1.0;
    let eer = 0;

    if (cinsiyet === 'erkek') {
        if (aktivite === 'sedentary') pa = 1.0;
        else if (aktivite === 'low') pa = 1.11;
        else if (aktivite === 'active') pa = 1.25;
        else if (aktivite === 'very') pa = 1.48;

        eer = 662 - (9.53 * yas) + pa * ((15.91 * kilo) + (539.6 * boy));
    } else {
        if (aktivite === 'sedentary') pa = 1.0;
        else if (aktivite === 'low') pa = 1.12;
        else if (aktivite === 'active') pa = 1.27;
        else if (aktivite === 'very') pa = 1.45;

        eer = 354 - (6.91 * yas) + pa * ((9.36 * kilo) + (726 * boy));
    }

    document.getElementById('hc-eer-value').innerText = Math.round(eer).toLocaleString('tr-TR') + ' kcal/gün';
    document.getElementById('hc-eer-result').classList.add('visible');
}
