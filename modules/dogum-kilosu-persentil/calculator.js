function hcDogumPersentilHesapla() {
    var kilo = parseFloat(document.getElementById('hc-bw-kilo').value);
    var hafta = parseInt(document.getElementById('hc-bw-hafta').value);
    
    if (isNaN(kilo) || isNaN(hafta)) {
        alert('Lütfen ağırlık ve haftayı giriniz.');
        return;
    }

    // Basitleştirilmiş Intergrowth-21st / WHO bazlı eşikler (40 hafta baz alınmıştır)
    // Gerçek uygulamada her hafta için tablo kullanılır.
    var status = "";
    var yorum = "";
    var statusClass = "";

    // 40 hafta referans değerleri (yaklaşık)
    var p10 = 2900; 
    var p90 = 4100;

    // Haftaya göre kilo ayarı (kaba tahmin)
    if (hafta < 40) {
        var fark = 40 - hafta;
        p10 -= (fark * 200);
        p90 -= (fark * 250);
    }

    if (kilo < p10) {
        status = "SGA (Küçük Doğum Ağırlığı)";
        yorum = "Bebek, gebelik haftasına göre 10. persentilin altında bir ağırlıkla doğmuştur. Beslenme veya plasental nedenler değerlendirilebilir.";
        statusClass = "warning";
    } else if (kilo > p90) {
        status = "LGA (Büyük Doğum Ağırlığı)";
        yorum = "Bebek, gebelik haftasına göre 90. persentilin üzerinde bir ağırlıkla doğmuştur. Genetik veya anne şeker hastalığı (diyabet) ile ilişkili olabilir.";
        statusClass = "warning";
    } else {
        status = "AGA (Normal Doğum Ağırlığı)";
        yorum = "Bebek, gebelik haftasına uygun, normal sınırlar içerisinde (10-90 persentil arası) bir ağırlıkla doğmuştur.";
        statusClass = "normal";
    }

    var resDiv = document.getElementById('hc-bw-result');
    var statusDiv = document.getElementById('hc-bw-status');
    var yorumDiv = document.getElementById('hc-bw-yorum');

    statusDiv.textContent = status;
    statusDiv.className = "hc-result-value " + statusClass;
    yorumDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
