function hcKusurOraniHesapla() {
    const total = parseFloat(document.getElementById('hc-defect-total').value);
    const count = parseFloat(document.getElementById('hc-defect-count').value);

    if (isNaN(total) || isNaN(count) || total <= 0) {
        alert('Lütfen geçerli değerler girin (Toplam adet 0\'dan büyük olmalıdır).');
        return;
    }

    if (count > total) {
        alert('Kusurlu ürün adedi toplam üretimden büyük olamaz.');
        return;
    }

    const ratio = (count / total) * 100;
    const yieldVal = 100 - ratio;

    document.getElementById('hc-res-defect-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-res-yield').innerText = '%' + yieldVal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });

    document.getElementById('hc-kusur-orani-result').classList.add('visible');
}
