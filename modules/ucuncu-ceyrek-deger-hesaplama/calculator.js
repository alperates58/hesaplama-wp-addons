function hcQ3Hesapla() {
    const input = document.getElementById('hc-q3-data').value;
    const data = input.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x)).sort((a, b) => a - b);

    if (data.length === 0) return;

    const n = data.length;
    const pos = (n + 1) * 0.75;
    const base = Math.floor(pos);
    const rest = pos - base;

    let q3;
    if (data[base - 1] !== undefined && data[base] !== undefined) {
        q3 = data[base - 1] + rest * (data[base] - data[base - 1]);
    } else {
        q3 = data[data.length - 1];
    }

    document.getElementById('hc-res-q3-val').innerText = q3.toLocaleString('tr-TR');
    document.getElementById('hc-q3-calc-result').classList.add('visible');
}
