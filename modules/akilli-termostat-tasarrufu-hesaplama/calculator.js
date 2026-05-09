function hcAkilliTermostatHesapla() {
    const bill = parseFloat(document.getElementById('hc-st-bill').value);
    const percent = parseFloat(document.getElementById('hc-st-percent').value);

    if (isNaN(bill) || isNaN(percent)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlySaving = bill * (percent / 100);
    const yearlySaving = monthlySaving * 12;

    document.getElementById('hc-res-st-monthly').innerText = monthlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-st-yearly').innerText = yearlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-st-result').classList.add('visible');
}
