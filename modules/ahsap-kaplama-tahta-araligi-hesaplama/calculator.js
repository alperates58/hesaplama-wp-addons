function hcATAHesapla() {
    const total = parseFloat(document.getElementById('hc-ata-total').value);
    const width = parseFloat(document.getElementById('hc-ata-width').value);
    const count = parseInt(document.getElementById('hc-ata-count').value);

    if (isNaN(total) || isNaN(width) || isNaN(count) || count < 2) {
        alert('Lütfen geçerli değerler ve en az 2 tahta giriniz.');
        return;
    }

    const occupied = width * count;
    if (occupied >= total) {
        alert('Tahtaların toplam genişliği toplam uzunluktan büyük veya eşit olamaz.');
        return;
    }

    const gap = (total - occupied) / (count - 1);

    document.getElementById('hc-ata-val').innerText = gap.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
    document.getElementById('hc-ata-result').classList.add('visible');
}
