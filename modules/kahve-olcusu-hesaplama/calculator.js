function hcKahveOlcusuHesapla() {
    const grams = parseFloat(document.getElementById('hc-cs-grams').value);

    if (!grams || grams <= 0) {
        alert('Lütfen geçerli bir gram miktarı giriniz.');
        return;
    }

    // 1 scoop ~ 10g
    // 1 tbsp ~ 5g (ground)
    const scoops = grams / 10;
    const tbsp = grams / 5;

    const resultDiv = document.getElementById('hc-coffee-scoop-result');
    document.getElementById('hc-cs-res-scoop').innerText = scoops.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Ölçek';
    document.getElementById('hc-cs-res-tbsp').innerText = tbsp.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Kaşık';
    
    resultDiv.classList.add('visible');
}
