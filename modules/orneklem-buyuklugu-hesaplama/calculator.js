function hcOrneklemBuyukluguHesapla() {
    const pop = parseInt(document.getElementById('hc-ss-pop').value);
    const z = parseFloat(document.getElementById('hc-ss-conf').value);
    const e = parseFloat(document.getElementById('hc-ss-error').value) / 100;
    const p = parseFloat(document.getElementById('hc-ss-p').value) / 100;
    const resultDiv = document.getElementById('hc-orneklem-buyuklugu-hesaplama-result');

    if (isNaN(e) || e <= 0 || isNaN(p) || p <= 0 || p >= 1) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Infinite population
    let n = (Math.pow(z, 2) * p * (1 - p)) / Math.pow(e, 2);

    // Finite population correction
    if (!isNaN(pop) && pop > 0) {
        n = n / (1 + (n - 1) / pop);
    }

    const finalN = Math.ceil(n);

    document.getElementById('hc-ss-res-value').innerText = finalN.toLocaleString('tr-TR') + " Kişi";
    document.getElementById('hc-ss-res-desc').innerText = `Bu büyüklükte bir örneklem ile %${(e*100).toFixed(1)} hata payı ve %${(document.getElementById('hc-ss-conf').selectedOptions[0].text)} güven düzeyi sağlanır.`;

    resultDiv.classList.add('visible');
}
