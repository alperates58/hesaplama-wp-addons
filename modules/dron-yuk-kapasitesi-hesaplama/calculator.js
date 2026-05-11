function hcDronPayloadHesapla() {
    const motors = parseInt(document.getElementById('hc-dyk-motors').value);
    const thrust = parseFloat(document.getElementById('hc-dyk-thrust').value);
    const weight = parseFloat(document.getElementById('hc-dyk-weight').value);
    const targetRatio = parseFloat(document.getElementById('hc-dyk-ratio').value);

    if (isNaN(thrust) || isNaN(weight) || isNaN(targetRatio) || targetRatio <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Toplam İtki
    const totalThrust = motors * thrust;
    
    // (Total Weight + Payload) = Total Thrust / Target Ratio
    // Payload = (Total Thrust / Target Ratio) - Weight
    const payload = (totalThrust / targetRatio) - weight;

    const finalPayload = Math.max(0, payload);

    document.getElementById('hc-dyk-res-val').innerText = Math.round(finalPayload).toLocaleString('tr-TR') + ' gram';
    document.getElementById('hc-dyk-res-total').innerText = 'Toplam Maks. İtki: ' + totalThrust.toLocaleString('tr-TR') + ' g';
    
    document.getElementById('hc-dyk-result').classList.add('visible');
}
