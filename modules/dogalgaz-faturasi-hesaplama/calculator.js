function hcGazFaturasiHesapla() {
    const consumption = parseFloat(document.getElementById('hc-gb-consumption').value);
    const price = parseFloat(document.getElementById('hc-gb-price').value);
    const fixed = parseFloat(document.getElementById('hc-gb-fixed').value);

    if (isNaN(consumption) || isNaN(price) || isNaN(fixed)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const energyCost = consumption * price;
    const totalBeforeTax = energyCost + fixed;
    const totalWithVat = totalBeforeTax * 1.20; // 20% VAT (KDV) in 2026 estimate

    document.getElementById('hc-res-gb-energy').innerText = energyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-gb-total').innerText = totalWithVat.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gb-result').classList.add('visible');
}
