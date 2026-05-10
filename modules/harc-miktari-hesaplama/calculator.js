function hcMortarCalcHesapla() {
    const vol = parseFloat(document.getElementById('hc-mc-vol').value);
    const ratio = parseFloat(document.getElementById('hc-mc-mix').value);

    if (!vol) {
        alert('Lütfen hacmi giriniz.');
        return;
    }

    // Mortar shrinks when wet. Dry volume factor is approx 1.33
    const dryVol = vol * 1.33;
    const partSize = dryVol / (1 + ratio);
    
    const cementVol = partSize;
    const sandVol = partSize * ratio;
    
    // Cement density approx 1440 kg/m3. Bag is 50kg.
    const cementBags = (cementVol * 1440) / 50;

    document.getElementById('hc-mc-res-cem').innerText = Math.ceil(cementBags);
    document.getElementById('hc-mc-res-sand').innerText = sandVol.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-mortar-result').classList.add('visible');
}
