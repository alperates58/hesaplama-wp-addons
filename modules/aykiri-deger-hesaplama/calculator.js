function hcOutlierDetectHesapla() {
    const input = document.getElementById('hc-od-data').value;
    const data = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 4) {
        alert('Lütfen en az 4 sayı girin.');
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

    const q1 = getPercentile(data, 0.25);
    const q3 = getPercentile(data, 0.75);
    const iqr = q3 - q1;

    const lowerBound = q1 - 1.5 * iqr;
    const upperBound = q3 + 1.5 * iqr;

    const outliers = data.filter(x => x < lowerBound || x > upperBound);

    const fmt = (val) => val.toLocaleString('tr-TR');

    document.getElementById('hc-res-od-list').innerText = outliers.length > 0 ? outliers.join(', ') : "Aykırı değer bulunamadı.";
    document.getElementById('hc-res-od-count').innerText = outliers.length;
    document.getElementById('hc-res-od-lower').innerText = fmt(lowerBound);
    document.getElementById('hc-res-od-upper').innerText = fmt(upperBound);

    document.getElementById('hc-aykiri-deger-hesaplama-result').classList.add('visible');
}
