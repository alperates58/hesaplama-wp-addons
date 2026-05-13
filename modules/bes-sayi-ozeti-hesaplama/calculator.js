function hc5NumSummaryHesapla() {
    const input = document.getElementById('hc-5n-data').value;
    const data = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 2) {
        alert('Lütfen en az iki sayı girin.');
        return;
    }

    function getPercentile(arr, p) {
        const pos = (arr.length - 1) * p;
        const base = Math.floor(pos);
        const rest = pos - base;
        if (arr[base + 1] !== undefined) {
            return arr[base] + rest * (arr[base + 1] - arr[base]);
        } else {
            return arr[base];
        }
    }

    const min = data[0];
    const q1 = getPercentile(data, 0.25);
    const med = getPercentile(data, 0.50);
    const q3 = getPercentile(data, 0.75);
    const max = data[data.length - 1];

    const fmt = (val) => val.toLocaleString('tr-TR');

    document.getElementById('hc-res-5n-min').innerText = fmt(min);
    document.getElementById('hc-res-5n-q1').innerText = fmt(q1);
    document.getElementById('hc-res-5n-med').innerText = fmt(med);
    document.getElementById('hc-res-5n-q3').innerText = fmt(q3);
    document.getElementById('hc-res-5n-max').innerText = fmt(max);

    document.getElementById('hc-bes-sayi-ozeti-hesaplama-result').classList.add('visible');
}
