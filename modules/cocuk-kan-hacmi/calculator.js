function hcKanHacmiHesapla() {
    const kilo = parseFloat(document.getElementById('hc-ckh-kilo').value);
    const grup = document.getElementById('hc-ckh-yas-grubu').value;

    if (isNaN(kilo) || kilo <= 0) {
        alert('Lütfen ağırlığı giriniz.');
        return;
    }

    let mlPerKg = 75;
    if (grup === 'yenidogan') mlPerKg = 95;
    else if (grup === 'yenidogan_term') mlPerKg = 85;
    else if (grup === 'bebek') mlPerKg = 80;
    else if (grup === 'cocuk') mlPerKg = 75;

    const toplamHacim = kilo * mlPerKg;

    document.getElementById('hc-ckh-res-hacim').innerText = Math.round(toplamHacim).toLocaleString('tr-TR') + ' ml';
    document.getElementById('hc-cocuk-kan-hacmi-result').classList.add('visible');
}
