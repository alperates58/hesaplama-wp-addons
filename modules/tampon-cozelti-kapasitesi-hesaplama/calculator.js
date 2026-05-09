function hcBufferCapHesapla() {
    const ca = parseFloat(document.getElementById('hc-bc-acid').value) || 0;
    const cb = parseFloat(document.getElementById('hc-bc-salt').value) || 0;

    if ((ca + cb) === 0) return;

    // Van Slyke equation approximation
    const beta = 2.303 * ((ca * cb) / (ca + cb));

    document.getElementById('hc-res-bc-val').innerText = beta.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-buffer-cap-result').classList.add('visible');
}
