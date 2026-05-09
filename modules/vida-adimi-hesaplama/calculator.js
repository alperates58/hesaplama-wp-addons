function hcScrewPitchHesapla() {
    const dist = parseFloat(document.getElementById('hc-sp-dist').value) || 0;
    const threads = parseInt(document.getElementById('hc-sp-threads').value) || 1;

    if (threads === 0) return;

    const pitch = dist / threads;

    document.getElementById('hc-res-sp-val').innerText = pitch.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' mm';
    document.getElementById('hc-screw-pitch-result').classList.add('visible');
}
