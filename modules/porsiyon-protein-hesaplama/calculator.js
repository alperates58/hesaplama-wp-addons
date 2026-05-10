function hcPortProtHesapla() {
    const protPer100 = parseFloat(document.getElementById('hc-pp-type').value);
    const weight = parseFloat(document.getElementById('hc-pp-weight').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen miktarı giriniz.');
        return;
    }

    const totalProt = (weight / 100) * protPer100;

    document.getElementById('hc-pp-res').innerText = totalProt.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-porsiyon-protein-result').classList.add('visible');
}
