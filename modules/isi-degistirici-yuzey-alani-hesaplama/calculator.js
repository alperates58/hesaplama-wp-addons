function hcHxAreaHesapla() {
    const q = parseFloat(document.getElementById('hc-ha-q').value);
    const u = parseFloat(document.getElementById('hc-ha-u').value);
    const lmtd = parseFloat(document.getElementById('hc-ha-lmtd').value);

    if (isNaN(q) || isNaN(u) || isNaN(lmtd) || u <= 0 || lmtd <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // A = Q / (U * LMTD)
    const area = q / (u * lmtd);

    document.getElementById('hc-ha-res-val').innerText = area.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m²';
    
    document.getElementById('hc-ha-result').classList.add('visible');
}
