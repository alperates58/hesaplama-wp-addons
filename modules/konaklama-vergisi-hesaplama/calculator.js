function hcKonaklamaVergisiHesapla() {
    const price = parseFloat(document.getElementById('hc-kn-price').value);

    if (isNaN(price) || price <= 0) {
        alert('Lütfen geçerli bir konaklama bedeli girin.');
        return;
    }

    const konaklamaTax = price * 0.02;
    const kdvTax = price * 0.10; // Konaklama hizmetinde KDV %10'dur (2026)
    const total = price + konaklamaTax + kdvTax;

    document.getElementById('hc-kn-res-tax').innerText = konaklamaTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kn-res-kdv').innerText = kdvTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kn-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kn-result').classList.add('visible');
}
