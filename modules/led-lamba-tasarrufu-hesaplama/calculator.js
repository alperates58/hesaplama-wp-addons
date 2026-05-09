function hcLedTasarrufHesapla() {
    const oldWatt = parseFloat(document.getElementById('hc-ls-old').value);
    const newWatt = parseFloat(document.getElementById('hc-ls-new').value);
    const count = parseFloat(document.getElementById('hc-ls-count').value);
    const hours = parseFloat(document.getElementById('hc-ls-hours').value);

    if (isNaN(oldWatt) || isNaN(newWatt) || isNaN(count) || isNaN(hours)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const price = 3.11;
    const wattDifference = (oldWatt - newWatt) * count;
    const dailyKwhSaved = (wattDifference * hours) / 1000;
    
    const monthlySaving = dailyKwhSaved * 30 * price;
    const yearlySaving = monthlySaving * 12;

    document.getElementById('hc-res-ls-monthly').innerText = monthlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-ls-yearly').innerText = yearlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ls-result').classList.add('visible');
}
