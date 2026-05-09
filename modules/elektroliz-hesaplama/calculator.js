function hcElektrolizHesapla() {
    const I = parseFloat(document.getElementById('hc-el-i').value);
    const t = parseFloat(document.getElementById('hc-el-t').value);
    const Ma = parseFloat(document.getElementById('hc-el-mw').value);
    const n = parseFloat(document.getElementById('hc-el-n').value);

    if (isNaN(I) || isNaN(t) || isNaN(Ma) || isNaN(n)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const F = 96485; // Faraday sabiti (C/mol)
    // m = (I * t * Ma) / (n * F)
    const mass = (I * t * Ma) / (n * F);

    document.getElementById('hc-el-val').innerText = mass.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g';
    document.getElementById('hc-el-result').classList.add('visible');
}
