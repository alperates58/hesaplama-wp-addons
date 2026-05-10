function hcPrivacyFenceHesapla() {
    const lengthM = parseFloat(document.getElementById('hc-pf-length').value);
    const boardW = parseFloat(document.getElementById('hc-pf-width').value);
    const gap = parseFloat(document.getElementById('hc-pf-gap').value || 0);

    if (!lengthM || !boardW) {
        alert('Lütfen uzunluk ve tahta genişliğini giriniz.');
        return;
    }

    // Effective width of one board + gap in meters
    const effectiveW = (boardW + gap) / 100;
    const count = Math.ceil(lengthM / effectiveW);

    const resVal = document.getElementById('hc-pf-res-val');
    resVal.innerText = count.toLocaleString('tr-TR');

    document.getElementById('hc-privacy-fence-result').classList.add('visible');
}
