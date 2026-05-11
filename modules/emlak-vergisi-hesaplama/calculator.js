function hcEmlakVergisiHesapla() {
    const value = parseFloat(document.getElementById('hc-ev-value').value);
    const cityFactor = parseInt(document.getElementById('hc-ev-city').value);
    const baseRate = parseFloat(document.getElementById('hc-ev-type').value);

    if (isNaN(value) || value <= 0) {
        alert('Lütfen geçerli bir taşınmaz değeri girin.');
        return;
    }

    const yearlyTax = value * baseRate * cityFactor;
    const cultureFee = yearlyTax * 0.10; // %10 Kültür Varlıkları Katkı Payı
    const grandTotal = yearlyTax + cultureFee;

    document.getElementById('hc-ev-res-total').innerText = yearlyTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ev-res-culture').innerText = cultureFee.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ev-res-grand').innerText = grandTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ev-result').classList.add('visible');
}
