function hcSatilanMalinMaliyetiHesapla() {
    const opening = parseFloat(document.getElementById('hc-smm-opening').value) || 0;
    const purchases = parseFloat(document.getElementById('hc-smm-purchases').value) || 0;
    const closing = parseFloat(document.getElementById('hc-smm-closing').value) || 0;

    // SMM = Opening + Purchases - Closing
    const smm = opening + purchases - closing;

    document.getElementById('hc-smm-value').innerText = smm.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-smm-result').classList.add('visible');
}
