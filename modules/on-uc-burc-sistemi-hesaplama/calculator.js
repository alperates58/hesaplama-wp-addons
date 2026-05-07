function hc13BurcHesapla() {
    const gun = parseInt(document.getElementById('hc-13burc-gun').value);
    const ay = parseInt(document.getElementById('hc-13burc-ay').value);

    if (!gun || !ay) {
        alert('Lütfen doğum gününüzü ve ayınızı seçin.');
        return;
    }

    let burc = "";
    let aciklama = "";

    // 13 Burç Tarihleri (Yılan Burcu Dahil)
    if ((ay == 1 && gun >= 20) || (ay == 2 && gun <= 16)) {
        burc = "Oğlak";
        aciklama = "13 burç sistemine göre bu tarihlerde Oğlak burcu etkindir. Geleneksel astrolojiden farklı olan bu tarihler, gökyüzündeki takımyıldızların güncel konumlarını temel alır. Oğlak enerjisi, disiplin, sorumluluk ve kararlılıkla ilişkilidir; ancak bu yeni takvimde zamanlaması kışın tam ortasına kaymıştır.";
    } else if ((ay == 2 && gun >= 16) || (ay == 3 && gun <= 11)) {
        burc = "Kova";
        aciklama = "13 burç sistemine göre bu tarihlerde Kova burcu etkindir. Bu sistemde Kova, kışın sonuna doğru daha kısa bir süreyi kapsar. Yenilikçi, bağımsız ve insancıl enerjileri temsil eden Kova, takımyıldızların kayması nedeniyle Şubat ve Mart aylarının bir kısmını etkisi altına alır.";
    } else if ((ay == 3 && gun >= 11) || (ay == 4 && gun <= 18)) {
        burc = "Balık";
        aciklama = "13 burç sistemine göre bu tarihlerde Balık burcu etkindir. Merhamet, hayal gücü ve derin sezgileri temsil eden Balık burcu, bu sistemde Mart ayının ortasından Nisan ayının ortasına kadar uzanan geniş bir dönemi kapsar. Ruhsallık ve yaratıcılık bu dönemde doğanlar için ana temadır.";
    } else if ((ay == 4 && gun >= 18) || (ay == 5 && gun <= 13)) {
        burc = "Koç";
        aciklama = "13 burç sistemine göre bu tarihlerde Koç burcu etkindir. Zodyak'ın ateşli başlatıcısı olan Koç, bu takvimde Nisan sonu ve Mayıs başını kapsar. Cesaret, enerji ve yeni başlangıçları temsil eden bu burç, baharın canlanma enerjisiyle bu yeni tarihlerde daha da uyumlu hale gelir.";
    } else if ((ay == 5 && gun >= 13) || (ay == 6 && gun <= 21)) {
        burc = "Boğa";
        aciklama = "13 burç sistemine göre bu tarihlerde Boğa burcu etkindir. Sabır, güvenilirlik ve maddi değerlere düşkünlüğü temsil eden Boğa, bu sistemde Mayıs ayının ortasından Haziran ayının sonuna kadar süren oldukça uzun bir dönemi kapsar. Toprak elementinin bu sabit enerjisi, doğanın en verimli zamanına denk gelir.";
    } else if ((ay == 6 && gun >= 21) || (ay == 7 && gun <= 20)) {
        burc = "İkizler";
        aciklama = "13 burç sistemine göre bu tarihlerde İkizler burcu etkindir. İletişim, merak ve zihinsel esnekliği temsil eden İkizler, Haziran ve Temmuz aylarının birleşiminde yer alır. Bilgiye olan açlık ve hızlı adaptasyon yeteneği, bu dönemde doğanların en belirgin özellikleridir.";
    } else if ((ay == 7 && gun >= 20) || (ay == 8 && gun <= 10)) {
        burc = "Yengeç";
        aciklama = "13 burç sistemine göre bu tarihlerde Yengeç burcu etkindir. Hassasiyet, korumacılık ve derin duyguları temsil eden Yengeç, bu sistemde Temmuz sonu ve Ağustos başındaki kısa ama yoğun bir dönemi kapsar. Aile ve köklere olan bağlılık bu enerjinin merkezinde yer alır.";
    } else if ((ay == 8 && gun >= 10) || (ay == 9 && gun <= 16)) {
        burc = "Aslan";
        aciklama = "13 burç sistemine göre bu tarihlerde Aslan burcu etkindir. Özgüven, yaratıcılık ve liderliği temsil eden Aslan, Ağustos ayının ortasından Eylül ayının ortasına kadar süren enerjik bir dönemi kapsar. Parlamak ve ilgi odağı olmak bu dönemde doğanlar için doğal bir ihtiyaçtır.";
    } else if ((ay == 9 && gun >= 16) || (ay == 10 && gun <= 30)) {
        burc = "Başak";
        aciklama = "13 burç sistemine göre bu tarihlerde Başak burcu etkindir. Analiz, titizlik ve hizmet etme arzusunu temsil eden Başak, bu takvimdeki en geniş zaman dilimlerinden birine sahiptir (Eylül ortasından Ekim sonuna kadar). Düzen kurma ve detaylara odaklanma bu dönemin temel enerjisidir.";
    } else if ((ay == 10 && gun >= 30) || (ay == 11 && gun <= 23)) {
        burc = "Terazi";
        aciklama = "13 burç sistemine göre bu tarihlerde Terazi burcu etkindir. Adalet, denge ve sosyal uyumu temsil eden Terazi, Kasım ayının ilk üç haftasını kapsar. İlişkilerde huzur arayışı ve estetik değerler, bu dönemde doğanların ruhsal motivasyon kaynağıdır.";
    } else if ((ay == 11 && gun >= 23) || (ay == 11 && gun <= 29)) {
        burc = "Akrep";
        aciklama = "13 burç sistemine göre bu tarihlerde Akrep burcu etkindir. Bu sistemde Akrep burcu, takımyıldızın konumu nedeniyle sadece 6 günlük (23-29 Kasım) çok kısa bir süreyi kapsar. Tutku, derinlik ve gizemli güçler bu burcun en yoğun hissedildiği kısa ama etkili zamandır.";
    } else if ((ay == 11 && gun >= 29) || (ay == 12 && gun <= 17)) {
        burc = "Yılan (Ophiuchus)";
        aciklama = "Yılan burcu, 13 burç sisteminin en dikkat çekici üyesidir ve 29 Kasım - 17 Aralık tarihlerini kapsar. Geleneksel sistemde yer almayan bu burç, şifa gücü, bilgi arayışı ve ruhsal dönüşümle ilişkilendirilir. Yılan burcu insanları genellikle hırslı, karizmatik ve gizli bilgilere meraklı bireyler olarak tanımlanır. Bu burç, Akrep'in derinliği ile Yay'ın bilgeliği arasında bir köprü görevi görür.";
    } else if ((ay == 12 && gun >= 17) || (ay == 1 && gun <= 20)) {
        burc = "Yay";
        aciklama = "13 burç sistemine göre bu tarihlerde Yay burcu etkindir. Maceracı ruh, dürüstlük ve iyimserliği temsil eden Yay, Aralık sonu ve Ocak başını kapsar. Hayatın anlamını sorgulayan ve yeni ufuklara açılmak isteyen Yay enerjisi, bu yeni takvimde yılbaşı dönemine denk gelir.";
    }

    document.getElementById('hc-13burc-value').innerText = burc;
    document.getElementById('hc-13burc-desc').innerText = aciklama;
    document.getElementById('hc-on-uc-burc-result').classList.add('visible');
}
