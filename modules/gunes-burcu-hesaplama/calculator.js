function hcGunesBurcuHesapla() {
    const birthdate = document.getElementById('hc-gb-birthdate').value;
    const birthtime = document.getElementById('hc-gb-time').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const parts = birthdate.split('-').map(Number);
    const timeParts = (birthtime || '12:00').split(':').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = timeParts[0] + (timeParts[1] || 0) / 60;

    let tzOffset = 3;
    if (Y < 2016 || (Y === 2016 && M < 9)) {
        if (M > 3 && M < 10) tzOffset = 3;
        else if (M === 3 && D >= 25) tzOffset = 3;
        else if (M === 10 && D < 25) tzOffset = 3;
        else tzOffset = 2;
    }

    let ut = hour - tzOffset;
    let yCalc = Y, mCalc = M;
    if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
    const A = Math.floor(yCalc / 100);
    const B = 2 - A + Math.floor(A / 4);
    const JD = Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (ut / 24);

    const d = JD - 2451543.5;
    const T = d / 36525;
    const rad = Math.PI / 180;

    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    const M_sun = norm(357.5291 + 0.98560028 * d);
    const C_sun = (1.914602 - 0.004817 * T) * Math.sin(M_sun * rad) + (0.019993 - 0.000101 * T) * Math.sin(2 * M_sun * rad);
    const L0_sun = norm(280.46646 + 36000.76983 * T);
    const sunLon = norm(L0_sun + C_sun);

    const burclar = [
        { name: "Koç", element: "Ateş", modality: "Öncü", ruler: "Mars", symbol: "♈" },
        { name: "Boğa", element: "Toprak", modality: "Sabit", ruler: "Venüs", symbol: "♉" },
        { name: "İkizler", element: "Hava", modality: "Değişken", ruler: "Merkür", symbol: "♊" },
        { name: "Yengeç", element: "Su", modality: "Öncü", ruler: "Ay", symbol: "♋" },
        { name: "Aslan", element: "Ateş", modality: "Sabit", ruler: "Güneş", symbol: "♌" },
        { name: "Başak", element: "Toprak", modality: "Değişken", ruler: "Merkür", symbol: "♍" },
        { name: "Terazi", element: "Hava", modality: "Öncü", ruler: "Venüs", symbol: "♎" },
        { name: "Akrep", element: "Su", modality: "Sabit", ruler: "Mars / Plüton", symbol: "♏" },
        { name: "Yay", element: "Ateş", modality: "Değişken", ruler: "Jüpiter", symbol: "♐" },
        { name: "Oğlak", element: "Toprak", modality: "Öncü", ruler: "Satürn", symbol: "♑" },
        { name: "Kova", element: "Hava", modality: "Sabit", ruler: "Satürn / Uranüs", symbol: "♒" },
        { name: "Balık", element: "Su", modality: "Değişken", ruler: "Jüpiter / Neptün", symbol: "♓" }
    ];

    const signIdx = Math.floor(sunLon / 30) % 12;
    const signObj = burclar[signIdx];
    const degInSign = Math.floor(sunLon % 30);
    const minInSign = Math.floor((sunLon % 1) * 60);

    // Dekanat (Decan) hesabı (1. Dekan: 0-10°, 2. Dekan: 10-20°, 3. Dekan: 20-30°)
    let decanText = "";
    if (degInSign < 10) decanText = "1. Dekanat (Saf Burç Enerjisi)";
    else if (degInSign < 20) decanText = "2. Dekanat (İkincil Alt Yönetici)";
    else decanText = "3. Dekanat (Üçüncül Alt Yönetici)";

    const gunesYorumlari = {
        "Koç": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Koç burcundayken (Yücelim konumu), ruhunuz dünyada bir öncü, savaşçı ve başlatıcı güç olarak var olur. Hayata cesaretle atılır, engeller karşısında geri çekilmek yerine doğrudan meydan okursunuz.</p>
            <p><strong>Yaşam Misyonunuz:</strong> İnsanlara cesaret aşılamak, yeni yollar açmak ve korkunun ötesine geçerek ilk adımı atan kişi olmak.</p>
            <p><strong>Süper Gücünüz:</strong> Durdurulamaz inisiyatif alma kabiliyeti, dürüstlük, yüksek enerji ve liderlik ruhu.</p>
            <p><strong>Gelişim Alanı:</strong> Sabır geliştirmek, başladığı projeleri uzun vadede sürdürebilmek ve başkalarının sınırlarına saygı duymak.</p>
        `,
        "Boğa": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Boğa burcundayken, ruhunuz yeryüzünde kalıcı yapılar, somut değerler ve estetik güzellikler inşa etme arzusuyla parlar. Sarsılmaz bir sabrınız ve pratik bir zekanız vardır.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Maddi ve manevi dünyada güven, bereket, huzur ve estetik bir temel oluşturmak.</p>
            <p><strong>Süper Gücünüz:</strong> Güvenilirlik, kaynak yönetimi, eşsiz dayanıklılık ve doğayla uyumlu üretim gücü.</p>
            <p><strong>Gelişim Alanı:</strong> Değişime direnmemek, konfor alanından çıkabilmek ve aşırı inatçılığı esnetebilmek.</p>
        `,
        "İkizler": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş İkizler burcundayken, zihniniz bilgiyi toplayan, sentezleyen ve dünyaya yayan bir iletişim merkezi olarak çalışır. Merakınız ve esnekliğiniz en büyük itici gücünüzdür.</p>
            <p><strong>Yaşam Misyonunuz:</strong> İnsanlar ve fikirler arasında köprü kurmak, karmaşık kavramları herkesin anlayacağı dile çevirmek ve dünyayı bilgilendirmek.</p>
            <p><strong>Süper Gücünüz:</strong> Kıvrak zeka, ikna kabiliyeti, çok yönlülük ve her ortama anında uyum sağlama yeteneği.</p>
            <p><strong>Gelişim Alanı:</strong> Tek bir hedefe odaklanabilmek, zihinsel yorgunluğu önlemek ve duygusal derinlikten kaçmamak.</p>
        `,
        "Yengeç": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Yengeç burcundayken, varlığınız şefkat, aidiyet, koruyuculuk ve derin duygusal hafıza ile aydınlanır. Sevdikleriniz için güvenli bir sığınak yaratırsınız.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Koşulsuz sevgiyi yaşatmak, insan kalbini beslemek, geçmişin köklerini geleceğe taşımak.</p>
            <p><strong>Süper Gücünüz:</strong> Olağanüstü sezgisel öngörü, empati yeteneği, koruyucu liderlik ve güçlü duygusal zeka.</p>
            <p><strong>Gelişim Alanı:</strong> Alınganlıkları geride bırakmak, geçmişe takılmamak ve duygusal sınırlarını korumayı öğrenmek.</p>
        `,
        "Aslan": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı (Güneş Kendi Evinde):</strong> Güneş Aslan burcunda kendi tahtındadır. Doğal bir karizma, asalet, yaratıcılık ve sahne ışıltısı yayarsınız. Kalbinizle yönetir, cömertliğinizle büyülersiniz.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Işığınızla insanlara ilham vermek, sanatsal yaratıcılığı sergilemek ve cesurca kalbinin sesini takip etmek.</p>
            <p><strong>Süper Gücünüz:</strong> Manyetik karizma, yüksek özgüven, cömert liderlik ve sahneye hakim olma ustalığı.</p>
            <p><strong>Gelişim Alanı:</strong> Gurur ve kibirden uzak durmak, başkalarının da parlamasına alan açmak ve tevazuyu elden bırakmamak.</p>
        `,
        "Başak": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Başak burcundayken, ruhunuz kaosu düzene koyma, faydalı olma ve mükemmellik üretme arzusuyla doludur. Detaylardaki ustalığınız rakipsizdir.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Sistemleri kusursuzlaştırmak, insanlığa somut hizmet sunmak ve yaşamı pratik çözümlerle iyileştirmek.</p>
            <p><strong>Süper Gücünüz:</strong> Analitik zeka, detay ustalığı, çalışkanlık, sağlık bilinci ve krizleri adım adım çözme becerisi.</p>
            <p><strong>Gelişim Alanı:</strong> Kendini ve başkalarını aşırı eleştirmemek, büyük resmi kaçırmamak ve akışa teslim olmayı öğrenmek.</p>
        `,
        "Terazi": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Terazi burcundayken, varlığınız adalet, diplomasi, estetik zarafet ve uyum arayışıyla şekillenir. Karşıtlıkları uzlaştıran bir barış elçisisinizdir.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Dünyaya denge, estetik güzellik, adil yargı ve karşılıklı saygıya dayalı ilişkiler getirmek.</p>
            <p><strong>Süper Gücünüz:</strong> Üstün diplomasi, müzakere zekası, görsel/estetik vizyon ve sosyal zarafet.</p>
            <p><strong>Gelişim Alanı:</strong> Kararsızlığı yenmek, çatışmadan korkup kendi gerçeğini saklamamak ve net duruş sergilemek.</p>
        `,
        "Akrep": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Akrep burcundayken, ruhunuz dönüşümün, gizemin, sarsılmaz iradenin ve psikolojik derinliğin taşıyıcısıdır. Krizlerden güçlenerek çıkarsınız.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Maskelerin ardındaki hakikati ortaya çıkarmak, tabuları dönüştürmek ve ruhsal olarak küllerinden yeniden doğmak.</p>
            <p><strong>Süper Gücünüz:</strong> Sarsılmaz irade, manyetik çekim gücü, kriz yönetimi dehası ve derin psikolojik kavrayış.</p>
            <p><strong>Gelişim Alanı:</strong> Aşırı şüphe ve kontrol arzusunu bırakmak, affetmenin özgürleştirici gücünü keşfetmek.</p>
        `,
        "Yay": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Yay burcundayken, varlığınız sınır tanımayan bir özgürlük aşkı, yüksek hayat felsefesi ve sınırsız iyimserlikle parlar. Bir kaşif ve bilgesinizdir.</p>
            <p><strong>Yaşam Misyonunuz:</strong> İnsanların vizyonunu genişletmek, hakikati aramak ve farklı kültürler arasında köprü kurmak.</p>
            <p><strong>Süper Gücünüz:</strong> Geniş vizyon, ilham verici rehberlik, yüksek şans aurası ve dürüstlük.</p>
            <p><strong>Gelişim Alanı:</strong> Detayları küçümsememek, patavatsızlıktan kaçınmak ve sorumlulukları ertelememek.</p>
        `,
        "Oğlak": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Oğlak burcundayken, karakteriniz granit gibi sağlam bir disiplin, stratejik sabır ve zirveye tırmanma kararlılığı ile donatılmıştır.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Zamanın sınavına dayanan kalıcı başarılar elde etmek, toplumsal yapıları yönetmek ve sorumluluk bilinci aşılamak.</p>
            <p><strong>Süper Gücünüz:</strong> Çelik gibi irade, stratejik zeka, kurumsal liderlik ve uzun vadeli hedeflere ulaşma ustalığı.</p>
            <p><strong>Gelişim Alanı:</strong> Aşırı katılık ve işkolikliği törpülemek, duygusal sıcaklığa ve neşeye hayatında yer açmak.</p>
        `,
        "Kova": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Kova burcundayken, ruhunuz geleceği tasarlayan, devrimci, özgürlükçü ve sıradışı bir vizyonla aydınlanır. Çağının ötesinde yaşarsınız.</p>
            <p><strong>Yaşam Misyonunuz:</strong> İnsanlığı dogmalardan özgürleştirmek, yenilikçi fikirleri hayata geçirmek ve kolektif bilinci yükseltmek.</p>
            <p><strong>Süper Gücünüz:</strong> Orijinal zeka, teknolojik ve toplumsal vizyonerlik, hümanizm ve bağımsız duruş.</p>
            <p><strong>Gelişim Alanı:</strong> Aşırı duygusal mesafelilikten kaçınmak ve bireysel insan ilişkilerinde kalpten bağ kurabilmek.</p>
        `,
        "Balık": `
            <p><strong>Öz Kimlik ve Yaşam Kıvılcımı:</strong> Güneş Balık burcundayken, varlığınız evrensel empati, sınırsız hayal gücü ve mistik sezgilerle doludur. Madde ile mana arasındaki köprüsünüzdür.</p>
            <p><strong>Yaşam Misyonunuz:</strong> Dünyaya koşulsuz sevgiyi, sanatsal ilhamı ve ruhsal şifayı hatırlatmak.</p>
            <p><strong>Süper Gücünüz:</strong> Psişik sezgiler, sanatsal yaratıcılık, evrensel şefkat ve ilham verici bilgelik.</p>
            <p><strong>Gelişim Alanı:</strong> Sağlıklı sınırlar çizmek, gerçeklerden kaçmamak (eskapizm) ve dünyevi hayatın pratik gereklerini aksatmamak.</p>
        `
    };

    document.getElementById('hc-gb-deg-badge').innerText = `☀️ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-gb-decan-badge').innerText = decanText;
    document.getElementById('hc-gb-sign-name').innerText = `${signObj.symbol} Güneş Burcunuz: ${signObj.name}`;
    document.getElementById('hc-gb-sign-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik • Yönetici: ${signObj.ruler}`;
    document.getElementById('hc-gb-sign-desc').innerHTML = gunesYorumlari[signObj.name];

    document.getElementById('hc-gb-result').classList.add('visible');
    document.getElementById('hc-gb-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

