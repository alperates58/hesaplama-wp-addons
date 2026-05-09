function hcMglPpmConvert() {
    const rho = parseFloat(document.getElementById('hc-mglppm-rho').value);
    const mgl = parseFloat(document.getElementById('hc-mglppm-mgl').value);

    if (isNaN(rho) || isNaN(mgl) || rho === 0) return;

    const ppm = mgl / rho;
    document.getElementById('hc-mglppm-res').innerText = ppm.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + " PPM";
}
window.addEventListener('load', hcMglPpmConvert);
