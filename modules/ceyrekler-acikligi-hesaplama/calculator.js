function hcIQRHesapla() {
    const input = document.getElementById('hc-iqr-data').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 4) {
        alert('Çeyrekler için en az 4 veri noktası girmelidir.');
        return;
    }

    function getQuartile(arr, q) {
        const pos = (arr.length - 1) * q;
        const base = Math.floor(pos);
        const rest = pos - base;
        if (arr[base + 1] !== undefined) {
            return arr[base] + rest * (arr[base + 1] - arr[base]);
        } else {
            return arr[base];
        }
    }

    const q1 = getQuartile(data, 0.25);
    const q3 = getQuartile(data, 0.75);
    const iqr = q3 - q1;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-iqr-val').innerText = fmt(iqr);
    document.getElementById('hc-res-iqr-q1').innerText = fmt(q1);
    document.getElementById('hc-res-iqr-q3').innerText = fmt(q3);

    document.getElementById('hc-ceyrekler-acikligi-hesaplama-result').classList.add('visible');
}
