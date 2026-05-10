function hcAbvHesapla() {
    const total = parseFloat(document.getElementById('hc-abv-total').value);
    const alcohol = parseFloat(document.getElementById('hc-abv-alcohol').value);

    if (isNaN(total) || isNaN(alcohol) || total <= 0) {
        alert('Lütfen geçerli hacim değerleri giriniz.');
        return;
    }

    const abv = (alcohol / total) * 100;

    document.getElementById('hc-abv-val').innerText = '%' + abv.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-abv-result').classList.add('visible');
}
