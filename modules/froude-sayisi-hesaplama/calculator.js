function hcFroudeHesapla() {
    const v = parseFloat(document.getElementById('hc-fr-v').value);
    const l = parseFloat(document.getElementById('hc-fr-l').value);
    const g = 9.80665;

    if (isNaN(v) || isNaN(l) || l <= 0 || v < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Fr = v / sqrt(g * L)
    const fr = v / Math.sqrt(g * l);

    document.getElementById('hc-fr-res-val').innerText = fr.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    let desc = "";
    if (fr < 1) desc = "Kritik altı akış (Subcritical)";
    else if (fr === 1) desc = "Kritik akış (Critical)";
    else desc = "Kritik üstü akış (Supercritical)";

    document.getElementById('hc-fr-res-desc').innerText = desc;
    document.getElementById('hc-fr-result').classList.add('visible');
}
