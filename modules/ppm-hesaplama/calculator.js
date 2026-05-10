function hcPpmHesapla() {
    const mass = parseFloat(document.getElementById('hc-ppm-mass').value);
    const vol = parseFloat(document.getElementById('hc-ppm-vol').value);

    if (!mass || !vol) return;

    // ppm = mg / L
    const ppm = mass / vol;

    document.getElementById('hc-ppm-val').innerText = ppm.toFixed(2) + ' ppm';
    document.getElementById('hc-ppm-result').classList.add('visible');
}
