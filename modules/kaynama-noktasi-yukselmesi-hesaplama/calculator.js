function hcKNYHesapla() {
    const i = parseFloat(document.getElementById('hc-kn-i').value);
    const kb = parseFloat(document.getElementById('hc-kn-kb').value);
    const m = parseFloat(document.getElementById('hc-kn-m').value);

    if (isNaN(i) || isNaN(kb) || isNaN(m)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // ΔTb = i * Kb * m
    const dtb = i * kb * m;

    document.getElementById('hc-kn-val').innerText = dtb.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' °C';
    document.getElementById('hc-kn-result').classList.add('visible');
}
