function hcDiveWeightHesapla() {
    const bodyWeight = parseFloat(document.getElementById('hc-dw-weight').value);
    const suitExtra = parseFloat(document.getElementById('hc-dw-suit').value);
    const waterExtra = parseFloat(document.getElementById('hc-dw-water').value);

    if (!bodyWeight) {
        alert('Lütfen vücut ağırlığınızı giriniz.');
        return;
    }

    // Rough approximation: 10% of body weight + suit extra + water extra
    let totalLead = (bodyWeight * 0.1) + suitExtra + waterExtra;

    const resVal = document.getElementById('hc-dw-res-val');
    resVal.innerText = Math.round(totalLead);

    document.getElementById('hc-dive-weight-result').classList.add('visible');
}
