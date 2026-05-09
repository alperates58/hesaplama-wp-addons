function hcStdErrHesapla() {
    const s = parseFloat(document.getElementById('hc-se-std').value) || 0;
    const n = parseInt(document.getElementById('hc-se-n').value) || 1;

    if (n <= 0) return;

    const se = s / Math.sqrt(n);

    document.getElementById('hc-res-se-val').innerText = se.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-std-err-result').classList.add('visible');
}
