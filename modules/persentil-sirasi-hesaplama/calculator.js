function hcPersentilSirasiHesapla() {
    const dataText = document.getElementById('hc-pr-data').value.trim();
    const xValue = parseFloat(document.getElementById('hc-pr-value').value);
    const resultDiv = document.getElementById('hc-persentil-sirasi-hesaplama-result');

    if (!dataText || isNaN(xValue)) {
        alert('Lütfen veri setini ve aranacak değeri giriniz.');
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

    let countBelow = 0;
    let countEqual = 0;

    for (let num of numbers) {
        if (num < xValue) countBelow++;
        else if (num === xValue) countEqual++;
    }

    // Formula: PR = (L + 0.5S) / N * 100
    const pr = ((countBelow + 0.5 * countEqual) / n) * 100;

    document.getElementById('hc-pr-res-value').innerText = pr.toLocaleString('tr-TR', {maximumFractionDigits: 2});
    document.getElementById('hc-pr-res-desc').innerText = `Bu değer, veri setindeki elemanların %${pr.toLocaleString('tr-TR', {maximumFractionDigits: 2})}'inden daha yüksek veya ona eşittir.`;

    resultDiv.classList.add('visible');
}
