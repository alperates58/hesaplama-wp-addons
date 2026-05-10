function hcPortCarbHesapla() {
    const carbPer100 = parseFloat(document.getElementById('hc-pc-type').value);
    const weight = parseFloat(document.getElementById('hc-pc-weight').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen miktarı giriniz.');
        return;
    }

    const totalCarb = (weight / 100) * carbPer100;

    document.getElementById('hc-pc-res').innerText = totalCarb.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-porsiyon-karbonhidrat-result').classList.add('visible');
}
