function hcHedefNabızHesapla() {
    const age = parseFloat(document.getElementById('hc-thr-age').value);
    const rest = parseFloat(document.getElementById('hc-thr-rest').value);
    const intensity = parseFloat(document.getElementById('hc-thr-intensity').value) / 100;

    if (!age || !rest || isNaN(intensity)) return;

    const mhr = 220 - age;
    const hrr = mhr - rest; // Heart Rate Reserve
    const thr = (hrr * intensity) + rest;

    document.getElementById('hc-thr-val').innerText = Math.round(thr) + ' bpm';
    document.getElementById('hc-thr-result').classList.add('visible');
}
