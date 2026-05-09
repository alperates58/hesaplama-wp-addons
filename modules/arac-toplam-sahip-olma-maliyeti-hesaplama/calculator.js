function hcTcoHesapla() {
    const buyPrice = parseFloat(document.getElementById('hc-tco-buy-price').value);
    const years = parseFloat(document.getElementById('hc-tco-years').value);
    const annualKm = parseFloat(document.getElementById('hc-tco-km').value);
    const fuelCons = parseFloat(document.getElementById('hc-tco-fuel-cons').value);
    const fuelPrice = parseFloat(document.getElementById('hc-tco-fuel-price').value);
    const maint = parseFloat(document.getElementById('hc-tco-maint').value);
    const tax = parseFloat(document.getElementById('hc-tco-tax').value);
    const resale = parseFloat(document.getElementById('hc-tco-resale').value) || 0;

    if (isNaN(buyPrice) || isNaN(fuelPrice)) {
        alert('Lütfen temel alanları doldurun.');
        return;
    }

    const totalFuelCost = (annualKm / 100) * fuelCons * fuelPrice * years;
    const totalMaintenance = maint * years;
    const totalTaxAndInsurance = tax * years;
    
    const totalGider = buyPrice + totalFuelCost + totalMaintenance + totalTaxAndInsurance;
    const netGider = totalGider - resale;

    const monthlyCost = netGider / (years * 12);
    const perKmCost = netGider / (annualKm * years);

    document.getElementById('hc-tco-total-net').innerText = netGider.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    document.getElementById('hc-tco-monthly').innerText = monthlyCost.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    document.getElementById('hc-tco-per-km').innerText = perKmCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    document.getElementById('hc-tco-result').classList.add('visible');
}
