function hcHeavyFuelHesapla() {
    const hp = parseFloat(document.getElementById('hc-im-hp').value);
    const hours = parseFloat(document.getElementById('hc-im-hours').value);
    const loadFactor = parseFloat(document.getElementById('hc-im-load').value);

    if (isNaN(hp) || isNaN(hours) || hp <= 0 || hours <= 0) {
        alert('Lütfen geçerli güç ve süre değerleri girin.');
        return;
    }

    // Typical diesel fuel consumption formula: 
    // Liters per hour = HP * Load Factor * Specific Fuel Consumption Factor
    // SFC factor typically around 0.15 - 0.20 liters per HP hour for diesel
    const sfc = 0.18; // Average factor (L/HP-hr)

    const hourlyConsumption = hp * loadFactor * sfc;
    const totalConsumption = hourlyConsumption * hours;

    document.getElementById('hc-im-res-val').innerText = totalConsumption.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    document.getElementById('hc-im-res-hourly').innerText = 'Saatlik Ortalama: ' + hourlyConsumption.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' L/saat';
    
    document.getElementById('hc-im-result').classList.add('visible');
}
