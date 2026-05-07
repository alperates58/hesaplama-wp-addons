function hcMarsBurcuHesapla() {
    const tarihStr = document.getElementById('hc-mars-tarih').value;
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
    const mars = { N: 49.5574 + 0.000021108 * d, i: 1.8497 - 0.0000000178 * d, w: 336.0408 + 0.00001228 * d, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 };

    const pE = getHeliocentric(earth, d);
    const pM = getHeliocentric(mars, d);

    const xG = pM.x - pE.x;
    const yG = pM.y - pE.y;
    const lonG = norm(Math.atan2(yG, xG) / rad);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const burc = burclar[Math.floor(lonG / 30)];

    const yorumlar = {
        "Koç": "Mars'ın kendi yöneticisi olduğu Koç burcunda olması, saf ve durdurulamaz bir enerji patlamasını temsil eder. Bu kişiler son derece cesur, doğrudan ve harekete geçmekte bir an bile tereddüt etmeyen bireylerdir. Rekabetçi ruhları çok gelişmiştir ve her zaman birinci olmayı hedeflerler. Öfkeleri saman alevi gibidir; hızla parlar ve aynı hızla söner. Sabırsızlık en büyük zorlukları olsa da, öncü nitelikleri sayesinde başkalarının cesaret edemediği işlere gözü kapalı atılabilirler. Hayata karşı tam bir savaşçı ruhuyla yaklaşırlar.",
        "Boğa": "Mars'ı Boğa burcunda olanlar için enerji daha yavaş, istikrarlı ve dayanıklı bir şekilde akar. Bir hedefe odaklandıklarında ne kadar zaman alırsa alsın ondan vazgeçmezler; tam bir 'maraton koşucusu' gibidirler. Fiziksel güçleri ve dayanıklılıkları çok yüksektir. Öfkelenmeleri zordur ancak bir kez o noktaya ulaştıklarında yıkıcı olabilirler. Maddi güvenliklerini sağlamak ve somut sonuçlar elde etmek en büyük motivasyon kaynaklarıdır. İnandıkları yolda sarsılmaz bir inatçılıkla ilerlerler ve değişimden pek hoşlanmazlar.",
        "İkizler": "Mars İkizler kişileri için enerji zihinsel bir alana kaymıştır; onlar kelimeleriyle savaşırlar. Son derece hızlı düşünen, esprili ve tartışmacı bir yapıları olabilir. Aynı anda birden fazla işle uğraşmak onlara enerji verir; tek bir şeye odaklanmak ise sıkıcı gelir. Ellerini ve zekalarını kullanma yetenekleri çok gelişmiştir. Öfkelerini genellikle laf sokarak veya eleştirerek ifade ederler. Merakları onları sürekli yeni projelere iter ancak başladıkları işleri bitirmekte zorlanabilirler. Hareketli ve değişken bir yaşam tarzı ruhlarını besler.",
        "Yengeç": "Mars'ı Yengeç burcunda olan bireylerde enerji duygularla ve koruma içgüdüsüyle yönetilir. Doğrudan bir saldırı yerine, daha dolaylı ve stratejik bir yaklaşım sergileyebilirler. Sevdiklerini ve yuvalarını korumak için inanılmaz bir güç sergilerler. Motivasyonları tamamen duygusal güvenliğe dayalıdır; kendilerini tehdit altında hissettiklerinde savunmacı bir kabuğa çekilebilirler. Öfkelerini içe atma eğilimleri olabilir, bu da zaman zaman pasif-agresif davranışlara yol açabilir. Ancak inandıkları değerler için sessiz ama çok derin bir kararlılıkla mücadele ederler.",
        "Aslan": "Mars Aslan kişileri için enerji büyük bir yaratıcılık, gurur ve dramatik bir güçle ifade edilir. Girdikleri her ortamda liderliklerini sergilemek ve parlamak isterler. Motivasyonları takdir edilmek ve alkışlanmaktır. Oldukça cömert, asil ve korumacı bir savaşçı ruhları vardır. Bir işe başladıklarında onu büyük bir şevk ve özgüvenle yaparlar. Öfkeleri genellikle gururlarının incinmesiyle tetiklenir ve bu anlarda oldukça görkemli bir şekilde tepki verebilirler. Kalpleriyle hareket ederler ve inandıkları davalarda sonuna kadar savaşırlar.",
        "Başak": "Mars'ı Başak burcunda olanlar için enerji titiz bir çalışma, hizmet ve teknik beceriye odaklanmıştır. Onlar mükemmeliyetçiliğin ve detayların savaşçılarıdır. Enerjilerini verimli kullanmakta ustadırlar ve dağınıklıktan, plansızlıktan nefret ederler. Motivasyonları işe yarar olmak ve hataları düzeltmektir. Öfkelerini genellikle eleştiri yaparak veya işleri daha fazla kontrol altına almaya çalışarak gösterirler. Oldukça çalışkan ve disiplinli bireylerdir; en zorlu teknik detayları bile büyük bir sabırla çözerler. Pratiklikleri en büyük silahlarıdır.",
        "Terazi": "Mars Terazi kişileri için enerji dengeyi kurmak, adalet aramak ve ilişkileri yönetmek üzerinedir. Doğrudan çatışmadan hoşlanmazlar ve her zaman diplomatik çözümler üretmeye çalışırlar. Motivasyonları uyumu yakalamaktır. Bir karar vermeden önce tüm tarafları dinlemek istedikleri için kararsızlık yaşayabilirler, bu da harekete geçmelerini geciktirebilir. Ancak haksızlık gördüklerinde zarif ama çok kararlı bir şekilde karşı çıkarlar. Estetik ve etik değerler için mücadele ederler. İş birliği içinde çalışmak onlara bireysel hareket etmekten daha fazla enerji verir.",
        "Akrep": "Mars'ın klasik yöneticisi olduğu Akrep burcunda olması, enerjinin en derin, en odaklanmış ve en sarsılmaz halini temsil eder. Bu kişiler sessiz ama inanılmaz derecede güçlü bir kararlılığa sahiptirler. Stratejik düşünme yetenekleri sayesinde hedeflerine ulaşmak için en doğru zamanı beklerler. Motivasyonları kontrol sahibi olmak ve gizemleri çözmektir. Öfkeleri derindedir ve kolay unutmazlar; bir saldırı karşısında çok etkili ve dönüştürücü bir şekilde cevap verebilirler. Dayanıklılıkları ve küllerinden yeniden doğma güçleri onları yenilmez kılar.",
        "Yay": "Mars'ı Yay burcunda olan bireyler için enerji özgürlük, keşif ve idealler peşinde koşmaktır. Maceracı bir ruhları vardır ve kısıtlanmaya gelemezler. Motivasyonları gerçeği bulmak ve ufuklarını genişletmektir. Doğrudan, dürüst ve bazen patavatsız bir şekilde tepki verebilirler. İnandıkları felsefeler veya etik değerler için büyük bir ateşle savaşırlar. İyimserlikleri en büyük güçleridir; en zor durumlarda bile bir çıkış yolu bulacaklarına inanırlar. Fiziksel olarak çok hareketli olabilirler ve hayatı bir oyun alanı gibi görürler.",
        "Oğlak": "Mars'ın yüceldiği Oğlak burcunda olması, enerjinin en kontrollü, en disiplinli ve en başarılı halini temsil eder. Onlar 'dağın zirvesine' tırmanan sabırlı tırmanıcılardır. Duygularıyla değil, mantıklarıyla ve stratejileriyle hareket ederler. Motivasyonları statü kazanmak ve kalıcı eserler bırakmaktır. Oldukça dayanıklı, çalışkan ve sorumluluk sahibi bireylerdir. Öfkelerini bile kontrol altında tutarlar ve bunu bir enerjiye dönüştürerek işlerine odaklanırlar. Otoriteye saygı duyarlar ancak kendi otoritelerini kurmak için de durmaksızın çalışırlar.",
        "Kova": "Mars Kova kişileri için enerji bağımsızlık, yenilik ve toplumsal değişim üzerine kuruludur. Geleneksel yöntemlerle savaşmak yerine, zekalarıyla ve teknolojiyle fark yaratırlar. Motivasyonları bireysel özgürlükleri savunmak ve geleceği inşa etmektir. Beklenmedik ve aykırı tepkiler verebilirler; bir gruba ait olsalar bile her zaman kendi özgünlüklerini korurlar. Haksızlıklara ve baskıya karşı çok güçlü bir direnç gösterirler. Zihinsel olarak çok aktif ve devrimci bir ruhları vardır. İş birliği yaparken bile her zaman bir mesafe bırakmayı tercih ederler.",
        "Balık": "Mars'ı Balık burcunda olan bireylerde enerji daha akışkan, sezgisel ve çoğu zaman manevi bir alana kaymıştır. Doğrudan mücadele yerine, olaylara uyum sağlamayı veya geri çekilmeyi tercih edebilirler. Motivasyonları şifa vermek, yardım etmek ve ilham almaktır. Öfkelerini ifade etmekte zorlanabilirler, bu da onların melankolik veya kurban psikolojisine girmelerine neden olabilir. Ancak yaratıcılık ve sanat söz konusu olduğunda inanılmaz bir enerji sergilerler. Sessiz bir güçleri vardır; sezgileriyle insanların niyetlerini anlar ve en karmaşık durumlardan bile sessizce sıyrılabilirler."
    };

    document.getElementById('hc-mars-value').innerText = burc;
    document.getElementById('hc-mars-desc').innerText = yorumlar[burc];
    document.getElementById('hc-mars-burcu-result').classList.add('visible');
}
