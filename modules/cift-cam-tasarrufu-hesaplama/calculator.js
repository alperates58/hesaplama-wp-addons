function hcCiftCamHesapla() {
    const bill = parseFloat(document.getElementById('hc-cg-bill').value);
    const area = parseFloat(document.getElementById('hc-cg-area').value);
    const reduction = parseFloat(document.getElementById('hc-cg-type').value);

    if (isNaN(bill) || isNaN(area)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Assumptions: 
    // - Windows cause ~25% of heat loss.
    // - Scaling based on area (baseline ~15m2 for a 100m2 house).
    const windowLossRatio = 0.25 * (area / 15); 
    const monthlySaving = bill * windowLossRatio * reduction;
    const yearlySaving = monthlySaving * 5; // Heating is active ~5 months a year in TR

    document.getElementById('hc-res-cg-monthly').innerText = monthlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-cg-yearly').innerText = yearlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-cg-result').classList.add('visible');
}
