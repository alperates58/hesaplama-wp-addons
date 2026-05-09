function hcDevamsizlikYuzdesiHesapla() {
    var toplam = parseInt(document.getElementById('hc-dyh-toplam').value);
    var devamsiz = parseInt(document.getElementById('hc-dyh-devamsiz').value);
    var sinir = parseFloat(document.getElementById('hc-dyh-sinir').value) || 20;
    var sonuc = document.getElementById('hc-devamsizlik-yuzdesi-hesaplama-result');
    if (isNaN(toplam) || toplam <= 0) { alert('Toplam ders sayısını girin.'); return; }
    if (isNaN(devamsiz) || devamsiz < 0) { alert('Devamsız kalınan sayıyı girin.'); return; }
    if (devamsiz > toplam) { alert('Devamsızlık sayısı toplam dersten fazla olamaz.'); return; }
    var yuzde = (devamsiz / toplam) * 100;
    var kalanHak = Math.floor(toplam * sinir / 100) - devamsiz;
    var durum = yuzde <= sinir ? '✅ Devamsızlık sınırı aşılmadı.' : '❌ Devamsızlık sınırı aşıldı!';
    sonuc.innerHTML =
        '<p><strong>Toplam:</strong> ' + toplam + ' &nbsp;|&nbsp; <strong>Devamsız:</strong> ' + devamsiz + '</p>' +
        '<p class="hc-result-value">Devamsızlık: %' + yuzde.toLocaleString('tr-TR',{maximumFractionDigits:2}) + '</p>' +
        '<p><strong>' + durum + '</strong></p>' +
        '<p><strong>Sınır (%' + sinir + '):</strong> ' + Math.floor(toplam * sinir / 100) + ' ders</p>' +
        '<p><strong>Kalan Devamsızlık Hakkı:</strong> ' + (kalanHak > 0 ? kalanHak + ' ders' : 'Kalmadı') + '</p>';
    sonuc.classList.add('visible');
}
