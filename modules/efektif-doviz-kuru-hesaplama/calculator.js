function hcEfektifKurHesapla() {
    const usd = parseFloat(document.getElementById('hc-edk-usd').value);
    const eur = parseFloat(document.getElementById('hc-edk-eur').value);

    if (!usd || !eur) {
        alert('Lütfen her iki kuru da girin.');
        return;
    }

    // Basket = 0.5 * USD + 0.5 * EUR
    const basket = (0.5 * usd) + (0.5 * eur);

    document.getElementById('hc-edk-value').innerText = basket.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 }) + ' ₺';
    document.getElementById('hc-edk-result').classList.add('visible');
}
