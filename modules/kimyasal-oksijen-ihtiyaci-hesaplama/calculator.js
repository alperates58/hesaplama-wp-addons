function hcKimyasalOksijenİhtiyacıHesapla() {
    const v = parseFloat(document.getElementById('hc-cod-v').value);
    const n = parseFloat(document.getElementById('hc-cod-n').value);
    const b = parseFloat(document.getElementById('hc-cod-b').value);
    const s = parseFloat(document.getElementById('hc-cod-s').value);

    if (!v || isNaN(b) || isNaN(s)) return;

    // KOİ (mg/L) = (B - S) * N * 8000 / V
    const cod = (b - s) * n * 8000 / v;

    document.getElementById('hc-cod-val').innerText = Math.round(cod).toLocaleString('tr-TR') + ' mg/L O₂';
    document.getElementById('hc-cod-result').classList.add('visible');
}
