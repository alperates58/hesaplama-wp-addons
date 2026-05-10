function hcDeckCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-dc-area').value);
    const widthCm = parseFloat(document.getElementById('hc-dc-width').value);
    const gapMm = parseFloat(document.getElementById('hc-dc-gap').value);

    if (!area || !widthCm) {
        alert('Lütfen alan ve tahta genişliği bilgilerini giriniz.');
        return;
    }

    // Effective width in meters = (width + gap) / 100
    const effectiveWidth = (widthCm + (gapMm / 10)) / 100;
    
    // Total linear meters = Area / Effective Width
    const linearMeters = (area / effectiveWidth) * 1.1; // 10% waste

    const resVal = document.getElementById('hc-dc-res-val');
    resVal.innerText = Math.ceil(linearMeters).toLocaleString('tr-TR');

    document.getElementById('hc-deck-result').classList.add('visible');
}
