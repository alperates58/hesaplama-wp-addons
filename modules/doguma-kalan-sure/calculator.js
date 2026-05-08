function hcKalanSureHesapla() {
    var tdtInput = document.getElementById('hc-kalan-tarih').value;
    if (!tdtInput) {
        alert('Lütfen tahmini doğum tarihini seçin.');
        return;
    }

    var tdt = new Date(tdtInput);
    var today = new Date();
    today.setHours(0,0,0,0);
    
    var diffTime = tdt - today;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 0) {
        alert('Seçtiğiniz tarih geçmişte kalmış.');
        return;
    }

    var resDiv = document.getElementById('hc-kalan-result');
    var gunDiv = document.getElementById('hc-kalan-gun');
    var detayDiv = document.getElementById('hc-kalan-detay');

    gunDiv.textContent = diffDays + " Gün Kaldı";
    
    var hafta = Math.floor(diffDays / 7);
    var ay = (diffDays / 30.44).toFixed(1);

    detayDiv.textContent = "Yaklaşık " + hafta + " hafta veya " + ay + " ay sonra bebeğinize kavuşacaksınız.";
    resDiv.classList.add('visible');
}
