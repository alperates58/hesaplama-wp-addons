function hcGibbsHesapla() {
    const dh = parseFloat(document.getElementById('hc-g-h').value); // kJ/mol
    const ds = parseFloat(document.getElementById('hc-g-s').value); // J/mol·K
    const tc = parseFloat(document.getElementById('hc-g-t').value);

    if (isNaN(dh) || isNaN(ds) || isNaN(tc)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const t = tc + 273.15;
    // ΔG = ΔH - TΔS (ΔH kJ, ΔS J olduğu için birimleri eşitleyelim)
    const dg = dh - (t * (ds / 1000));

    document.getElementById('hc-g-val').innerText = dg.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kJ/mol';
    
    const desc = document.getElementById('hc-g-desc');
    if (dg < 0) {
        desc.innerText = "Tepkime istemlidir (Spontane).";
        desc.style.color = "#4CAF50";
    } else if (dg > 0) {
        desc.innerText = "Tepkime istemli değildir (Spontane değil).";
        desc.style.color = "#F44336";
    } else {
        desc.innerText = "Sistem dengededir.";
        desc.style.color = "#FFC107";
    }

    document.getElementById('hc-g-result').classList.add('visible');
}
