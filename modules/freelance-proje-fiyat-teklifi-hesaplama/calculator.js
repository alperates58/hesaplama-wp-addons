function hcFreelanceProjeFiyatHesapla() {
    var saatlik = parseFloat(document.getElementById('hc-fpf-saatlik').value) || 0;
    var sure = parseFloat(document.getElementById('hc-fpf-sure').value) || 0;
    var gider = parseFloat(document.getElementById('hc-fpf-gider').value) || 0;
    var marj = parseFloat(document.getElementById('hc-fpf-marj').value) || 0;

    if (saatlik <= 0 || sure <= 0) {
        alert('Lütfen geçerli saatlik ücret ve çalışma süresi giriniz.');
        return;
    }

    var emekMaliyeti = saatlik * sure;
    var toplamMaliyet = emekMaliyeti + gider;
    var karTutari = toplamMaliyet * (marj / 100);
    var toplamTeklif = toplamMaliyet + karTutari;

    document.getElementById('hc-fpf-res-emek').innerText = emekMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-fpf-res-gider').innerText = gider.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-fpf-res-kar').innerText = karTutari.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-fpf-res-toplam').innerText = toplamTeklif.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-fpf-result').classList.add('visible');
}