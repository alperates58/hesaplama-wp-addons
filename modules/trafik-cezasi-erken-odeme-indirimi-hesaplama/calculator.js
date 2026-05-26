function hcTrafikErkenOdemeHesapla() {
    var tutar = parseFloat(document.getElementById('hc-tce-tutar').value) || 0;
    var tebligStr = document.getElementById('hc-tce-teblig').value;

    if (tutar <= 0 || !tebligStr) {
        alert('Lütfen ceza tutarını ve tebliğ tarihini giriniz.');
        return;
    }

    var teblig = new Date(tebligStr);
    
    // 2026 yılı yasal düzenleme: İndirim süresi tebliğden itibaren 1 aydır (30 gün).
    var sonTarih = new Date(teblig);
    sonTarih.setDate(teblig.getDate() + 30);

    var indirimli = tutar * 0.75;
    var kazanc = tutar * 0.25;

    var options = { year: 'numeric', month: 'long', day: 'numeric' };

    document.getElementById('hc-tce-res-orj').innerText = tutar.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-tce-res-kazanc').innerText = Math.round(kazanc).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-tce-res-indirimli').innerText = Math.round(indirimli).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-tce-res-son-tarih').innerText = sonTarih.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-tce-result').classList.add('visible');
}