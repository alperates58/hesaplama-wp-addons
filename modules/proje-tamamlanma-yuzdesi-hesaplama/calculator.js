function hcProjectPctHesapla() {
    const done = parseFloat(document.getElementById('hc-pp-done').value);
    const total = parseFloat(document.getElementById('hc-pp-total').value);

    if (isNaN(done) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const pct = (done / total) * 100;
    const cappedPct = Math.min(100, Math.max(0, pct));

    document.getElementById('hc-pp-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 1 })}`;
    document.getElementById('hc-pp-bar').style.width = cappedPct + '%';
    document.getElementById('hc-project-pct-result').classList.add('visible');
}
