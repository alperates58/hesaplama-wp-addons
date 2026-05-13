function hcOranDagilimiHesapla() {
    const p = parseFloat(document.getElementById('hc-pd-p').value);
    const n = parseInt(document.getElementById('hc-pd-n').value);
    const resultDiv = document.getElementById('hc-orneklem-orani-dagilimi-hesaplama-result');

    if (isNaN(p) || isNaN(n) || p < 0 || p > 1 || n <= 0) {
        alert('Lütfen geçerli değerler giriniz (0 ≤ p ≤ 1, n > 0).');
        return;
    }

    const mean = p;
    const se = Math.sqrt((p * (1 - p)) / n);

    document.getElementById('hc-pd-res-mean').innerText = mean.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-pd-res-se').innerText = se.toLocaleString('tr-TR', {maximumFractionDigits: 4});

    // Check normal approximation condition: np >= 10 and n(1-p) >= 10
    const np = n * p;
    const nq = n * (1 - p);
    let conditionText = "";
    if (np >= 10 && nq >= 10) {
        conditionText = "Normal dağılım yaklaşımı uygundur (np ≥ 10 ve n(1-p) ≥ 10).";
    } else {
        conditionText = "Örneklem büyüklüğü normal dağılım yaklaşımı için yetersiz olabilir.";
    }
    document.getElementById('hc-pd-res-condition').innerText = conditionText;

    resultDiv.classList.add('visible');
}
