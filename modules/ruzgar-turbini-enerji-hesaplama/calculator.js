function hcRuzgarEnerjiHesapla() {
    const power = parseFloat(document.getElementById('hc-we-power').value); // MW
    const cf = parseFloat(document.getElementById('hc-we-cf').value);

    if (isNaN(power) || isNaN(cf)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Energy (MWh) = Power (MW) * Hours in year * CF
    const annualMwh = power * 8760 * (cf / 100);
    const homes = (annualMwh * 1000) / 3500;

    document.getElementById('hc-res-we-mwh').innerText = annualMwh.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' MWh';
    document.getElementById('hc-res-we-homes').innerText = Math.round(homes).toLocaleString('tr-TR') + ' Hane';

    document.getElementById('hc-we-result').classList.add('visible');
}
