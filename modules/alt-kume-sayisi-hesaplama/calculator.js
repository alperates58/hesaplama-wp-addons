function hcAltKumeHesapla() {
    const n = parseInt(document.getElementById('hc-ss-n').value);

    if (isNaN(n) || n < 0) {
        alert('Lütfen geçerli bir eleman sayısı girin.');
        return;
    }

    if (n > 100) {
        alert('Sayı çok büyük olduğu için hesaplanamıyor.');
        return;
    }

    // Using BigInt for larger sets up to 100
    const total = BigInt(2) ** BigInt(n);
    const proper = total - BigInt(1);

    document.getElementById('hc-res-ss-total').innerText = total.toLocaleString('tr-TR');
    document.getElementById('hc-res-ss-proper').innerText = proper.toLocaleString('tr-TR');

    document.getElementById('hc-ss-result').classList.add('visible');
}
