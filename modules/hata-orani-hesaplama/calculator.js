function hcHataOraniHesapla() {
    const total = parseFloat(document.getElementById('hc-error-total').value);
    const count = parseFloat(document.getElementById('hc-error-count').value);

    if (isNaN(total) || isNaN(count) || total <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (count > total) {
        alert('Hata adedi toplam adetten büyük olamaz.');
        return;
    }

    const ratio = (count / total) * 100;
    
    document.getElementById('hc-res-error-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    
    let desc = "";
    if (ratio < 1) desc = "Düşük hata oranı. Süreç oldukça verimli.";
    else if (ratio < 5) desc = "Normal hata oranı.";
    else desc = "Yüksek hata oranı. Kontrol edilmesi önerilir.";
    
    document.getElementById('hc-error-desc').innerText = desc;
    document.getElementById('hc-hata-orani-result').classList.add('visible');
}
