function hcPersentilHesapla() {
    const dataText = document.getElementById('hc-p-data').value.trim();
    const p = parseFloat(document.getElementById('hc-p-percent').value);
    const resultDiv = document.getElementById('hc-persentil-hesaplama-result');

    if (!dataText || isNaN(p) || p < 0 || p > 100) {
        alert('Lütfen veri setini ve geçerli bir persentil değeri (0-100) giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n))
        .sort((a, b) => a - b);

    const n = numbers.length;
    if (n === 0) {
        alert('Geçerli bir veri seti giriniz.');
        return;
    }

    // Calculation using (n+1) formula for rank
    const rank = (p / 100) * (n + 1);
    let result;

    if (rank <= 1) {
        result = numbers[0];
    } else if (rank >= n) {
        result = numbers[n - 1];
    } else {
        const integerPart = Math.floor(rank);
        const fractionalPart = rank - integerPart;
        // Interpolation
        result = numbers[integerPart - 1] + fractionalPart * (numbers[integerPart] - numbers[integerPart - 1]);
    }

    document.getElementById('hc-p-res-label').innerText = `${p}. Persentil Değeri:`;
    document.getElementById('hc-p-res-value').innerText = result.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-p-res-desc').innerText = `Veri setindeki elemanların %${p}'i bu değerden küçük veya bu değere eşittir.`;

    resultDiv.classList.add('visible');
}
