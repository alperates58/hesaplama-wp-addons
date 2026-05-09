function hcBuyumeOraniHesapla() {
    var eski = parseFloat(document.getElementById('hc-buo-eski').value);
    var yeni = parseFloat(document.getElementById('hc-buo-yeni').value);
    var sonuc = document.getElementById('hc-buyume-orani-hesaplama-result');
    if (isNaN(eski) || isNaN(yeni)) { alert('Lütfen her iki değeri de girin.'); return; }
    if (eski === 0) { alert('Başlangıç değeri sıfır olamaz.'); return; }
    var oran = ((yeni - eski) / Math.abs(eski)) * 100;
    var yorum = oran > 0 ? '📈 Büyüme' : (oran < 0 ? '📉 Azalma' : '➡️ Değişim yok');
    sonuc.innerHTML =
        '<p><strong>Başlangıç:</strong> ' + eski.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Bitiş:</strong> ' + yeni.toLocaleString('tr-TR') + '</p>' +
        '<p class="hc-result-value">' + yorum + ': %' + Math.abs(oran).toLocaleString('tr-TR', {maximumFractionDigits: 2}) + '</p>' +
        '<p><strong>Mutlak Değişim:</strong> ' + (yeni - eski).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + '</p>' +
        '<p><strong>Formül:</strong> ((' + yeni.toLocaleString('tr-TR') + ' - ' + eski.toLocaleString('tr-TR') + ') / ' + Math.abs(eski).toLocaleString('tr-TR') + ') × 100</p>';
    sonuc.classList.add('visible');
}
