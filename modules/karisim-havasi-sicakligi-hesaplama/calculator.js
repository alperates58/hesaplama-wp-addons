function hcAirMixTempHesapla() {
    const q1 = parseFloat(document.getElementById('hc-amt-q1').value);
    const t1 = parseFloat(document.getElementById('hc-amt-t1').value);
    const q2 = parseFloat(document.getElementById('hc-amt-q2').value);
    const t2 = parseFloat(document.getElementById('hc-amt-t2').value);

    if (isNaN(q1) || isNaN(t1) || isNaN(q2) || isNaN(t2) || (q1 + q2) <= 0) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Tmix = (q1*t1 + q2*t2) / (q1+q2)
    const tMix = (q1 * t1 + q2 * t2) / (q1 + q2);

    document.getElementById('hc-amt-res-val').innerText = tMix.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' °C';
    
    document.getElementById('hc-amt-result').classList.add('visible');
}
