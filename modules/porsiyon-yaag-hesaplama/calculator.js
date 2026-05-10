function hcPortFatHesapla() {
    const fatPct = parseFloat(document.getElementById('hc-pf-type').value);
    const weight = parseFloat(document.getElementById('hc-pf-weight').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen miktarı giriniz.');
        return;
    }

    const totalFat = (weight / 100) * fatPct;

    document.getElementById('hc-pf-res').innerText = totalFat.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-porsiyon-yaag-result').classList.add('visible');
}
