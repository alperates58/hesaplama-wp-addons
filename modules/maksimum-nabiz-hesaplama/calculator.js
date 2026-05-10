function hcMaksimumNabızHesapla() {
    const age = parseFloat(document.getElementById('hc-mhr-age').value);
    if (!age) return;

    const mhr = 220 - age;

    document.getElementById('hc-mhr-val').innerText = mhr + ' bpm';
    document.getElementById('hc-mhr-result').classList.add('visible');
}
