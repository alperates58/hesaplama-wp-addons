function hcTuketiciSiniriHesapla() {
    var tutar = parseFloat(document.getElementById('hc-tmds-tutar').value) || 0;
    var yil = document.getElementById('hc-tmds-yil').value;

    if (tutar <= 0) {
        alert('Lütfen uyuşmazlık bedelini giriniz.');
        return;
    }

    var limit = yil === '2026' ? 186000 : 149000;
    var title = '';
    var mercii = '';
    var zorunluluk = '';
    var not = '';
    var bg = '';
    var text = '';
    var border = '';

    if (tutar < limit) {
        title = 'TÜKETİCİ HAKEM HEYETİ YETKİLİDİR';
        mercii = 'İl veya İlçe Tüketici Hakem Heyeti';
        zorunluluk = 'Zorunlu Başvuru';
        not = '<strong>Önemli Bilgi:</strong> Değeri ' + limit.toLocaleString('tr-TR') + ' ₺ altında kalan uyuşmazlıklar için doğrudan Tüketici Mahkemesi\'nde dava açılamaz. Başvurular e-Devlet TÜBİS (Tüketici Bilgi Sistemi) üzerinden ücretsiz olarak yapılabilir. Alınan kararlar mahkeme kararı hükmündedir ve icra edilebilir.';
        bg = '#f0fdf4';
        text = '#166534';
        border = '1px solid #bbf7d0';
    } else {
        title = 'TÜKETİCİ MAHKEMESİ VE ARABULUCULUK YETKİLİDİR';
        mercii = 'Tüketici Mahkemesi (Arabulucu şartıyla)';
        zorunluluk = 'Önce Arabuluculuk Zorunludur';
        not = '<strong>Önemli Bilgi:</strong> Uyuşmazlık değeri yasal sınır olan ' + limit.toLocaleString('tr-TR') + ' ₺ ve üzerinde olduğu için Tüketici Hakem Heyetleri yetkisizdir. Öncelikle dava şartı olan <strong>Arabuluculuk</strong> kurumuna başvurmanız, arabuluculuk sürecinde anlaşma sağlanamaması durumunda Tüketici Mahkemesi\'nde dava açmanız gerekmektedir.';
        bg = '#eff6ff';
        text = '#1e40af';
        border = '1px solid #bfdbfe';
    }

    var titleBox = document.getElementById('hc-tmds-durum-title');
    titleBox.innerText = title;
    titleBox.style.background = bg;
    titleBox.style.color = text;
    titleBox.style.border = border;

    document.getElementById('hc-tmds-res-limit').innerText = limit.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-tmds-res-mercii').innerText = mercii;
    document.getElementById('hc-tmds-res-zorunluluk').innerText = zorunluluk;
    document.getElementById('hc-tmds-res-not').innerHTML = not;

    document.getElementById('hc-tmds-result').classList.add('visible');
}