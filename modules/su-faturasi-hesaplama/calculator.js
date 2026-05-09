function hcWaterBillHesapla() {
    const usage = parseFloat(document.getElementById('hc-water-usage').value) || 0;
    const price = parseFloat(document.getElementById('hc-water-price').value) || 25;

    // Vergiler ve Ek Ücretler (Ortalama %40-50 eklenir)
    const total = usage * price * 1.5;

    document.getElementById('hc-res-water-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-water-bill-result').classList.add('visible');
}
