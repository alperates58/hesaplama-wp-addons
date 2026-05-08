function hcDinlenmeMetabolizmaHesapla() {
    const cinsiyet = document.getElementById('hc-rmr-cinsiyet').value;
    const yas = parseFloat(document.getElementById('hc-rmr-yas').value);
    const boy = parseFloat(document.getElementById('hc-rmr-boy').value);
    const kilo = parseFloat(document.getElementById('hc-rmr-kilo').value);

    if (!yas || !boy || !kilo) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    let rmr;
    if (cinsiyet === 'erkek') {
        rmr = (10 * kilo) + (6.25 * boy) - (5 * yas) + 5;
    } else {
        rmr = (10 * kilo) + (6.25 * boy) - (5 * yas) - 161;
    }

    document.getElementById('hc-rmr-value').innerText = Math.round(rmr).toLocaleString('tr-TR') + ' kcal/gün';
    document.getElementById('hc-dinlenme-metabolizma-result').classList.add('visible');
}
