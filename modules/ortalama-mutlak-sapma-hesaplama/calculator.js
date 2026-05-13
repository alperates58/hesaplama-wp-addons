function hcMadHesapla() {
    const dataText = document.getElementById('hc-mad-data').value.trim();
    const resultDiv = document.getElementById('hc-ortalama-mutlak-sapma-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri setini giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n));

    const n = numbers.length;
    if (n < 1) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    const sum = numbers.reduce((a, b) => a + b, 0);
    const mean = sum / n;

    const absDiffs = numbers.map(x => Math.abs(x - mean));
    const mad = absDiffs.reduce((a, b) => a + b, 0) / n;

    document.getElementById('hc-mad-res-value').innerText = mad.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-mad-res-mean').innerText = `Aritmetik Ortalama: ${mean.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;

    resultDiv.classList.add('visible');
}
