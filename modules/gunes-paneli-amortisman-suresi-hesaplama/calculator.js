function hcAmortismanHesapla() {
    const investment = parseFloat(document.getElementById('hc-sp-investment').value);
    const kwhYear = parseFloat(document.getElementById('hc-sp-kwh-year').value);
    const price = parseFloat(document.getElementById('hc-sp-elec-price').value);

    if (isNaN(investment) || isNaN(kwhYear) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const y1Saving = kwhYear * price;
    
    let balance = investment;
    let years = 0;
    let currentKwh = kwhYear;
    let currentPrice = price;

    while (balance > 0 && years < 30) {
        const annualSaving = currentKwh * currentPrice;
        balance -= annualSaving;
        
        currentKwh *= 0.995; // 0.5% efficiency loss
        currentPrice *= 1.10; // 10% electricity price hike
        years++;
    }

    if (balance > 0) years = "30+";

    document.getElementById('hc-res-sp-y1').innerText = y1Saving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-sp-years').innerText = years + ' Yıl';

    document.getElementById('hc-sp-result').classList.add('visible');
}
