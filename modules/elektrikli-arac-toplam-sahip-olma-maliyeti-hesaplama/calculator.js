function hcEtcoHesapla() {
    const price = parseFloat(document.getElementById('hc-etco-price').value);
    const years = parseFloat(document.getElementById('hc-etco-years').value);
    const km = parseFloat(document.getElementById('hc-etco-km').value);
    const cons = parseFloat(document.getElementById('hc-etco-cons').value);
    const elecPrice = parseFloat(document.getElementById('hc-etco-elec-price').value);
    const maint = parseFloat(document.getElementById('hc-etco-maint').value);
    const tax = parseFloat(document.getElementById('hc-etco-tax').value);
    const resale = parseFloat(document.getElementById('hc-etco-resale').value) || 0;

    if (isNaN(price)) {
        alert('Lütfen araç fiyatını girin.');
        return;
    }

    const energyCost = (km / 100) * cons * elecPrice * years;
    const maintenanceCost = maint * years;
    const taxCost = tax * years;

    const totalCost = (price + energyCost + maintenanceCost + taxCost) - resale;
    const monthly = totalCost / (years * 12);

    document.getElementById('hc-etco-total').innerText = totalCost.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    document.getElementById('hc-etco-monthly').innerText = monthly.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";

    document.getElementById('hc-etco-result').classList.add('visible');
}
