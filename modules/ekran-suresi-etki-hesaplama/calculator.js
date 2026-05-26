function hcEkranEtkisiHesapla() {
    var saat = parseFloat(document.getElementById('hc-ese-saat').value) || 0;
    var filtre = parseFloat(document.getElementById('hc-ese-filtre').value) || 1.0;
    var uykuMin = parseFloat(document.getElementById('hc-ese-uyku').value) || 0;
    var sikayet = parseFloat(document.getElementById('hc-ese-sikayet').value) || 0;

    if (saat <= 0) {
        alert('Lütfen günlük ekran sürenizi giriniz.');
        return;
    }

    // Olumsuz etki puanı hesaplama
    var baseScore = saat * 8; // Her saat başı 8 puan
    var filtreCarp = filtre;
    
    var uykuPuan = 25;
    if (uykuMin === 60) uykuPuan = 0;
    else if (uykuMin === 30) uykuPuan = 10;
    else if (uykuMin === 10) uykuPuan = 18;

    var toplamEtki = (baseScore * filtreCarp) + uykuPuan + (sikayet * 5);
    toplamEtki = Math.min(100, Math.max(0, toplamEtki));

    var gozRiski = 'Normal';
    var uykuEtki = 'Düşük';
    var tavsiye = 'Göz sağlığınızı korumak için 20-20-20 kuralını uygulayın: Her 20 dakikada bir 20 saniye boyunca 20 fit (6 metre) uzağa bakın.';

    if (toplamEtki >= 70) {
        gozRiski = 'Yüksek Kuruluk ve Görme Yorgunluğu Riski';
        uykuEtki = 'Ciddi Melatonin Baskılanması (Uykusuzluk Yapabilir)';
        tavsiye = 'Ekrana maruz kalma sürenizi acilen azaltın. Uyku öncesi en az 1 saat ekranlardan tamamen uzak durun. Bilgisayar gözlüğü kullanımı düşünebilirsiniz.';
    } else if (toplamEtki >= 40) {
        gozRiski = 'Orta Derece Risk';
        uykuEtki = 'Hafif Uyku Kalitesi Düşüşü';
        tavsiye = 'Akşam saatlerinde telefonlarda mutlaka mavi ışık filtresini etkinleştirin. Gözlerinizi sık sık kırparak nemli kalmasını sağlayın.';
    }

    document.getElementById('hc-ese-res-skor').innerText = '%' + Math.round(toplamEtki);
    document.getElementById('hc-ese-res-goz').innerText = gozRiski;
    document.getElementById('hc-ese-res-uyku').innerText = uykuEtki;
    document.getElementById('hc-ese-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-ese-result').classList.add('visible');
}