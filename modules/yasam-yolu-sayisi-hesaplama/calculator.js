function hcLpHesapla() {
    const tarihStr = document.getElementById('hc-lp-tarih').value;
    if (!tarihStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    
    const parts = tarihStr.split('-');
    const digits = (parts[0] + parts[1] + parts[2]).split('').map(Number);
    
    function reduce(num) {
        if (num === 11 || num === 22 || num === 33) return num;
        if (num < 10) return num;
        const sum = num.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        return reduce(sum);
    }

    let total = digits.reduce((a, b) => a + b, 0);
    const lp = reduce(total);

    const yorumlar = {
        1: "Yaşam Yolu 1 olan bireyler, doğal birer lider, yenilikçi ve öncüdürler. Kendi yollarını çizmek, bağımsız hareket etmek ve yaratıcı enerjilerini somut projelere dönüştürmek en büyük yaşam amaçlarıdır. Güçlü bir iradeye ve yüksek bir motivasyona sahiptirler; ancak bu süreçte bencillikten ve aşırı baskınlıktan kaçınmayı öğrenmeleri gerekir. Hayatları boyunca başkalarına ilham verecek yeni başlangıçlar yapma potansiyelleri çok yüksektir. Başarıya ulaşmak için kendi yeteneklerine güvenmeleri yeterlidir.",
        2: "Yaşam Yolu 2 olanlar için hayatın merkezinde uyum, iş birliği ve diplomasi vardır. Onlar barış yapıcıdırlar; çevrelerindeki insanları bir araya getirme ve hassas dengeleri koruma konusunda inanılmaz bir yeteneğe sahiptirler. Çok güçlü sezgileri ve yüksek bir empati kapasiteleri vardır, ancak bu durum onları bazen aşırı hassas ve kırılgan yapabilir. Yaşam amaçları, sevgi ve uyum yoluyla başkalarına destek olmak ve birlikteliğin gücünü göstermektir. Sabır ve nezaket en büyük güçleridir.",
        3: "Yaşam Yolu 3 olan bireyler, Zodyak'ın ve numerolojinin en yaratıcı, neşeli ve dışadönük ruhlarıdır. Kendilerini sanat, konuşma, yazma veya sosyal ilişkiler yoluyla ifade etmek en büyük tutkularıdır. Hayata pozitif bir enerji yayarlar ve çevrelerindeki insanları neşelendirme yetenekleri vardır. Ancak zaman zaman odaklanmakta güçlük çekebilir ve enerjilerini dağıtabilirler. Yaşam amaçları, yaratıcı ifadelerini kullanarak dünyaya güzellik ve neşe katmaktır. Sosyal çevreleri onların en büyük ilham kaynağıdır.",
        4: "Yaşam Yolu 4 olanlar için hayat; disiplin, çalışma, düzen ve kalıcılık üzerine kuruludur. Onlar hayatın sağlam temelini atan mimarlardır; pratik zekaları ve yüksek sorumluluk duyguları sayesinde en zorlu projeleri bile başarıyla tamamlarlar. Güvenilirlik ve dürüstlük en temel prensipleridir, ancak değişime karşı dirençli ve bazen fazla katı olabilirler. Yaşam amaçları, sabır ve emekle dünyada kalıcı eserler bırakmak ve güvenli bir düzen inşa etmektir. Onlar için başarı, sistemli çalışmanın doğal bir sonucudur.",
        5: "Yaşam Yolu 5 olan bireylerin ruhu özgürlük, macera ve değişim için yaratılmıştır. Rutin hayat ve kısıtlamalar onlara göre değildir; sürekli yeni yerler görmek, yeni insanlar tanımak ve farklı deneyimler yaşamak isterler. Çok yönlü ve hızlı adaptasyon yeteneği olan kişilerdir, ancak bu durum bazen maymun iştahlılığa ve kararsızlığa yol açabilir. Yaşam amaçları, özgürlüğün gerçek anlamını keşfetmek ve deneyimlerini başkalarıyla paylaşarak onlara ilham vermektir. Değişim, onların en büyük öğretmenidir.",
        6: "Yaşam Yolu 6 olanlar için hayatın odağında sevgi, aile, sorumluluk ve hizmet vardır. Onlar doğuştan şifacı ve koruyucudurlar; çevrelerindeki insanların ihtiyaçlarını karşılamak ve onlara huzurlu bir ortam yaratmak için büyük çaba sarf ederler. Adalet duyguları çok gelişmiştir, ancak bazen başkalarının hayatına aşırı müdahale etme ve 'mükemmeliyetçi' olma tuzağına düşebilirler. Yaşam amaçları, koşulsuz sevgiyi deneyimlemek ve toplumda uyumu sağlamaktır. Evleri ve sevdikleri onların en büyük hazinesidir.",
        7: "Yaşam Yolu 7 olan bireyler, hayatın derin anlamlarını araştıran birer bilge ve gözlemcidirler. Yüzeysel olanla yetinmezler; her zaman hakikatin, gizemin ve ruhsal bilgeliğin peşindedirler. Yalnız kalmaktan ve kendi iç dünyalarına çekilip düşünmekten büyük keyif alırlar. Analitik zekaları ile sezgileri birleşmiştir, bu da onlara benzersiz bir kavrayış yeteneği verir. Yaşam amaçları, maddi dünyanın ötesindeki gerçeği bulmak ve ruhsal bir derinlik kazanmaktır. Sessizlik, onların en güçlü rehberidir.",
        8: "Yaşam Yolu 8 olanlar için hayat; güç, başarı, finansal bolluk ve yönetim üzerine kuruludur. Maddi dünyada büyük hedeflere ulaşma potansiyelleri çok yüksektir; ancak bu gücü adaletli ve etik bir şekilde kullanmayı öğrenmeleri gerekir. Liderlik vasıfları ve stratejik düşünme yetenekleri çok gelişmiştir, bu da onları iş dünyasında zirveye taşır. Yaşam amaçları, maddi ve manevi dünya arasındaki dengeyi kurmak ve elde ettikleri başarıyı toplumun faydasına kullanmaktır. Kararlılıkları, onları her türlü zorluğun üstesinden getirir.",
        9: "Yaşam Yolu 9 olan bireyler, evrensel sevgi, merhamet ve tamamlanma enerjisini temsil ederler. Onlar dünya vatandaşlarıdır; hiçbir ayrım gözetmeksizin tüm insanlığa faydalı olma arzusu taşırlar. Hayatları boyunca birçok bitiş ve yeni başlangıç deneyimleyebilirler, bu da onlara büyük bir hoşgörü ve bilgelik kazandırır. Sanatsal yönleri ve idealist yapıları çok güçlüdür, ancak bazen dünyanın sert gerçekleri karşısında hayal kırıklığı yaşayabilirler. Yaşam amaçları, fedakarlık ve sevgi yoluyla dünyaya ışık tutmak ve bir döngüyü başarıyla tamamlamaktır.",
        11: "Yaşam Yolu 11 olanlar 'Aydınlanmış Elçiler' olarak bilinirler. Bu bir Üstad Sayısıdır ve çok yüksek bir sezgisel güç, ruhsal farkındalık ve ilham yeteneği getirir. İnsanlığın bilincini yükseltmek ve onlara ruhsal bir vizyon sunmak için dünyaya gelmişlerdir. Ancak bu yüksek enerji, zaman zaman aşırı gerginlik ve hassasiyet yaratabilir. Yaşam amaçları, sezgilerini kullanarak başkalarına rehberlik etmek ve bir köprü görevi görmektir. Onlar için şifa ve ilham, günlük hayatın bir parçasıdır.",
        22: "Yaşam Yolu 22 'Usta Mimar' olarak adlandırılır. Numerolojinin en güçlü sayılarından biri olan 22, büyük hayalleri gerçeğe dönüştürme ve dünyada kalıcı, devasa yapılar inşa etme potansiyeline sahiptir. Hem 4'ün pratikliğini hem de 11'in vizyonerliğini bünyesinde taşırlar. Sorumlulukları çok büyüktür ve toplumsal dönüşümde önemli bir rol oynarlar. Yaşam amaçları, ruhsal idealleri maddi dünyada somut ve faydalı projelere dönüştürmektir. Onlar için imkansız diye bir şey yoktur, sadece zaman ve planlama gerekir.",
        33: "Yaşam Yolu 33 'Usta Öğretici' veya 'Dünya Anası/Babası' olarak bilinir. Koşulsuz sevginin ve fedakarlığın en yüksek temsilcisidir. Hayatlarını başkalarının acılarını dindirmeye, onlara şifa vermeye ve evrensel sevgiyi öğretmeye adarlar. Çok güçlü bir yaratıcılık ve merhamet duyguları vardır. Bu sayıya sahip olmak büyük bir duygusal yükü de beraberinde getirebilir. Yaşam amaçları, sevginin iyileştirici gücünü dünyaya yaymak ve insanlığa ruhsal bir rehberlik sunmaktır. Onlar için asıl mutluluk, başkalarının hayatında fark yaratmaktır."
    };

    document.getElementById('hc-lp-value').innerText = lp;
    document.getElementById('hc-lp-desc').innerText = yorumlar[lp];
    document.getElementById('hc-yasam-yolu-result').classList.add('visible');
}
