function hcQ1Hesapla() {
    const input = document.getElementById('hc-q1-data').value;
    const data = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 2) {
        alert('Lütfen en az iki sayı girin.');
        return;
    }

    const pos = (data.length - 1) * 0.25;
    const base = Math.floor(pos);
    const rest = pos - base;
    
    let q1;
    if (data[base + 1] !== undefined) {
        q1 = data[base] + rest * (data[base + 1] - data[base]);
    } else {
        q1 = data[base];
    }

    document.getElementById('hc-res-q1-val').innerText = q1.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-birinci-ceyrek-deger-hesaplama-result').classList.add('visible');
}
