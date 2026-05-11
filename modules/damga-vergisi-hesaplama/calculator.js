function hcDamgaVergisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-dv-amount').value);
    const rate = parseFloat(document.getElementById('hc-dv-type').value);

    if (isNaN(amount) || amount < 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    let tax = amount * rate;
    
    // 2026 Tahmini Üst Sınır (Örn: 28.000.000 TL)
    const limit = 28000000; 
    if (tax > limit) tax = limit;

    document.getElementById('hc-dv-res-total').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-dv-result').classList.add('visible');
}
