function hcRlcImphesapla() {
    const f = parseFloat(document.getElementById('hc-ri-f').value) || 1;
    const r = parseFloat(document.getElementById('hc-ri-r').value) || 0;
    const l = (parseFloat(document.getElementById('hc-ri-l').value) || 0) / 1000;
    const c = (parseFloat(document.getElementById('hc-ri-c').value) || 0) / 1000000;

    const omega = 2 * Math.PI * f;
    const xl = omega * l;
    const xc = c > 0 ? 1 / (omega * c) : 0;

    const x = xl - xc;
    const z = Math.sqrt(Math.pow(r, 2) + Math.pow(x, 2));
    const phi = Math.atan2(x, r) * (180 / Math.PI);

    document.getElementById('hc-res-ri-z').innerText = z.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Ω';
    document.getElementById('hc-res-ri-phi').innerText = phi.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '°';
    document.getElementById('hc-rlc-imp-result').classList.add('visible');
}
