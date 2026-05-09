function hcStokesHesapla() {
    const rMicrons = parseFloat(document.getElementById('hc-sl-r').value) || 0;
    const rhop = parseFloat(document.getElementById('hc-sl-rhop').value) || 0;
    const rhof = parseFloat(document.getElementById('hc-sl-rhof').value) || 0;
    const mu = parseFloat(document.getElementById('hc-sl-mu').value) || 0.001;

    const r = rMicrons / 1000000;
    const g = 9.81;

    // v = (2/9) * r^2 * (rhop - rhof) * g / mu
    const v = (2 / 9) * Math.pow(r, 2) * (rhop - rhof) * g / mu;

    document.getElementById('hc-res-sl-val').innerText = v.toExponential(4) + ' m/s';
    document.getElementById('hc-stokes-result').classList.add('visible');
}
