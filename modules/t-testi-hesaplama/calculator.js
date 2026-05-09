function hcTTestHesapla() {
    const input = document.getElementById('hc-tt-data').value;
    const data = input.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));
    const mu = parseFloat(document.getElementById('hc-tt-mu').value) || 0;

    if (data.length < 2) {
        alert('Lütfen en az 2 veri noktası girin.');
        return;
    }

    const n = data.length;
    const mean = data.reduce((a, b) => a + b) / n;
    const variance = data.reduce((a, b) => a + Math.pow(b - mean, 2), 0) / (n - 1);
    const stdErr = Math.sqrt(variance / n);

    const t = (mean - mu) / stdErr;
    const df = n - 1;

    document.getElementById('hc-res-tt-val').innerText = t.toFixed(4);
    document.getElementById('hc-res-tt-df').innerText = df;
    
    // Simple p-value assessment based on standard thresholds (2-tailed)
    // Note: This is an approximation for UI feedback
    const note = document.getElementById('hc-tt-note');
    if (Math.abs(t) > 2.0) { // Very rough approximation for p < 0.05
        note.innerText = "Sonuç anlamlı olma eğilimindedir.";
        note.style.color = "#27ae60";
    } else {
        note.innerText = "Anlamlı bir fark gözlemlenmedi.";
        note.style.color = "#c0392b";
    }

    document.getElementById('hc-t-test-result').classList.add('visible');
}
