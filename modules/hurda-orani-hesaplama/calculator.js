function hcHurdaOraniHesapla() {
    const total = parseFloat(document.getElementById('hc-scrap-total').value);
    const count = parseFloat(document.getElementById('hc-scrap-count').value);

    if (isNaN(total) || isNaN(count) || total <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (count > total) {
        alert('Hurda miktarı toplam üretimden büyük olamaz.');
        return;
    }

    const ratio = (count / total) * 100;
    
    document.getElementById('hc-res-scrap-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    let desc = "";
    if (ratio < 2) desc = "Düşük hurda oranı (İyi).";
    else if (ratio < 5) desc = "Kabul edilebilir hurda oranı.";
    else desc = "Yüksek hurda oranı. Süreç iyileştirme gerekebilir.";
    
    document.getElementById('hc-scrap-desc').innerText = desc;
    document.getElementById('hc-hurda-orani-result').classList.add('visible');
}
