function hcEfficiencyHesapla() {
    const pIn = parseFloat(document.getElementById('hc-eff-in').value) || 0;
    const pOut = parseFloat(document.getElementById('hc-eff-out').value) || 0;

    if (pIn <= 0) return;

    const eff = (pOut / pIn) * 100;
    const loss = 100 - eff;

    document.getElementById('hc-res-eff-val').innerText = '%' + eff.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-eff-loss').innerText = '%' + loss.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-efficiency-result').classList.add('visible');
}
