function hcVucutSuOraniHesapla() {
    const cinsiyet = document.getElementById('hc-bw-cinsiyet').value;
    const yas = parseFloat(document.getElementById('hc-bw-yas').value);
    const boy = parseFloat(document.getElementById('hc-bw-boy').value);
    const kilo = parseFloat(document.getElementById('hc-bw-kilo').value);

    if (!yas || !boy || !kilo) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    let tbw = 0;
    if (cinsiyet === 'erkek') {
        tbw = 2.447 - (0.09156 * yas) + (0.1074 * boy) + (0.3362 * kilo);
    } else {
        tbw = -2.097 + (0.1069 * boy) + (0.2466 * kilo);
    }

    const percent = (tbw / kilo) * 100;

    document.getElementById('hc-bw-liters').innerText = tbw.toFixed(1).toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-bw-percent').innerText = '%' + percent.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-body-water-result').classList.add('visible');
}
