function hcPaverSandHesapla() {
    const area = parseFloat(document.getElementById('hc-ps-area').value);
    const thick = parseFloat(document.getElementById('hc-ps-thick').value);

    if (!area || !thick) {
        alert('Lütfen alan ve kalınlık bilgilerini giriniz.');
        return;
    }

    const vol = area * (thick / 100);
    const tonnage = vol * 1.6; // Average density for sand

    document.getElementById('hc-ps-res-vol').innerText = vol.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-ps-res-ton').innerText = tonnage.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-paver-sand-result').classList.add('visible');
}
