function hcJenYakitHesapla() {
    const power = parseFloat(document.getElementById('hc-gf-power').value);
    const hours = parseFloat(document.getElementById('hc-gf-hours').value);
    const price = parseFloat(document.getElementById('hc-gf-fuel-price').value);

    if (isNaN(power) || isNaN(hours) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Average consumption: 0.21 Liters per kVA per Hour at 75% load
    const consumptionRate = 0.21; 
    const totalLiters = power * hours * consumptionRate;
    const totalCost = totalLiters * price;

    document.getElementById('hc-res-gf-liters').innerText = totalLiters.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    document.getElementById('hc-res-gf-cost').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gf-result').classList.add('visible');
}
