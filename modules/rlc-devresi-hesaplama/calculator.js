function hcRlcCircuitHesapla() {
    const l = (parseFloat(document.getElementById('hc-rc-l').value) || 0) / 1000;
    const c = (parseFloat(document.getElementById('hc-rc-c').value) || 0) / 1000000;
    const r = parseFloat(document.getElementById('hc-rc-r').value) || 0.1;

    // fr = 1 / (2 * pi * sqrt(L * C))
    const fr = 1 / (2 * Math.PI * Math.sqrt(l * c));
    
    // Q = (1/R) * sqrt(L/C)
    const q = (1 / r) * Math.sqrt(l / c);
    
    // BW = fr / Q
    const bw = fr / q;

    document.getElementById('hc-res-rc-fr').innerText = fr.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Hz';
    document.getElementById('hc-res-rc-q').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-rc-bw').innerText = bw.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Hz';
    
    document.getElementById('hc-rlc-circuit-result').classList.add('visible');
}
