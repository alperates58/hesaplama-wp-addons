function hcCoffeeMeasureHesapla() {
    const ratio = parseFloat(document.getElementById('hc-measure-method').value);
    const cups = parseInt(document.getElementById('hc-measure-cups').value) || 1;
    const size = parseFloat(document.getElementById('hc-measure-size').value) || 250;

    const totalWater = cups * size;
    const totalCoffee = totalWater / ratio;

    document.getElementById('hc-measure-val').innerText = `${totalCoffee.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} g Kahve`;
    document.getElementById('hc-measure-desc').innerText = `${totalWater} ml su kullanılmalıdır. Seçilen yönteme göre ideal oran 1:${ratio} olarak hesaplanmıştır.`;
    
    document.getElementById('hc-coffee-measure-result').classList.add('visible');
}
