function hcIIHesapla() {
    const vb = parseFloat(document.getElementById('hc-ii-vb').value);
    const vs = parseFloat(document.getElementById('hc-ii-vs').value);
    const n = parseFloat(document.getElementById('hc-ii-n').value);
    const m = parseFloat(document.getElementById('hc-ii-m').value);

    if (isNaN(vb) || isNaN(vs) || isNaN(n) || isNaN(m)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (m === 0) {
        alert('Numune miktarı 0 olamaz.');
        return;
    }

    // Iodine Value = (Vb - Vs) * N * 12.69 / m
    const iv = (vb - vs) * n * 12.69 / m;

    document.getElementById('hc-ii-val').innerText = iv.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ii-result').classList.add('visible');
}
