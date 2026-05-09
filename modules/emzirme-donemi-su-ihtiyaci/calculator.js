function hcEmzirmeSuHesapla() {
    const w = parseFloat(document.getElementById('hc-bw-w').value);

    if (isNaN(w)) {
        alert('Lütfen kilonuzu girin.');
        return;
    }

    // Base: 35ml/kg + 800ml for breastfeeding
    const totalMl = (w * 35) + 800;
    const totalL = totalMl / 1000;

    document.getElementById('hc-bw-res').innerText = totalL.toFixed(1).toLocaleString('tr-TR') + " Litre";
    document.getElementById('hc-bf-water-result').classList.add('visible');
}
