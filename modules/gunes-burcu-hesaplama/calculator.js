function hcGunesBurcuHesapla() {
    const birthdate = document.getElementById('hc-gb-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const month = date.getMonth() + 1;
    const day = date.getDate();

    let sign = "";
    let description = "";

    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) {
        sign = "Koç";
        description = `
            <p><strong>Koç Burcu (21 Mart - 19 Nisan):</strong> Zodyak'ın ilk burcu olan Koç, enerjisi, cesareti ve öncü ruhuyla tanınır. Ateş elementinin dinamizmini ve Öncü niteliğin başlatma gücünü taşır. 2026 yılı projeksiyonlarına göre, Koç burçları için bu yıl Satürn'ün burçlarındaki seyriyle birlikte hayatlarında daha disiplinli ve kalıcı adımlar atma dönemi olacaktır.</p>
            <p>Koç burcu bireyleri genellikle dürüst, doğrudan ve enerjiktir. Bir projeye başlamak için kimseden izin beklemezler. Ancak sabırsızlık ve düşünmeden hareket etme eğilimi bazen zorluklara neden olabilir. Mars tarafından yönetilen bu burç, savaşçı ruhu temsil eder.</p>
            <p>Karakteristik özellikleriniz arasında liderlik vasıfları, yüksek özgüven ve yeniliklere olan merakınız ön plandadır. Siz bir "başlatıcı"sınız. Zorluklar karşısında yılmaz, aksine kamçılanırsınız. İlişkilerinizde tutkulu ve sadıksınızdır, ancak bağımsızlığınıza olan düşkünlüğünüz bazen partnerinizle çatışmalara yol açabilir.</p>
            <p>Fiziksel olarak genellikle atletik bir yapıya ve canlı bakışlara sahipsinizdir. Stres yönetimi ve sabır üzerinde çalışmak, potansiyelinizi tam anlamıyla ortaya çıkarmanıza yardımcı olacaktır.</p>
        `;
    } else if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) {
        sign = "Boğa";
        description = `
            <p><strong>Boğa Burcu (20 Nisan - 20 Mayıs):</strong> Toprak elementinin güven veren doğasını ve Sabit niteliğin dayanıklılığını temsil eden Boğa, Zodyak'ın en güvenilir ve sabırlı burçlarından biridir. Venüs tarafından yönetilen bu burç, hayattaki güzelliklere, konfora ve maddi güvenliğe büyük önem verir.</p>
            <p>Boğa bireyleri için huzur ve stabilite her şeyden önce gelir. Değişimden pek hoşlanmazlar ancak bir şeye karar verdiklerinde onu sonuna kadar götürme azmine sahiptirler. Estetik duygunuz çok gelişmiştir; sanat, müzik ve lezzetli yemekler hayatınızın vazgeçilmezleridir.</p>
            <p>Karakteristik olarak sadık, pratik ve gerçekçisinizdir. Ayaklarınız yere sağlam basar. Ancak bazen inadınız ve aşırı sahiplenici tavırlarınız ilişkilerinizde zorluk yaratabilir. Maddi konularda yeteneklisinizdir ve birikim yapma konusunda doğal bir beceriye sahipsinizdir.</p>
            <p>2026 yılındaki Uranüs geçişleri, sizin hayatınızda ani ve köklü değişimleri tetikleyebilir. Konfor alanınızdan çıkmak zorunda kalsanız da, bu durumun sizi daha özgür kılacağını unutmamalısınız.</p>
        `;
    } else if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) {
        sign = "İkizler";
        description = `
            <p><strong>İkizler Burcu (21 Mayıs - 20 Haziran):</strong> Hava elementinin hareketliliği ve Değişken niteliğin esnekliği İkizler burcunda birleşir. Merkür tarafından yönetilen bu burç, iletişimin, zekanın ve bilginin temsilcisidir. Her zaman meraklı, her zaman öğrenmeye aç ve her zaman konuşmaya hazırdır.</p>
            <p>İkizler bireyleri çok yönlüdür. Aynı anda birkaç işi birden yapabilirler ve sosyal çevrelerinde "neşe kaynağı" olarak bilinirler. Ancak odaklanma sorunları ve kararsızlık, başladıkları işleri bitirmelerini zorlaştırabilir. İkili bir yapıya sahip olduğunuz için duygusal durumunuz hızlı değişebilir.</p>
            <p>Zekanız kıvrak, esprileriniz keskindir. Bilgiyi toplamak ve başkalarına yaymak sizin asıl görevinizdir. İlişkilerinizde zihinsel uyum en az fiziksel çekim kadar önemlidir. Monotonluktan nefret edersiniz.</p>
            <p>Modern dünyada İkizler burcu, teknoloji ve iletişim kanallarını en iyi kullanan burçtur. 2026 yılında Jüpiter'in Aslan geçişi, sizin sosyal çevrenizi ve iletişim ağınızı daha da genişleterek yeni fırsatlar sunacaktır.</p>
        `;
    } else if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) {
        sign = "Yengeç";
        description = `
            <p><strong>Yengeç Burcu (21 Haziran - 22 Temmuz):</strong> Su elementinin derin duygusallığı ve Öncü niteliğin koruyucu gücü Yengeç burcunda hayat bulur. Ay tarafından yönetilen bu burç, evi, aileyi, kökleri ve duygusal güvenliği temsil eder. Zodyak'ın en şefkatli ve empatik burcudur.</p>
            <p>Yengeç bireyleri dışarıdan sert bir kabuğa sahip gibi görünseler de içeride çok hassas ve kırılgandırlar. Sevdiklerini korumak için her şeyi yapabilirler. Sezgileriniz o kadar güçlüdür ki, insanların ne hissettiğini kelimeler olmadan anlayabilirsiniz.</p>
            <p>Geçmişe olan bağlılığınız ve anı biriktirme merakınız sizi bazen "melankolik" bir ruh haline sokabilir. İlişkilerinizde sadakat ve derin bir bağ ararsınız. Reddedilme korkusu bazen kendinizi geri çekmenize neden olabilir.</p>
            <p>2026 yılındaki tutulmalar, sizin ailevi konularınızda ve yerleşim planlarınızda önemli kararlar almanıza neden olabilir. İç sesinize güvenerek hareket etmek size en doğru yolu gösterecektir.</p>
        `;
    } else if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) {
        sign = "Aslan";
        description = `
            <p><strong>Aslan Burcu (23 Temmuz - 22 Ağustos):</strong> Ateş elementinin parlaklığı ve Sabit niteliğin kararlılığı Aslan burcunda birleşir. Güneş tarafından yönetilen bu burç, sahnenin, yaratıcılığın ve krallığın temsilcisidir. Özgüveni yüksek, cömert ve karizmatik bir yapınız vardır.</p>
            <p>Aslan bireyleri doğal liderlerdir. Girdikleri her ortamda dikkatleri üzerlerine çekerler. Sevdiklerinize karşı çok cömert ve koruyucusunuzdur. Ancak bazen aşırı gurur ve ilgi odağı olma isteği çevrenizdekilerle sorun yaşamanıza neden olabilir.</p>
            <p>Yaratıcı yetenekleriniz çok gelişmiştir. Sanat, eğlence ve organizasyon işlerinde çok başarılı olabilirsiniz. Çocuksu bir neşeye ve yaşama sevincine sahipsinizdir. Kalbiniz büyüktür ve adaletsizliğe tahammül edemezsiniz.</p>
            <p>2026 yılı sizin için "yıldızlaşma" yılı olabilir. Jüpiter'in burcunuza geçişi (Haziran sonrası), şans kapılarını ardına kadar açacak ve size büyük fırsatlar sunacaktır. Bu dönemi kendinizi parlatmak için kullanın.</p>
        `;
    } else if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) {
        sign = "Başak";
        description = `
            <p><strong>Başak Burcu (23 Ağustos - 22 Eylül):</strong> Toprak elementinin verimliliği ve Değişken niteliğin analiz gücü Başak burcunda buluşur. Merkür tarafından yönetilen bu burç, hizmetin, detayın ve mükemmeliyetçiliğin sembolüdür. Çalışkan, titiz ve pratik bir zekaya sahipsinizdir.</p>
            <p>Başak bireyleri için düzen ve fayda sağlamak çok önemlidir. Eleştirel gözünüz hiçbir detayı kaçırmaz. Bu durum bazen hem kendinize hem de başkalarına karşı aşırı talepkar olmanıza yol açabilir. Yardımseverliğiniz ve alçakgönüllülüğünüz ile tanınırsınız.</p>
            <p>Sağlıklı yaşam ve beslenme konularına olan ilginiz, hayatınızın disiplinli olmasını sağlar. Zihninizi sürekli meşgul edecek projeler ararsınız. İlişkilerinizde güven ve huzur arar, partnerinizin hayatını kolaylaştırmak için çabalarsınız.</p>
            <p>2026 yılında burcunuzda gerçekleşecek olan tutulmalar, yaşam amacınızı sorgulamanıza ve kariyerinizde önemli bir sadeleşmeye gitmenize neden olabilir. Gereksiz detaylardan kurtulup büyük resme odaklanma zamanı.</p>
        `;
    } else if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) {
        sign = "Terazi";
        description = `
            <p><strong>Terazi Burcu (23 Eylül - 22 Ekim):</strong> Hava elementinin sosyal yönü ve Öncü niteliğin denge kurma çabası Terazi burcunda hayat bulur. Venüs tarafından yönetilen bu burç, adaletin, diplomasinin ve estetiğin temsilcisidir. Nazik, uyumlu ve zarif bir karakteriniz vardır.</p>
            <p>Terazi bireyleri için "ilişkiler" her şeydir. Yalnız kalmaktan hoşlanmazlar ve her zaman orta yolu bulmaya çalışırlar. Ancak karar verme aşamasındaki kararsızlıkları bazen fırsatları kaçırmalarına neden olabilir. Estetik anlayışınız ve moda/sanat zevkiniz çok yüksektir.</p>
            <p>Adalet duygunuz çok gelişmiştir; haksızlığa uğrayan birini gördüğünüzde diplomatik yeteneklerinizi kullanarak durumu düzeltmeye çalışırsınız. Çatışmadan kaçınma eğiliminiz bazen kendi ihtiyaçlarınızı bastırmanıza yol açabilir.</p>
            <p>2026 yılında Güney Ay Düğümü'nün burcunuzdaki seyri, eski ilişkileri ve alışkanlıkları geride bırakmanız gerektiğini hatırlatıyor. Kendi merkezinizde kalmayı öğrenmek bu yılın en büyük dersi olacak.</p>
        `;
    } else if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) {
        sign = "Akrep";
        description = `
            <p><strong>Akrep Burcu (23 Ekim - 21 Kasım):</strong> Su elementinin yoğunluğu ve Sabit niteliğin sarsılmazlığı Akrep burcunda birleşir. Mars ve Plüton tarafından yönetilen bu burç, dönüşümün, tutkunun ve gizemin temsilcisidir. Güçlü sezgileri olan, kararlı ve derin bir karakteriniz vardır.</p>
            <p>Akrep bireyleri için hayat bir "hep ya da hiç" meselesidir. Yüzeysel olan hiçbir şey size çekici gelmez. Bir konunun özüne inene kadar durmazsınız. Sadakatiniz sarsılmazdır ancak ihanete uğradığınızda unutmanız ve affetmeniz zordur.</p>
            <p>Gizemli havasınız insanları size çeker. Duygularınızı kolay kolay dışarı vurmazsınız ama içeride bir volkan kaynamaktadır. Araştırmacı ruhunuz sayesinde çözülemeyen problemleri çözme yeteneğine sahipsinizdir.</p>
            <p>2026 yılında yönetici gezegeniniz Plüton'un Kova burcundaki seyri, sizin sosyal çevrenizi ve hayata bakış açınızı kökten değiştirecektir. Güç savaşlarından kaçınıp ruhsal dönüşümünüze odaklanmak size büyük bir hafifleme getirecektir.</p>
        `;
    } else if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) {
        sign = "Yay";
        description = `
            <p><strong>Yay Burcu (22 Kasım - 21 Aralık):</strong> Ateş elementinin vizyonu ve Değişken niteliğin özgürlüğü Yay burcunda buluşur. Jüpiter tarafından yönetilen bu burç, felsefenin, uzak yolların ve iyimserliğin sembolüdür. Maceracı, dürüst ve bilgiye aç bir yapınız vardır.</p>
            <p>Yay bireyleri için hayat bir keşif yolculuğudur. Sınırlandırılmaktan nefret ederler. Neşeli ve espri yeteneği güçlü karakterinizle çevrenize ışık saçarsınız. Ancak bazen aşırı patavatsızlık ve risk alma eğilimi başınızı ağrıtabilir.</p>
            <p>Öğrenmek ve öğretmek sizin doğanızda var. Yabancı kültürler, dinler ve felsefeler ilginizi çeker. İnançlarınız kuvvetlidir ve her zaman bardağın dolu tarafını görmeye çalışırsınız. Özgürlüğünüze olan düşkünlüğünüz ikili ilişkilerde bazen mesafe ihtiyacı yaratabilir.</p>
            <p>2026 yılına kadar Uranüs'ün burcunuzdaki (retro süreçlerle etkili) seyri ve Satürn'ün destekleyici açısı, hayallerinizi gerçeğe dönüştürmek için size gereken disiplini sağlayacaktır. Seyahat planlarınızı şimdiden yapın!</p>
        `;
    } else if ((month == 12 && day >= 22) || (month == 1 && day <= 19)) {
        sign = "Oğlak";
        description = `
            <p><strong>Oğlak Burcu (22 Aralık - 19 Ocak):</strong> Toprak elementinin dayanıklılığı ve Öncü niteliğin stratejik gücü Oğlak burcunda birleşir. Satürn tarafından yönetilen bu burç, disiplinin, sorumluluğun ve zirveye giden yolun temsilcisidir. Ciddi, hırslı ve sabırlı bir yapınız vardır.</p>
            <p>Oğlak bireyleri için "başarı" bir seçenek değil, zorunluluktur. Genç yaşta olgunlaşırlar ve hayatın sorumluluklarını omuzlarına alırlar. Duygularınızı belli etmekte zorlanabilirsiniz ama sevdikleriniz için sarsılmaz bir kale gibisinizdir.</p>
            <p>Zamanı yönetme konusunda ustasınızdır. Adım adım, planlı bir şekilde hedefinize ilerlersiniz. Maddi güvenlik ve toplumsal statü sizin için önemlidir. Bazen aşırı işkoliklik ve karamsarlık ruh halinizi olumsuz etkileyebilir.</p>
            <p>2026 yılı, Satürn'ün Koç burcuna geçişiyle birlikte sizin için yeni bir 28 yıllık döngünün başlangıcı niteliğindedir. Kariyerinizde büyük bir sıçrama yapabilir veya hayatınızın temel taşlarını yeniden inşa edebilirsiniz.</p>
        `;
    } else if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) {
        sign = "Kova";
        description = `
            <p><strong>Kova Burcu (20 Ocak - 18 Şubat):</strong> Hava elementinin entelektüel gücü ve Sabit niteliğin idealleri Kova burcunda buluşur. Satürn ve Uranüs tarafından yönetilen bu burç, yeniliğin, teknolojinin ve toplumsal bilincin sembolüdür. Aykırı, bağımsız ve insancıl bir karakteriniz vardır.</p>
            <p>Kova bireyleri "gelecekte yaşarlar". Sıradan olan hiçbir şey onlara göre değildir. Özgürlüğünüze aşırı düşkünsünüzdür ve kısıtlandığınızı hissettiğiniz anda uzaklaşırsınız. Arkadaşlıklar sizin için aşktan bile daha önemli olabilir.</p>
            <p>Zihniniz bir dahi gibi çalışabilir; kimsenin aklına gelmeyen fikirler üretebilirsiniz. Ancak bazen duygulardan uzak, soğuk ve mesafeli bir tavır sergilemeniz ikili ilişkilerde sorun yaratabilir. Toplumsal fayda sağlayan her türlü organizasyonun içinde yer almak istersiniz.</p>
            <p>2026 yılında Plüton'un burcunuzdaki uzun süreli seyahati devam ediyor. Bu, sizin için "kendini yeniden yaratma" dönemidir. Eski kimliğinizden sıyrılıp gerçek potansiyelinize uyanacağınız bir süreçtesiniz.</p>
        `;
    } else {
        sign = "Balık";
        description = `
            <p><strong>Balık Burcu (19 Şubat - 20 Mart):</strong> Su elementinin sınırsızlığı ve Değişken niteliğin ruhsallığı Balık burcunda birleşir. Jüpiter ve Neptün tarafından yönetilen bu burç, hayallerin, sanatın ve evrensel sevginin temsilcisidir. Duyarlı, hayalperest ve merhametli bir karakteriniz vardır.</p>
            <p>Balık bireyleri için dünya bazen fazla sert gelebilir. Bu yüzden kendi hayal dünyalarına çekilme eğilimindedirler. Empati yeteneğiniz o kadar güçlüdür ki, başkalarının acısını kendi acınız gibi hissedebilirsiniz. Sanatsal yönünüz ve ilham gücünüz çok yüksektir.</p>
            <p>Fedakarlık yapmak sizin doğanızda var ancak bazen "kurban" psikolojisine düşmemek için sınırlarınızı belirlemeyi öğrenmelisiniz. Sezgileriniz her zaman size doğruyu söyler. Rüyalarınız ve iç dünyanız çok zengindir.</p>
            <p>2026 yılında burcunuzda gerçekleşecek Satürn-Neptün kavuşumu, hayallerinizi gerçeğe dönüştürmek için size muazzam bir fırsat sunacak. Artık sadece hayal kurmakla kalmayıp, bu hayalleri somut bir forma sokma zamanı geldi.</p>
        `;
    }

    document.getElementById('hc-gb-sign-name').innerText = sign;
    document.getElementById('hc-gb-sign-desc').innerHTML = description;
    document.getElementById('hc-gb-result').classList.add('visible');
}
