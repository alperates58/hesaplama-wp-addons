function hcKahveMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-cpp-count').value);
    const typeVal = document.getElementById('hc-cpp-type').value.split('|');
    const coffeePerPerson = parseFloat(typeVal[0]);
    const waterPerPerson = parseFloat(typeVal[1]);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalCoffee = count * coffeePerPerson;
    const totalWater = count * waterPerPerson;

    const resultDiv = document.getElementById('hc-coffee-per-person-result');
    document.getElementById('hc-cpp-res-coffee').innerText = totalCoffee.toLocaleString('tr-TR') + ' g';
    
    if (totalWater >= 1000) {
        document.getElementById('hc-cpp-res-water').innerText = (totalWater / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre';
    } else {
        document.getElementById('hc-cpp-res-water').innerText = totalWater.toLocaleString('tr-TR') + ' ml';
    }
    
    resultDiv.classList.add('visible');
}
