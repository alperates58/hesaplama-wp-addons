function hcKediKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-kk-weight').value);
    const statusFactor = parseFloat(document.getElementById('hc-kk-status').value);

    if (!weight || weight <= 0) {
        alert('Lütfen geçerli bir kilo giriniz.');
        return;
    }

    // Resting Energy Requirement (RER) = 70 * (weight ^ 0.75)
    const rer = 70 * Math.pow(weight, 0.75);
    
    // Daily Energy Requirement (DER) = RER * factor
    const der = rer * statusFactor;

    const resVal = document.getElementById('hc-kk-res-val');
    resVal.innerText = Math.round(der).toLocaleString('tr-TR');

    document.getElementById('hc-kedi-kalori-result').classList.add('visible');
}
