function hcQuartilesHesapla() {
    const input = document.getElementById('hc-q-data').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 2) {
        alert('En az 2 veri noktası girmelisiniz.');
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
    const q2 = getQuartile(data, 0.50);
    const q3 = getQuartile(data, 0.75);
    const min = data[0];
    const max = data[data.length - 1];

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-q-min').innerText = fmt(min);
    document.getElementById('hc-res-q1').innerText = fmt(q1);
    document.getElementById('hc-res-q2').innerText = fmt(q2);
    document.getElementById('hc-res-q3').innerText = fmt(q3);
    document.getElementById('hc-res-q-max').innerText = fmt(max);

    document.getElementById('hc-ceyrek-deger-hesaplama-result').classList.add('visible');
}
