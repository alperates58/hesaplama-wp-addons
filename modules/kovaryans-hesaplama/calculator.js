function hcKovaryansHesapla() {
    const xInput = document.getElementById('hc-cov-x').value;
    const yInput = document.getElementById('hc-cov-y').value;

    const parse = (input) => input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));
    const x = parse(xInput);
    const y = parse(yInput);

    if (x.length < 2 || y.length < 2) {
        alert('En az 2 veri noktası girmelisiniz.');
        return;
    }

    if (x.length !== y.length) {
        alert('X ve Y veri setlerinin boyutları aynı olmalıdır.');
        return;
    }

    const n = x.length;
    const xMean = x.reduce((a, b) => a + b, 0) / n;
    const yMean = y.reduce((a, b) => a + b, 0) / n;

    let sum = 0;
    for (let i = 0; i < n; i++) {
        sum += (x[i] - xMean) * (y[i] - yMean);
    }

    const sampleCov = sum / (n - 1);
    const popCov = sum / n;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-cov-sample').innerText = fmt(sampleCov);
    document.getElementById('hc-res-cov-pop').innerText = fmt(popCov);

    let desc = "";
    if (sampleCov > 0) {
        desc = "Pozitif Kovaryans: Değişkenler aynı yönde hareket etme eğilimindedir.";
    } else if (sampleCov < 0) {
        desc = "Negatif Kovaryans: Değişkenler zıt yönlerde hareket etme eğilimindedir.";
    } else {
        desc = "Sıfır Kovaryans: Değişkenler arasında doğrusal bir ilişki yoktur.";
    }

    document.getElementById('hc-cov-desc').innerText = desc;
    document.getElementById('hc-kovaryans-result').classList.add('visible');
}
