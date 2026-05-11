function hcDovizArbitrajHesapla() {
    const usdTry = parseFloat(document.getElementById('hc-da-usd-try').value);
    const eurTry = parseFloat(document.getElementById('hc-da-eur-try').value);

    if (!usdTry || !eurTry) {
        alert('Lütfen her iki kuru da girin.');
        return;
    }

    // EUR/USD = (EUR/TRY) / (USD/TRY)
    const eurUsd = eurTry / usdTry;

    document.getElementById('hc-da-cross').innerText = eurUsd.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });
    document.getElementById('hc-da-conv-usd-eur').innerText = (100 / eurUsd).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' EUR';
    document.getElementById('hc-da-conv-eur-usd').innerText = (100 * eurUsd).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' USD';

    document.getElementById('hc-da-result').classList.add('visible');
}
