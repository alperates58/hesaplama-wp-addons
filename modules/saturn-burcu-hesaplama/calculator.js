function hcSaturnBurcuHesapla() {
    const tarihStr = document.getElementById('hc-saturn-tarih').value;
    if (!tarihStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    const date = new Date(tarihStr);
    
    function getJD(d) { return (d.getTime() / 86400000) + 2440587.5; }
    const jd = getJD(date);
    const d = jd - 2451543.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    function getHeliocentric(planet, d) {
        let { N, i, w, a, e, M0, M1 } = planet;
        let M = norm(M0 + M1 * d);
        let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
        for(let j=0; j<3; j++) E = E - (E - (180/Math.PI)*e*Math.sin(E*rad) - M) / (1 - e*Math.cos(E*rad));
        let xv = a * (Math.cos(E * rad) - e);
        let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        let r = Math.sqrt(xv * xv + yv * yv);
        let lonecl = norm(v + w);
        let x = r * (Math.cos(N * rad) * Math.cos(lonecl * rad) - Math.sin(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let y = r * (Math.sin(N * rad) * Math.cos(lonecl * rad) + Math.cos(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let z = r * Math.sin(lonecl * rad) * Math.sin(i * rad);
        return { x, y, z };
    }

    const earth = { N: 0, i: 0, w: 102.9404 + 0.0000470935 * d, a: 1.00000011, e: 0.01671022 - 0.0000000012 * d, M0: 357.5291, M1: 0.98560028 };
    const saturn = { N: 113.6634 + 0.000023981 * d, i: 2.4886 - 0.0000001081 * d, w: 339.3939 + 0.0000297661 * d, a: 9.55475, e: 0.055546 - 0.00000000949 * d, M0: 316.9670, M1: 0.033444228 };

    const pE = getHeliocentric(earth, d);
    const pS = getHeliocentric(saturn, d);

    const xG = pS.x - pE.x;
    const yG = pS.y - pE.y;
    const lonG = norm(Math.atan2(yG, xG) / rad);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const burc = burclar[Math.floor(lonG / 30)];

    const yorumlar = {
        "Koç": "Satürn'ü Koç burcunda olan bireyler için hayat dersleri sabır, öz disiplin ve öfke kontrolü üzerine kuruludur. Kendi başlarına hareket etme arzuları çok yüksektir, ancak bu yolculukta sorumluluk almayı ve sonuçlara katlanmayı öğrenmeleri gerekir. Aceleci tavırları, Satürn'ün kısıtlayıcı enerjisiyle karşılaştığında hayal kırıklığı yaratabilir. Onlar için asıl başarı, enerjilerini bir plana sadık kalarak ve uzun vadeli hedeflere odaklanarak kullanmayı öğrendiklerinde gelir. İçsel otoritelerini inşa etmek en büyük sınavlarıdır.",
        "Boğa": "Satürn Boğa kişileri için hayat dersleri maddi güvenlik, öz değer ve kalıcılık üzerinedir. Sahip oldukları kaynakları yönetmeyi, tutumlu olmayı ve emeğin değerini öğrenmek zorundadırlar. Finansal konularda veya öz güvenle ilgili alanlarda kısıtlamalar yaşayabilirler, ancak bu kısıtlamalar onları daha sağlam bir temel kurmaya iter. Sabırları ve dayanıklılıkları sayesinde en büyük başarılarını geç yaşlarda ama kalıcı bir şekilde elde ederler. Onlar için başarı, emekle işlenmiş huzurlu ve güvenli bir hayat inşa etmektir.",
        "İkizler": "Satürn'ü İkizler burcunda olanlar için sorumluluklar iletişim, eğitim ve zihinsel disiplin alanındadır. Bilgiyi yüzeysel değil, derinlemesine ve sistemli bir şekilde öğrenmeyi öğrenmeleri gerekir. Konuşma veya yazma konularında başlangıçta bazı engeller yaşayabilirler, ancak bu onları bu alanlarda uzmanlaşmaya ve çok daha etkili bir iletişim tarzı geliştirmeye iter. Mantık ve rasyonellik hayatlarının temel taşıdır. Onlar için asıl gelişim, zihinsel dağınıklığı toplayıp odaklanmış bir düşünce yapısına sahip olduklarında gerçekleşir.",
        "Yengeç": "Satürn'ü Yengeç burcunda olan bireyler için hayat dersleri duygusal güvenlik, aile ve geçmişle yüzleşmek üzerinedir. Duygularını ifade etmekte veya aidiyet hissetmekte zorluklar yaşayabilirler, ancak bu onları içsel bir güç inşa etmeye ve kendi kendilerine yetmeye iter. Ailevi sorumluluklar hayatlarında önemli bir yer tutar. Duygusal bir kabuk inşa etmek yerine, hassasiyetlerini bir güç olarak kullanmayı öğrenmeleri gerekir. Onlar için başarı, kendi iç dünyalarında sarsılmaz bir temel ve güvenli bir yuva kurabilmektir.",
        "Aslan": "Satürn Aslan kişileri için sorumluluklar yaratıcılık, özgüven ve liderlik alanındadır. Takdir edilme arzuları Satürn'ün ciddiyetiyle karşılaştığında, kendilerini ifade etmekte çekingen davranabilirler. Ancak bu sınav onları, dış onaydan bağımsız, gerçek bir içsel güven geliştirmeye iter. Liderlik vasıflarını sadece egoları için değil, başkalarının sorumluluğunu almak için kullanmayı öğrenmeleri gerekir. Sanatsal yeteneklerini disiplinli bir çalışma ile somut bir başarıya dönüştürebilirler. Onlar için asıl büyüklük, mütevazı bir asalet sergilemektedir.",
        "Başak": "Satürn'ü Başak burcunda olanlar için hayat dersleri düzen, sağlık ve mükemmeliyetçilik üzerinedir. Detaylara olan aşırı düşkünlükleri onları zaman zaman endişeli yapabilir, ancak bu disiplin onları işlerinde usta kılar. Pratik zekalarını başkalarına faydalı olmak ve sistemler kurmak için kullanmayı öğrenmeleri gerekir. Sağlık ve rutinlerine dikkat etmek onlar için bir zorunluluktur. Eleştirel yönlerini yıkıcı değil, yapıcı bir şekilde kullanmayı öğrendiklerinde hayatta büyük bir düzen ve verimlilik sağlarlar. Başarıları, titiz çalışmalarının meyvesidir.",
        "Terazi": "Satürn'ün yüceldiği Terazi burcunda olması, sorumlulukların ilişkiler, adalet ve diplomasi alanında olduğunu temsil eder. Bu kişiler için evlilik ve ortaklıklar ciddi birer sınavdır; ilişkilerinde dengeyi ve adaleti kurmayı öğrenmek zorundadırlar. Yalnız kalma korkusuyla veya aşırı fedakarlıkla yüzleşebilirler. Ancak bu süreç onları, sağlam ve kalıcı bağlar kurabilen, diplomatik gücü yüksek bireylere dönüştürür. Hak ve hukuk konularında çok titizdirler. Onlar için başarı, hayatın her alanında mutlak bir denge ve adalet sağlamaktır.",
        "Akrep": "Satürn'ü Akrep burcunda olan bireyler için hayat dersleri güç, dönüşüm ve derin duygusal bağlar üzerinedir. Kontrolü kaybetme korkusu veya güven sorunlarıyla yüzleşebilirler, ancak bu sınav onları ruhsal bir simyacıya dönüştürür. Kendi gölgeleriyle yüzleşmek ve küllerinden yeniden doğmayı öğrenmek zorundadırlar. Maddi ve manevi paylaşımlarda sorumluluk almak hayatlarının temel temasıdır. Sezgilerini ve güçlerini gizli tutmayı, sadece gerektiğinde dönüştürücü bir şekilde kullanmayı öğrenirler. Onlar için başarı, ruhun en derinliklerindeki güce hakim olmaktır.",
        "Yay": "Satürn'ü Yay burcunda olanlar için sorumluluklar inançlar, felsefe ve etik değerler alanındadır. Hayatın anlamını sadece teoride değil, pratikte de yaşamayı ve dürüstlükten asla ödün vermemeyi öğrenmeleri gerekir. Yüksek öğrenim veya inanç sistemleri konusunda kısıtlamalar veya sorgulamalar yaşayabilirler; ancak bu süreç onları çok daha sağlam bir dünya görüşüne ulaştırır. Vizyonlarını somutlaştırmak ve idealleri için disiplinle çalışmak zorundadırlar. Onlar için asıl bilgelik, geniş ufuklara sahip olurken ayaklarını yere sağlam basabilmektir.",
        "Oğlak": "Satürn'ün kendi burcu Oğlak'ta olması, sorumluluğun ve disiplinin en saf halini temsil eder. Bu kişiler hayatı ciddi bir görev gibi görürler ve zirveye ulaşmak için her türlü zorluğa göğüs gererler. Otorite figürleriyle ilgili sınavlar yaşayabilir veya erken yaşta büyük sorumluluklar alabilirler. Sabırları ve stratejik düşünme yetenekleri sayesinde kalıcı başarılar elde ederler. Duygularını kontrol altında tutup hedeflerine odaklanmakta ustadırlar. Onlar için başarı, yıllar süren emeğin sonucunda inşa edilmiş sağlam bir kariyer ve saygın bir toplumsal statüdür.",
        "Kova": "Satürn'ün klasik yöneticisi olduğu Kova burcunda olması, sorumlulukların toplumsal idealler, bağımsızlık ve yenilikçilik alanında olduğunu temsil eder. Geleneksel olanla modern olan arasında bir köprü kurmayı ve toplumu ileriye taşıyacak sistemleri disiplinle inşa etmeyi öğrenmeleri gerekir. Arkadaş çevrelerinde veya sosyal gruplarda bazı kısıtlamalar yaşayabilirler, ancak bu onları daha seçici ve kaliteli bağlar kurmaya iter. Özgürlüklerini korurken başkalarının haklarına saygı duymayı öğrenirler. Onlar için başarı, geleceği inşa eden akılcı bir devrimdir.",
        "Balık": "Satürn'ü Balık burcunda olan bireyler için hayat dersleri sınır koymak, maneviyat ve fedakarlık üzerinedir. Duygusal sınırlarını korumayı, hayallerini gerçeğe dönüştürmeyi ve kurban psikolojisinden çıkmayı öğrenmek zorundadırlar. Kaosun içinde bir düzen kurmak ve sezgilerini disiplinle kullanmak en büyük sınavlarıdır. Yalnızlık veya melankoli ile yüzleşebilirler, ancak bu süreç onları derin bir şefkate ve ruhsal bir bilgeliğe ulaştırır. Sanatsal yeteneklerini veya şifa güçlerini somut bir faydaya dönüştürmeyi öğrendiklerinde, hayatın manevi derinliğini dünyaya taşıyan köprüler olurlar."
    };

    document.getElementById('hc-saturn-value').innerText = burc;
    document.getElementById('hc-saturn-desc').innerText = yorumlar[burc];
    document.getElementById('hc-saturn-burcu-result').classList.add('visible');
}
