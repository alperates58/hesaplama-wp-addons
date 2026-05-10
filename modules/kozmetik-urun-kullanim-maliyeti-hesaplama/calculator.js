function hcKozmetikÜrünKullanımMaliyetiHesapla() {
    const price = parseFloat(document.getElementById('hc-cos-price').value);
    const size = parseFloat(document.getElementById('hc-cos-size').value);
    const usage = parseFloat(document.getElementById('hc-cos-usage').value);

    if (!price || !size || !usage) return;

    const unitPrice = price / size;
    const usagePrice = unitPrice * usage;
    const totalUses = size / usage;

    document.getElementById('hc-cos-val').innerText = usagePrice.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-cos-stats').innerHTML = `
        Birim Fiyat: ${unitPrice.toFixed(2)} ₺ / ml-gr<br>
        Toplam Kullanım Sayısı: ~${Math.round(totalUses)} kez
    `;
    document.getElementById('hc-cos-result').classList.add('visible');
}
