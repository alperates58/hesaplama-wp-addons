function hcHarrisBenedictHesapla() {
    const cinsiyet = document.getElementById('hc-hb-cinsiyet').value;
    const yas = parseFloat(document.getElementById('hc-hb-yas').value);
    const boy = parseFloat(document.getElementById('hc-hb-boy').value);
    const kilo = parseFloat(document.getElementById('hc-hb-kilo').value);

    if (!yas || !boy || !kilo) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    let bmr;
    if (cinsiyet === 'erkek') {
        bmr = 88.362 + (13.397 * kilo) + (4.799 * boy) - (5.677 * yas);
    } else {
        bmr = 447.593 + (9.247 * kilo) + (3.098 * boy) - (4.330 * yas);
    }

    document.getElementById('hc-hb-value').innerText = Math.round(bmr).toLocaleString('tr-TR') + ' kcal/gün';
    document.getElementById('hc-harris-benedict-result').classList.add('visible');
}
