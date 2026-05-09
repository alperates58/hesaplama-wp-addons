function hcNernstHesapla() {
    const e0 = parseFloat(document.getElementById('hc-np-e0').value);
    const n = parseFloat(document.getElementById('hc-np-n').value);
    const q = parseFloat(document.getElementById('hc-np-q').value);

    if (isNaN(e0) || isNaN(n) || isNaN(q)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (q <= 0) {
        alert('Tepkime oranı (Q) pozitif olmalıdır.');
        return;
    }

    // E = E0 - (0.0592 / n) * log10(Q)
    const e = e0 - (0.05916 / n) * Math.log10(q);

    document.getElementById('hc-np-val').innerText = e.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' V';
    document.getElementById('hc-np-result').classList.add('visible');
}
