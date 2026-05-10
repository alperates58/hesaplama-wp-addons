function hcSuHedefiHesapla() {
    const weight = parseFloat(document.getElementById('hc-wi-weight').value);
    const activity = document.getElementById('hc-wi-activity').value;

    if (!weight) return;

    // Base = 35 mL per kg
    let total = weight * 35;

    if (activity === 'medium') total += 500;
    if (activity === 'high') total += 1000;

    document.getElementById('hc-wi-val').innerText = (total / 1000).toFixed(1) + ' Litre';
    document.getElementById('hc-wi-result').classList.add('visible');
}
