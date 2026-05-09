function hcYoungModulusHesapla() {
    const stress = parseFloat(document.getElementById('hc-ym-stress').value) || 0;
    const strain = parseFloat(document.getElementById('hc-ym-strain').value) || 0;

    if (strain === 0) return;

    const e = stress / strain;
    const eGpa = e / 1e9;

    document.getElementById('hc-res-ym-val').innerText = eGpa.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' GPa';
    document.getElementById('hc-young-modulus-result').classList.add('visible');
}
