function hcBearingLifeHesapla() {
    const c = parseFloat(document.getElementById('hc-bl-c').value) || 1;
    const pVal = parseFloat(document.getElementById('hc-bl-p').value) || 1;
    const exp = parseFloat(document.getElementById('hc-bl-type').value) || 3;
    const n = parseFloat(document.getElementById('hc-bl-n').value) || 1;

    // L10 = (C/P)^p in million revolutions
    const l10Rev = Math.pow(c / pVal, exp);
    
    // L10h = (10^6 * L10) / (60 * n) in hours
    const l10h = (1000000 * l10Rev) / (60 * n);

    document.getElementById('hc-res-bl-rev').innerText = l10Rev.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Milyon Devir';
    document.getElementById('hc-res-bl-hours').innerText = Math.round(l10h).toLocaleString('tr-TR') + ' Saat';
    document.getElementById('hc-bearing-life-result').classList.add('visible');
}
