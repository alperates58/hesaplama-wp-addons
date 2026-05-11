function hcLpfHesapla() {
    const R_val = parseFloat(document.getElementById('hc-lpf-r').value);
    const R_birim = parseFloat(document.getElementById('hc-lpf-r-birim').value);
    const C_val = parseFloat(document.getElementById('hc-lpf-c').value);
    const C_birim = parseFloat(document.getElementById('hc-lpf-c-birim').value);

    if (!R_val || !C_val) {
        alert('Lütfen R ve C değerlerini giriniz.');
        return;
    }

    const R = R_val * R_birim;
    const C = C_val * C_birim;

    // fc = 1 / (2 * pi * R * C)
    const fc = 1 / (2 * Math.PI * R * C);

    let fc_str = "";
    if (fc >= 1000000) {
        fc_str = (fc / 1000000).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' MHz';
    } else if (fc >= 1000) {
        fc_str = (fc / 1000).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kHz';
    } else {
        fc_str = fc.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' Hz';
    }

    const sonucDiv = document.getElementById('hc-lpf-result');
    document.getElementById('hc-lpf-res-val').innerText = fc_str;
    
    const noteDiv = document.getElementById('hc-lpf-res-note');
    noteDiv.innerText = `Zaman Sabiti (τ): ${(R * C * 1000).toFixed(4).toLocaleString('tr-TR')} ms`;

    sonucDiv.classList.add('visible');
}
