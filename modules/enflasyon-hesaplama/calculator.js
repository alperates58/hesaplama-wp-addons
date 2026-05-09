function hcEnflasyonHesapla() {
    const p1 = parseFloat(document.getElementById('hc-ef-p1').value) || 0;
    const p2 = parseFloat(document.getElementById('hc-ef-p2').value) || 0;

    if (p1 <= 0 || p2 <= 0) {
        alert('Lütfen geçerli fiyatlar giriniz.');
        return;
    }

    const rate = ((p2 / p1) - 1) * 100;
    const loss = (1 - (p1 / p2)) * 100;

    document.getElementById('hc-ef-res-rate').innerText = '%' + rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ef-res-loss').innerText = '%' + loss.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-enflasyon-result').classList.add('visible');
}
