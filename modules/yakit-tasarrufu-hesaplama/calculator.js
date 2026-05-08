function hcYtsHesapla() {
    const km = parseFloat(document.getElementById('hc-yts-km').value);
    const oldCons = parseFloat(document.getElementById('hc-yts-old').value);
    const newCons = parseFloat(document.getElementById('hc-yts-new').value);
    const price = parseFloat(document.getElementById('hc-yts-price').value);

    if (isNaN(km) || isNaN(oldCons) || isNaN(newCons) || isNaN(price)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const fuelOld = (km / 100) * oldCons;
    const fuelNew = (km / 100) * newCons;
    const savingLitres = fuelOld - fuelNew;
    const savingMoney = savingLitres * price;

    document.getElementById('hc-yts-litres').innerText = Math.round(savingLitres) + " Litre";
    document.getElementById('hc-yts-money').innerText = Math.round(savingMoney).toLocaleString('tr-TR') + " ₺";

    document.getElementById('hc-yts-result').classList.add('visible');
}
