function hcCoffeePPHesapla() {
    const count = parseInt(document.getElementById('hc-coffee-pp-count').value);
    const coffeePerPerson = parseFloat(document.getElementById('hc-coffee-pp-type').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    let waterPerPerson = 0;
    if (coffeePerPerson === 7) waterPerPerson = 65;
    if (coffeePerPerson === 15) waterPerPerson = 250;
    if (coffeePerPerson === 18) waterPerPerson = 40;

    const totalCoffee = count * coffeePerPerson;
    const totalWater = count * waterPerPerson;

    document.getElementById('hc-coffee-pp-val').innerText = `${totalCoffee.toLocaleString('tr-TR')} g Kahve`;
    document.getElementById('hc-coffee-pp-info').innerText = `${totalWater.toLocaleString('tr-TR')} ml su kullanılmalıdır.`;
    
    document.getElementById('hc-coffee-pp-result').classList.add('visible');
}
