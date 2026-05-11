function hcRectifierHesapla() {
    const vrms = parseFloat(document.getElementById('hc-rd-vrms').value);
    const f = parseFloat(document.getElementById('hc-rd-f').value);
    const i = parseFloat(document.getElementById('hc-rd-i').value);
    const cUf = parseFloat(document.getElementById('hc-rd-c').value);

    if (isNaN(vrms) || isNaN(f) || isNaN(i) || isNaN(cUf) || f <= 0 || cUf <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const vmax = vrms * Math.sqrt(2);
    const vdiode = 0.7 * 2; // Full bridge has 2 diodes in path
    const vdcPeak = vmax - vdiode;

    // Ripple Voltage Vr = I / (f_rect * C)
    // Full wave rectifier doubles frequency: f_rect = 2 * f
    const cF = cUf * 1e-6;
    const ripple = i / (2 * f * cF);
    
    // Average Vdc = Vpeak - (Vr / 2)
    const vdcAvg = vdcPeak - (ripple / 2);

    document.getElementById('hc-rd-res-vdc').innerText = (vdcAvg > 0 ? vdcAvg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) : "0") + ' V';
    document.getElementById('hc-rd-res-ripple').innerText = ripple.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' V (p-p)';
    
    document.getElementById('hc-rd-result').classList.add('visible');
}
