function hcOverlapFenceHesapla() {
    const targetH = parseFloat(document.getElementById('hc-of-height').value);
    const boardW = parseFloat(document.getElementById('hc-of-width').value);
    const overlap = parseFloat(document.getElementById('hc-of-overlap').value);
    const totalL = parseFloat(document.getElementById('hc-of-length').value);

    if (!targetH || !boardW || !totalL) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Effective height of one board = total width - overlap
    const effectiveH = boardW - overlap;
    const rowsNeeded = Math.ceil(targetH / effectiveH);
    const totalLinearMeters = rowsNeeded * totalL;

    const resVal = document.getElementById('hc-of-res-val');
    resVal.innerText = Math.round(totalLinearMeters).toLocaleString('tr-TR');

    document.getElementById('hc-overlap-fence-result').classList.add('visible');
}
