function hcEccHesapla() {
    const capacity = parseFloat(document.getElementById('hc-ecc-capacity').value);
    const start = parseFloat(document.getElementById('hc-ecc-start').value);
    const end = parseFloat(document.getElementById('hc-ecc-end').value);
    const price = parseFloat(document.getElementById('hc-ecc-price').value);

    if (isNaN(capacity) || isNaN(price) || end <= start) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const energyToLoad = capacity * (end - start) / 100;
    const totalCost = energyToLoad * price;

    document.getElementById('hc-ecc-energy').innerText = energyToLoad.toFixed(2) + " kWh";
    document.getElementById('hc-ecc-total').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    document.getElementById('hc-ecc-result').classList.add('visible');
}
