function hcMmmHesapla() {
    const dataText = document.getElementById('hc-mmm-data').value.trim();
    const resultDiv = document.getElementById('hc-ortalama-medyan-mod-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri setini giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n))
        .sort((a, b) => a - b);

    const n = numbers.length;
    if (n < 1) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    // Mean
    const mean = numbers.reduce((a, b) => a + b, 0) / n;

    // Median
    let median;
    if (n % 2 === 0) {
        median = (numbers[n / 2 - 1] + numbers[n / 2]) / 2;
    } else {
        median = numbers[Math.floor(n / 2)];
    }

    // Mode
    const counts = {};
    let maxCount = 0;
    let modes = [];
    numbers.forEach(num => {
        counts[num] = (counts[num] || 0) + 1;
        if (counts[num] > maxCount) maxCount = counts[num];
    });

    for (let num in counts) {
        if (counts[num] === maxCount) modes.push(num);
    }
    
    let modeText = modes.length === n ? "Yok" : modes.join(', ');
    if (maxCount === 1 && n > 1) modeText = "Yok (Tüm değerler eşsiz)";

    // Range
    const range = numbers[n - 1] - numbers[0];

    document.getElementById('hc-mmm-mean').innerText = mean.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-mmm-median').innerText = median.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-mmm-mode').innerText = modeText;
    document.getElementById('hc-mmm-range').innerText = range.toLocaleString('tr-TR');

    resultDiv.classList.add('visible');
}
