function hcGravelCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-gc-area').value);
    const thick = parseFloat(document.getElementById('hc-gc-thick').value);

    if (!area || !thick) {
        alert('Lütfen alan ve kalınlık bilgilerini giriniz.');
        return;
    }

    const vol = area * (thick / 100);
    const tonnage = vol * 1.55;

    document.getElementById('hc-gc-res-vol').innerText = vol.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-gc-res-ton').innerText = tonnage.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-gravel-result').classList.add('visible');
}
