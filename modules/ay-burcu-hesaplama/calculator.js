function hcAyBurcuHesapla() {
    const tarihStr = document.getElementById('hc-ayburc-tarih').value;
    const saatStr = document.getElementById('hc-ayburc-saat').value;

    if (!tarihStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const tarih = new Date(tarihStr + 'T' + saatStr);
    
    // Julian Day calculation
    function getJD(date) {
        return (date.getTime() / 86400000) + 2440587.5;
    }

    const jd = getJD(tarih);
    const d = jd - 2451543.5; // Days since J2000.0

    // Moon's orbital elements (approximate)
    let N = 125.1228 - 0.0529538083 * d;
    let i = 5.1454;
    let w = 318.0634 + 0.1643573223 * d;
    let a = 60.2666;
    let e = 0.054900;
    let M = 115.3654 + 13.0649929509 * d;

    // Normalize angles
    function norm(x) {
        x = x % 360;
        if (x < 0) x += 360;
        return x;
    }

    N = norm(N);
    w = norm(w);
    M = norm(M);

    const rad = Math.PI / 180;
    let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
    
    // Iteration for E
    for (let j = 0; j < 3; j++) {
        E = E - (E - (180 / Math.PI) * e * Math.sin(E * rad) - M) / (1 - e * Math.cos(E * rad));
    }

    let xv = a * (Math.cos(E * rad) - e);
    let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));

    let v = norm(Math.atan2(yv, xv) / rad);
    let r = Math.sqrt(xv * xv + yv * yv);

    // Position in 3D
    let xeclip = r * (Math.cos(N * rad) * Math.cos((v + w) * rad) - Math.sin(N * rad) * Math.sin((v + w) * rad) * Math.cos(i * rad));
    let yeclip = r * (Math.sin(N * rad) * Math.cos((v + w) * rad) + Math.cos(N * rad) * Math.sin((v + w) * rad) * Math.cos(i * rad));

    let lon = norm(Math.atan2(yeclip, xeclip) / rad);

    // Perturbations for better accuracy (simplified)
    const Ls = norm(280.460 + 0.9856474 * d); // Sun Mean Long
    const Ms = norm(357.528 + 0.9856003 * d); // Sun Mean Anom
    const Lm = norm(N + w + M); // Moon Mean Long
    const D = norm(Lm - Ls); // Moon Mean Elongation
    const F = norm(Lm - N); // Moon Argument of Latitude

    lon += -1.274 * Math.sin((M - 2 * D) * rad);
    lon += 0.658 * Math.sin(2 * D * rad);
    lon += -0.186 * Math.sin(Ms * rad);
    lon += -0.059 * Math.sin((2 * M - 2 * D) * rad);
    lon += -0.057 * Math.sin((M - 2 * D + Ms) * rad);
    lon += 0.053 * Math.sin((M + 2 * D) * rad);
    lon += 0.046 * Math.sin((2 * D - Ms) * rad);
    lon += 0.041 * Math.sin((M - Ms) * rad);
    lon += -0.035 * Math.sin(D * rad);
    lon += -0.031 * Math.sin((M + Ms) * rad);

    lon = norm(lon);

    const burclar = [
        "Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak",
        "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"
    ];

    const burcIndex = Math.floor(lon / 30);
    const burc = burclar[burcIndex];

    const yorumlar = {
        "Koç": "Ay'ı Koç burcunda olan bireyler, duygusal tepkilerinde oldukça hızlı, doğrudan ve enerjiktirler. İç dünyalarında bitmek bilmeyen bir macera arzusu ve yenilik tutkusu taşırlar. Sabırsızlık en belirgin özelliklerinden biridir; istedikleri şeyin hemen gerçekleşmesini beklerler ve duygusal bir engelle karşılaştıklarında tepkilerini gizlemeden, ateşli bir şekilde ortaya koyarlar. Bağımsızlıklarına düşkündürler ve duygusal olarak kısıtlanmak onları huzursuz eder. Cesaretleri ve öncü ruhları, başkalarının adım atmaya çekindiği durumlarda onların duygusal bir liderlik sergilemesini sağlar.",
        "Boğa": "Ay'ı Boğa burcunda olan kişiler için duygusal güvenlik ve maddi konfor her şeyden önce gelir. Duygusal dünyaları oldukça sabit, huzurlu ve dayanıklıdır; kolay kolay sarsılmazlar ancak bir kez öfkelendiklerinde bu öfke kalıcı olabilir. Sadakat onlar için bir yaşam biçimidir ve sevdiklerine sıkı sıkıya bağlıdırlar. Doğayla vakit geçirmek, lezzetli yemekler yemek ve kaliteli eşyalarla çevrili olmak ruhlarını besler. Değişimden pek hoşlanmazlar, tanıdık ve güvenli olanı tercih ederler. Estetik duyarlılıkları çok gelişmiştir ve çevrelerini güzelleştirmekten büyük keyif alırlar.",
        "İkizler": "Duygusal dünyaları zihinsel bir süreçle iç içe geçmiş olan Ay İkizler kişileri, hislerini anlamlandırmak ve kelimelere dökmek konusunda ustadırlar. İç dünyaları oldukça hareketli, meraklı ve değişkendir; aynı anda birçok farklı duygu ve düşünce arasında mekik dokuyabilirler. Duygusal bir yakınlık kurmanın yolu onlar için entelektüel paylaşımdan geçer. Yalnız kalmaktan hoşlanmazlar, sürekli bir iletişim ve bilgi akışı içinde olma ihtiyacı duyarlar. Ruh halleri hızla değişebilir, bu da dışarıdan yüzeysel veya kararsız görünmelerine neden olsa da aslında her durumu farklı açılardan değerlendirme yeteneklerinin bir sonucudur.",
        "Yengeç": "Ay'ın kendi yöneticisi olduğu Yengeç burcunda bulunması, duyguların en saf ve en yoğun halini temsil eder. Bu kişiler son derece hassas, sezgisel ve empati yeteneği gelişmiş bireylerdir. Güvenlik ihtiyaçları çok yüksektir ve bu güvenliği genellikle ailelerinde ve evlerinde bulurlar. Geçmişe, anılara ve köklerine büyük bir bağlılık duyarlar. Korumacı bir yapıları vardır; sevdiklerini bir anne şefkatiyle sarmalarlar ancak incinmekten korktukları için duygusal bir kabuğun arkasına saklanabilirler. Ruh halleri ayın evreleri gibi dalgalıdır, bu da onları zaman zaman melankolik yapabilir.",
        "Aslan": "Ay'ı Aslan burcunda olan bireyler, duygusal dünyalarında büyük bir sıcaklık, cömertlik ve neşe taşırlar. Takdir edilmek, ilgi görmek ve onaylanmak ruhsal bir ihtiyaçtır onlar için. Duygularını dramatik bir şekilde ve büyük bir özgüvenle ifade ederler; sanki iç dünyaları bir sahnedir. Sevdiklerine karşı son derece sadık ve korumacıdırlar, onlarla gurur duymak isterler. Yaratıcılıklarını sergileyebildikleri alanlarda kendilerini duygusal olarak tatmin olmuş hissederler. Zaman zaman fazla inatçı veya egolu görünseler de, aslında kalpleri çok yumuşaktır ve başkalarına ilham vermekten mutluluk duyarlar.",
        "Başak": "Ay Başak kişileri için duygusal huzur, düzen ve faydalı olma duygusuyla gelir. İç dünyaları oldukça analizci ve titizdir; hislerini bile bir mantık çerçevesine oturtmaya çalışırlar. Başkalarına yardım etmek, bir işin ucundan tutmak ve hayatı kolaylaştırmak onları duygusal olarak en çok tatmin eden şeydir. Detaylara olan aşırı dikkatleri, zaman zaman kendilerine ve başkalarına karşı fazla eleştirel olmalarına neden olabilir. Mütevazı bir yapıları vardır ve gösterişten hoşlanmazlar. Sağlıklı yaşam, temizlik ve rutinler, ruhsal dengelerini korumaları için vazgeçilmez unsurlardır.",
        "Terazi": "Duygusal dünyasında denge, uyum ve adalet arayan Ay Terazi kişileri için ilişkiler hayatın merkezindedir. Yalnız kalmak onlar için duygusal bir boşluk hissi yaratabilir; bu yüzden her zaman bir eşlikçiye ihtiyaç duyarlar. Nazik, zarif ve barışçıl bir yapıları vardır, çatışmalardan kaçınmak için büyük çaba sarf ederler. Karar verme aşamasında tüm tarafları dinlemek istedikleri için kararsızlık yaşayabilirler. Estetik ve güzellik ruhlarını besler; çevrelerindeki her şeyin uyumlu ve göze hoş gelmesini isterler. Diplomasi yetenekleri sayesinde duygusal krizleri sakinlikle yönetebilirler.",
        "Akrep": "Duygularını en derin, en yoğun ve en gizemli şekilde yaşayanlar Ay Akrep bireyleridir. İç dünyaları adeta bir okyanus gibidir; yüzeyde sakin görünseler de derinlerde büyük fırtınalar kopabilir. Sezgileri inanılmaz güçlüdür, yalanı veya yapmacıklığı anında hissederler. Güven onlar için en zor kazanılan ancak en kutsal olan değerdir. Duygusal bir kriz anında küllerinden yeniden doğma yeteneğine sahiptirler. Tutkulu bir yapıları vardır, sevdiklerine derin bir bağlılık duyarlar ancak ihanete uğradıklarını hissettiklerinde bunu asla unutmazlar ve derin bir sessizliğe bürünebilirler.",
        "Yay": "Ay'ı Yay burcunda olan bireylerin ruhu özgürlük ve macera için yaratılmıştır. Duygusal olarak kısıtlanmaya gelemezler; her zaman yeni ufuklar keşfetmek, yeni bilgiler öğrenmek ve seyahat etmek isterler. İyimserlikleri en büyük güçleridir, en zor durumlarda bile bir umut ışığı bulmayı başarırlar. Dürüstlük onlar için çok önemlidir, hislerini ve düşüncelerini filtrelemeden olduğu gibi söylerler. Felsefi bir bakış açısına sahiptirler, hayatın anlamını sorgulamak ruhlarını besler. Rutin hayat ve dar bakış açıları onları duygusal olarak boğar; her zaman genişlemek ve büyümek isterler.",
        "Oğlak": "Duygusal dünyaları disiplinli, ciddi ve sorumluluk sahibi bir yapıya sahip olan Ay Oğlak kişileri, hislerini ifade etmekte temkinli davranırlar. Duygusal güvenliklerini genellikle başarıda, statüde ve maddi sağlamlıkta bulurlar. Küçük yaşlardan itibaren bir yetişkin olgunluğuyla hareket edebilirler. İç dünyalarında kendilerine karşı oldukça sert ve eleştirel olabilirler; hata yapmaktan korkarlar. Ancak bir kez güvendiklerinde, ömür boyu sürecek sarsılmaz bir sadakat ve destek sunarlar. Duygularını göstermek yerine, sevdikleri için somut bir şeyler yaparak sevgilerini kanıtlarlar.",
        "Kova": "Ay'ı Kova burcunda olan bireyler, duygusal dünyalarında bağımsızlık ve özgünlük ararlar. Geleneksel duygusal kalıplara sığmakta zorlanabilirler; hislerini bile daha çok rasyonel ve entelektüel bir perspektiften değerlendirirler. Toplumsal olaylara, insan haklarına ve geleceğe dair vizyonlara karşı büyük bir duyarlılıkları vardır. Arkadaşlık onlar için aşktan bile daha önemli olabilir; herkesle bir mesafe koyarak ama herkesi severek yaşarlar. Sıradışı olanı severler ve kendilerini bir gruba ait hissetmekten ziyade, insanlığın bir parçası olarak görmeyi tercih ederler.",
        "Balık": "Zodyak'ın en hassas, en merhametli ve en hayalperest ruhları Ay Balık kişileridir. Duygusal dünyaları sınır tanımaz, adeta çevrelerindeki tüm enerjiyi bir sünger gibi emerler. Bu yüzden sık sık yalnız kalıp ruhlarını arındırma ihtiyacı duyarlar. Empati yetenekleri o kadar gelişmiştir ki başkalarının acısını kendi acıları gibi hissederler. Sanatsal ve yaratıcı yönleri çok güçlüdür; hayal güçleri onları gerçek dünyanın sertliğinden koruyan bir sığınaktır. Sezgilerine güvenerek hareket ederler ve çoğu zaman mantığın ötesindeki gerçekleri görebilirler."
    };

    document.getElementById('hc-ayburc-value').innerText = burc;
    document.getElementById('hc-ayburc-desc').innerText = yorumlar[burc];
    document.getElementById('hc-ay-burcu-result').classList.add('visible');
}
