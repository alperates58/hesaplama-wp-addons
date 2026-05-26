function hcAnksiyeteHesapla() {
    var qs = document.querySelectorAll('.hc-gad-q');
    var toplam = 0;

    for (var i = 0; i < qs.length; i++) {
        toplam += parseInt(qs[i].value) || 0;
    }

    var durum = '';
    var not = '';
    var renk = '#22c55e';

    if (toplam >= 12) {
        durum = 'Şiddetli Derece Kaygı / Anksiyete';
        not = 'Kaygı düzeyiniz çok yüksek seviyede ölçüldü. Yaşadığınız sıkıntıları azaltmak ve sağlıklı başa çıkma yolları geliştirmek için bir psikolog veya psikiyatriste danışmanız önemle tavsiye edilir.';
        renk = '#ef4444';
    } else if (toplam >= 8) {
        durum = 'Orta Derece Anksiyete';
        not = 'Belirgin bir endişe ve kaygı düzeyi mevcut. Nefes egzersizleri, yoga ve bilişsel farkındalık pratikleri kaygıyı yönetmede yardımcı olabilir.';
        renk = '#eab308';
    } else if (toplam >= 4) {
        durum = 'Hafif Derece Anksiyete';
        not = 'Düşük düzeyde kaygı belirtileri. Rutin stres faktörlerinden kaynaklanıyor olabilir.';
        renk = '#3b82f6';
    } else {
        durum = 'Minimal / Çok Düşük Kaygı';
        not = 'Anksiyete belirtileri neredeyse yok denecek kadar azdır.';
        renk = 'var(--hc-front-green)';
    }

    document.getElementById('hc-gad-res-skor').innerText = toplam + ' / 15';
    document.getElementById('hc-gad-res-skor').style.color = renk;
    document.getElementById('hc-gad-res-durum').innerText = durum;
    document.getElementById('hc-gad-res-durum').style.color = renk;
    document.getElementById('hc-gad-res-not').innerText = not;

    document.getElementById('hc-gad-result').classList.add('visible');
}