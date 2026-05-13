function hcKutuGrafigiHesapla() {
    const input = document.getElementById('hc-box-input').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 4) {
        alert('Kutu grafiği için en az 4 veri girmelisiniz.');
        return;
    }

    const getQuartile = (arr, q) => {
        const pos = (arr.length - 1) * q;
        const base = Math.floor(pos);
        const rest = pos - base;
        if (arr[base + 1] !== undefined) {
            return arr[base] + rest * (arr[base + 1] - arr[base]);
        } else {
            return arr[base];
        }
    };

    const min = data[0];
    const max = data[data.length - 1];
    const q1 = getQuartile(data, 0.25);
    const q2 = getQuartile(data, 0.5);
    const q3 = getQuartile(data, 0.75);
    const iqr = q3 - q1;

    const lowerBound = q1 - 1.5 * iqr;
    const upperBound = q3 + 1.5 * iqr;
    const outliers = data.filter(n => n < lowerBound || n > upperBound);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-box-min').innerText = fmt(min);
    document.getElementById('hc-res-box-q1').innerText = fmt(q1);
    document.getElementById('hc-res-box-q2').innerText = fmt(q2);
    document.getElementById('hc-res-box-q3').innerText = fmt(q3);
    document.getElementById('hc-res-box-max').innerText = fmt(max);
    document.getElementById('hc-res-box-iqr').innerText = fmt(iqr);
    document.getElementById('hc-res-box-outliers').innerText = outliers.length > 0 ? outliers.join(', ') : 'Yok';

    document.getElementById('hc-kutu-grafigi-result').classList.add('visible');
}
