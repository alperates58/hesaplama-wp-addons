function hcVDWHesapla() {
    const n = parseFloat(document.getElementById('hc-vdw-n').value) || 1;
    const V = parseFloat(document.getElementById('hc-vdw-v').value) || 1;
    const T = parseFloat(document.getElementById('hc-vdw-t').value) || 1;
    const R = 0.08206; // Gas constant L*atm/mol*K

    const gasData = document.getElementById('hc-vdw-gas').value.split(',');
    const a = parseFloat(gasData[0]);
    const b = parseFloat(gasData[1]);

    if (V <= n * b) {
        alert('Hacim, moleküllerin hacminden küçük olamaz!');
        return;
    }

    // P = (nRT / (V - nb)) - a(n/V)^2
    const P = (n * R * T) / (V - n * b) - a * Math.pow(n / V, 2);

    document.getElementById('hc-res-vdw-val').innerText = P.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' atm';
    document.getElementById('hc-vdw-calc-result').classList.add('visible');
}
