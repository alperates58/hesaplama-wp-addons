function hcSacHesapla() {
    const w = parseFloat(document.getElementById('hc-sac-w').value);
    const l = parseFloat(document.getElementById('hc-sac-l').value);
    const t = parseFloat(document.getElementById('hc-sac-t').value);

    if (isNaN(w) || isNaN(l) || isNaN(t) || w <= 0 || l <= 0 || t <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Weight = area * thickness * density
    // Area in m2, thickness in mm, density = 7.85 kg/m2 per mm
    const weightKg = w * l * t * 7.85;

    document.getElementById('hc-sac-val').innerText = weightKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-sac-result').classList.add('visible');
}
