function hcSolarRoiHesapla() {
    const cost = parseFloat(document.getElementById('hc-sr-cost').value);
    const monthlySaving = parseFloat(document.getElementById('hc-sr-saving').value);
    const yearlyMaint = parseFloat(document.getElementById('hc-sr-maint').value);

    if (isNaN(cost) || isNaN(monthlySaving)) {
        alert('Lütfen maliyet ve tasarruf bilgilerini girin.');
        return;
    }

    const yearlySaving = (monthlySaving * 12) - yearlyMaint;
    
    // Simple Payback with escalation
    // We'll use a simple loop to account for ~10% annual electricity price increase
    let balance = cost;
    let years = 0;
    let currentYearSaving = yearlySaving;

    while (balance > 0 && years < 25) {
        balance -= currentYearSaving;
        currentYearSaving *= 1.10; // 10% price hike
        years++;
    }

    if (balance > 0) years = "25+";

    document.getElementById('hc-res-sr-profit').innerText = yearlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-sr-years').innerText = years + ' Yıl';

    document.getElementById('hc-sr-result').classList.add('visible');
}
