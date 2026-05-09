function hcUltrasoundFreqHesapla() {
    const v = parseFloat(document.getElementById('hc-uf-v').value) || 0;
    const waveMm = parseFloat(document.getElementById('hc-uf-wave').value) || 0;

    if (waveMm <= 0) return;

    const waveM = waveMm / 1000;
    const f = v / waveM;
    const fMhz = f / 1000000;

    document.getElementById('hc-res-uf-val').innerText = fMhz.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MHz';
    document.getElementById('hc-ultrasound-freq-result').classList.add('visible');
}
