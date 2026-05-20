function hcAffiliateKomisyonGeliriHesapla() {
    var ziyaretci = parseFloat(document.getElementById('hc-af-ziyaretci').value);
    var ctr = parseFloat(document.getElementById('hc-af-ctr').value) / 100;
    var cr = parseFloat(document.getElementById('hc-af-cr').value) / 100;
    var sepet = parseFloat(document.getElementById('hc-af-sepet').value);
    var komisyon = parseFloat(document.getElementById('hc-af-komisyon').value) / 100;

    if (!ziyaretci || ziyaretci <= 0) {
        alert('Lütfen geçerli bir ziyaretçi sayısı girin.');
        return;
    }
    if (isNaN(ctr) || ctr < 0 || ctr > 1) {
        alert('Lütfen geçerli bir tıklama oranı (CTR) girin.');
        return;
    }
    if (isNaN(cr) || cr < 0 || cr > 1) {
        alert('Lütfen geçerli bir satışa dönüşüm oranı (CR) girin.');
        return;
    }
    if (!sepet || sepet <= 0) {
        alert('Lütfen geçerli bir ortalama sepet tutarı girin.');
        return;
    }
    if (isNaN(komisyon) || komisyon < 0 || komisyon > 1) {
        alert('Lütfen geçerli bir komisyon oranı girin.');
        return;
    }

    var tiklama = ziyaretci * ctr;
    var satis = tiklama * cr;
    var ciro = satis * sepet;
    var netKazanc = ciro * komisyon;

    var fmtSayi = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    document.getElementById('hc-af-res-tiklama').textContent = fmtSayi(tiklama, 0) + ' tıklama';
    document.getElementById('hc-af-res-satis').textContent = fmtSayi(satis, 1) + ' adet';
    document.getElementById('hc-af-res-ciro').textContent = fmtSayi(ciro, 2) + ' ₺';
    document.getElementById('hc-af-res-kazanc').textContent = fmtSayi(netKazanc, 2) + ' ₺';

    document.getElementById('hc-affiliate-komisyon-result').classList.add('visible');
}
