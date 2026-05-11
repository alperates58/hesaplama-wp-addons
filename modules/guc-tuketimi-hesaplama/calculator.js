function hcConsCalcHesapla() {
    const power = parseFloat(document.getElementById('hc-cc-power').value);
    const hours = parseFloat(document.getElementById('hc-cc-hours').value);
    const price = parseFloat(document.getElementById('hc-cc-price').value);

    if (isNaN(power) || isNaN(hours) || isNaN(price) || hours < 0 || power < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const dailyKwh = (power * hours) / 1000;
    const monthlyKwh = dailyKwh * 30;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-cc-res-daily').innerText = dailyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kWh';
    document.getElementById('hc-cc-res-monthly').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-cc-res-cost').innerText = monthlyCost.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' TL';
    
    document.getElementById('hc-cc-result').classList.add('visible');
}
