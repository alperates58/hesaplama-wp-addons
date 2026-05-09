function hcEntalpiHesapla() {
    const m = parseFloat(document.getElementById('hc-ent-m').value);
    const c = parseFloat(document.getElementById('hc-ent-c').value);
    const dt = parseFloat(document.getElementById('hc-ent-dt').value);

    if (isNaN(m) || isNaN(c) || isNaN(dt)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // ΔH = m * c * ΔT
    const dh = m * c * dt;

    document.getElementById('hc-ent-val').innerText = (dh / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kJ';
    document.getElementById('hc-ent-result').classList.add('visible');
}
