function hcCfHesapla() {
    const actual = parseFloat(document.getElementById('hc-cf-actual').value);
    const power = parseFloat(document.getElementById('hc-cf-power').value);
    const period = parseFloat(document.getElementById('hc-cf-period').value);

    if (isNaN(actual) || isNaN(power) || isNaN(period)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const maxProduction = power * (period * 24);
    const cf = (actual / maxProduction) * 100;

    document.getElementById('hc-res-cf-max').innerText = maxProduction.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' MWh';
    document.getElementById('hc-res-cf-val').innerText = '%' + cf.toFixed(2);

    document.getElementById('hc-cf-result').classList.add('visible');
}
