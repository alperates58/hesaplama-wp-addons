function hcAyBurcuSaatDegisti(checkbox) {
    const saatInput = document.getElementById('hc-ayburc-saat');
    if (checkbox.checked) {
        saatInput.value = '12:00';
        saatInput.disabled = true;
    } else {
        saatInput.disabled = false;
    }
}

function hcAyBurcuHesapla() {
    const tarihStr = document.getElementById('hc-ayburc-tarih').value;
    const saatStr = document.getElementById('hc-ayburc-saat').value;
    const sehirVal = document.getElementById('hc-ayburc-sehir').value;

    if (!tarihStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const coords = sehirVal.split(',').map(Number);
    const lng = coords[0];
    const lat = coords[1];

    const parts = tarihStr.split('-').map(Number);
    const timeParts = (saatStr || '12:00').split(':').map(Number);
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

    // Güneş Boylamı (Ay Fazı İçin)
    const M_sun = norm(357.5291 + 0.98560028 * d);
    const C_sun = (1.914602 - 0.004817 * T) * Math.sin(M_sun * rad) + (0.019993 - 0.000101 * T) * Math.sin(2 * M_sun * rad);
    const L0_sun = norm(280.46646 + 36000.76983 * T);
    const sunLon = norm(L0_sun + C_sun);

    // Ay Boylamı (Meeus Pertürbasyonları)
    const L_moon = norm(218.3164477 + 481267.88128 * T);
    const D_moon = norm(297.8501921 + 445267.11140 * T);
    const Ms_moon = norm(357.5291092 + 35999.05029 * T);
    const Mm_moon = norm(134.9633964 + 477198.86750 * T);
    const F_moon = norm(93.2720950 + 483202.01752 * T);

    const dl_moon = 6.288774 * Math.sin(Mm_moon * rad) +
                    1.274027 * Math.sin((2 * D_moon - Mm_moon) * rad) +
                    0.658314 * Math.sin(2 * D_moon * rad) +
                    0.213618 * Math.sin(2 * Mm_moon * rad) -
                    0.185116 * Math.sin(Ms_moon * rad) -
                    0.114332 * Math.sin(2 * F_moon * rad) +
                    0.058793 * Math.sin((2 * D_moon - 2 * Mm_moon) * rad) +
                    0.057066 * Math.sin((2 * D_moon - Ms_moon - Mm_moon) * rad) +
                    0.053322 * Math.sin((2 * D_moon + Mm_moon) * rad) +
                    0.046058 * Math.sin((2 * D_moon - Ms_moon) * rad);
    const moonLon = norm(L_moon + dl_moon);

    // Burç Tespiti
    const burclar = [
        { name: "Koç", element: "Ateş", modality: "Öncü", symbol: "♈" },
        { name: "Boğa", element: "Toprak", modality: "Sabit", symbol: "♉" },
        { name: "İkizler", element: "Hava", modality: "Değişken", symbol: "♊" },
        { name: "Yengeç", element: "Su", modality: "Öncü", symbol: "♋" },
        { name: "Aslan", element: "Ateş", modality: "Sabit", symbol: "♌" },
        { name: "Başak", element: "Toprak", modality: "Değişken", symbol: "♍" },
        { name: "Terazi", element: "Hava", modality: "Öncü", symbol: "♎" },
        { name: "Akrep", element: "Su", modality: "Sabit", symbol: "♏" },
        { name: "Yay", element: "Ateş", modality: "Değişken", symbol: "♐" },
        { name: "Oğlak", element: "Toprak", modality: "Öncü", symbol: "♑" },
        { name: "Kova", element: "Hava", modality: "Sabit", symbol: "♒" },
        { name: "Balık", element: "Su", modality: "Değişken", symbol: "♓" }
    ];

    const signIdx = Math.floor(moonLon / 30) % 12;
    const signObj = burclar[signIdx];
    const degInSign = Math.floor(moonLon % 30);
    const minInSign = Math.floor((moonLon % 1) * 60);

    // Ay Fazı Tespiti (Ay ile Güneş arasındaki açı)
    const phaseAngle = norm(moonLon - sunLon);
    let phaseName = "";
    let phaseIcon = "";
    let phaseDesc = "";

    if (phaseAngle >= 337.5 || phaseAngle < 22.5) {
        phaseName = "Yeniay Fazı";
        phaseIcon = "🌑";
        phaseDesc = "Yeniay fazında doğanlar; içgüdüsel, taze ve öncü bir enerji taşırlar. Geçmişin yüklerinden arınmış, hayata sıfırdan başlama cesaretine sahip doğal bir kaşiftirler.";
    } else if (phaseAngle >= 22.5 && phaseAngle < 67.5) {
        phaseName = "Hilal (Büyüyen Ay) Fazı";
        phaseIcon = "🌒";
        phaseDesc = "Hilal fazında doğanlar; hedeflerine doğru kararlılıkla ilerleyen, engeller karşısında geri adım atmayan ve geleceğe inançla bakan azimli bir yapıya sahiptir.";
    } else if (phaseAngle >= 67.5 && phaseAngle < 112.5) {
        phaseName = "İlk Dördün Fazı";
        phaseIcon = "🌓";
        phaseDesc = "İlk Dördün fazında doğanlar; krizleri eyleme ve zafere dönüştürme ustasıdır. İçsel bir mücadele ve başarı açlığı taşır, meydan okumalardan beslenirler.";
    } else if (phaseAngle >= 112.5 && phaseAngle < 157.5) {
        phaseName = "Büyüyen Şişkin Ay Fazı";
        phaseIcon = "🌔";
        phaseDesc = "Büyüyen Ay fazında doğanlar; mükemmeliyetçi, analizci ve kendini sürekli geliştiren bir ruha sahiptir. Bilgiyi derinleştirme ve ustalaşma arzusu çok yüksektir.";
    } else if (phaseAngle >= 157.5 && phaseAngle < 202.5) {
        phaseName = "Dolunay Fazı";
        phaseIcon = "🌕";
        phaseDesc = "Dolunay fazında doğanlar; yüksek bir farkındalık, manyetik çekim gücü ve yoğun sezgiler taşır. Mantık ile kalp arasındaki dengeyi kurduklarında olağanüstü bir bilgelik sergilerler.";
    } else if (phaseAngle >= 202.5 && phaseAngle < 247.5) {
        phaseName = "Küçülen Şişkin Ay (Yayılma) Fazı";
        phaseIcon = "🌖";
        phaseDesc = "Yayılma fazında doğanlar; edindikleri hayat bilgeliğini topluma aktaran doğal öğretmenler, mentorlar ve ilham verici rehberlerdir.";
    } else if (phaseAngle >= 247.5 && phaseAngle < 292.5) {
        phaseName = "Son Dördün Fazı";
        phaseIcon = "🌗";
        phaseDesc = "Son Dördün fazında doğanlar; eskiyen yapıları yıkıp yeniyi inşa eden, tabuları sorgulayan ve derin bir dönüşüm vizyonu taşıyan devrimci ruhlardır.";
    } else {
        phaseName = "Balzamik (Karanlık Ay) Fazı";
        phaseIcon = "🌘";
        phaseDesc = "Balzamik fazında doğanlar; yaşlı bir ruh bilgeliği, derin psişik sezgiler ve kadersel döngüleri sonlandırıp şifalandırma misyonu taşırlar.";
    }

    // 12 Burç İçin Derin Psikolojik Yorum Kütüphanesi
    const ayYorumlari = {
        "Koç": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Koç burcundayken, duygusal güvenlik bağımsızlık ve eylem özgürlüğü ile sağlanır. Duygularınızı asla erteleyemezsiniz; hissettiğiniz an eyleme geçme ihtiyacı duyarsınız. Kısıtlanmak veya bekletilmek sizde yoğun bir huzursuzluk yaratır.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Sevginizi açık, doğrudan ve tutkulu gösterirsiniz. Partnerinizden de aynı samimiyeti ve heyecanı beklersiniz. Pasif-agresif tavırlardan nefret edersiniz.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Genellikle güçlü, mücadeleci veya kural koyucu bir anne figürü algılanır. Çocuklukta erken yaşta kendi ayakları üzerinde durmayı öğrenmiş olabilirsiniz.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Fevri öfke patlamaları ve sabırsızlık. Şifa yolu, duygusal bir dalga geldiğinde anında tepki vermek yerine nefes alarak durmayı ve sakinleşmeyi pratik etmektir.</p>
        `,
        "Boğa": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar (Ay Yücelimde):</strong> Ay Boğa burcunda en huzurlu ve bereketli konumundadır (Yücelim). Duygusal huzurunuz maddi güvenlik, sakin rutinler ve konforlu bir ev ortamına bağlıdır. Sarsılmaz bir içsel dinginliğiniz vardır.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Dokunma, sarılma, lezzetli yemekler paylaşma ve somut sadakat sizin sevgi dilinizdir. Güvenmediğiniz hiçbir ilişkiye adım atmazsınız.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Besleyen, koruyan, huzur ve fiziksel konfor sağlayan güvenilir bir anne arketipi öne çıkar.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Aşırı inatçılık, değişime direnç ve konfor alanına saplanma. Şifa yolu, hayatın akışındaki dönüşümlere güvenle teslim olmayı öğrenmektir.</p>
        `,
        "İkizler": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay İkizler'de duyguları mantıkla analiz etme ve konuşarak rahatlama ihtiyacı doğurur. Bir duygu hissettiğinizde onu entelektüel olarak anlamlandırmak ve paylaşmak istersiniz. Monotonluk ve iletişimsizlik sizi duygusal olarak tüketir.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Zihinsel paylaşımlar, derin sohbetler, birlikte öğrenmek ve mizah duygusu sizin en büyük yakınlaşma kanalınızdır.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Konuşkan, meraklı, bilgi dolu veya aynı anda birçok işle meşgul olan bir anne figürü.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Duyguları rasyonelleştirip kalpten hissetmekten kaçma, zihinsel kaygı. Şifa yolu, kelimeleri bir kenara bırakıp sadece bedendeki hislere odaklanmaktır.</p>
        `,
        "Yengeç": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar (Ay Kendi Yöneticisinde):</strong> Ay'ın en güçlü olduğu yerdir. Sonsuz bir empati, sezgisel algı ve ait olma arzusu verir. Sevdiklerinizi sarmalayıp korumak ruhunuzun gıdasıdır.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Şefkat, koruyuculuk, duygusal derinlik ve koşulsuz sadakat. Güven duyduğunuzda yuvanızı adeta bir sığınak haline getirirsiniz.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Çok derin, telepatik ve besleyici ama bazen aşırı korumacı bir anne-çocuk bağı.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Geçmişe takılı kalma, alınganlık ve kabuğuna çekilerek küsme. Şifa yolu, duygusal dalgalanmaları kişiselleştirmeden geçmesine izin vermektir.</p>
        `,
        "Aslan": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Aslan burcunda kalpten gelen sıcak bir cömertlik, takdir edilme ve sevilme arzusu yaratır. İçinizde asla büyümeyen neşeli bir çocuk yaşar; onaylandığınızda parıldarsınız.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Büyük jestler, cömertlik, sadakat ve gurur duyulacak bir ilişki yaşamak. Partnerinizi kral/kraliçe gibi hissettirirsiniz.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Karizmatik, gururlu, sahne ışığına sahip veya otoriter bir anne imajı.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> İhmal edildiğini hissettiğinde aşırı gurur ve dramatik tepkiler. Şifa yolu, değerinizi dış onaydan değil kendi kalbinizin öz sevgisinden almaktır.</p>
        `,
        "Başak": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Başak burcunda faydalı olma, düzen kurma ve hayatı optimize etme arzusu ile beslenir. Kaos ve belirsizlik sizde kaygı yaratır; her şeyin bir sistemi olduğunda güvende hissedersiniz.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Hizmet etme, partnerin hayatını kolaylaştırma, sağlıklı besleme ve pratik destek sunma.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Çalışkan, titiz, eleştirel ama bir o kadar fedakar ve düzen sağlayıcı bir anne figürü.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Kendi duygularını ve çevresindekileri aşırı eleştirme, evham. Şifa yolu, hayatın kusurlu güzelliğini kucaklamayı öğrenmektir.</p>
        `,
        "Terazi": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Terazi burcunda barış, denge, zarafet ve bir ortakla paylaşma ihtiyacı yaratır. Çatışma ve kabalık ruhsal dengenizi bozar; huzurlu ve estetik ortamlarda çiçek açarsınız.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Nezaket, romantik jestler, eşitlik ve karşılıklı saygıya dayalı bir ortaklık kurmak.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Şık, sosyal, barışçıl veya ilişkilerine çok önem veren bir anne profili.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> 'Hayır' diyememe, onay bağımlılığı ve kendi hislerini bastırma. Şifa yolu, huzuru kaybetme pahasına kendi sınırlarını net koyabilmektir.</p>
        `,
        "Akrep": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Akrep'te en derin ve dönüştürücü sulardadır. Yüzeysellikten nefret edersiniz; ya hep ya hiç felsefesiyle seversiniz. Duygusal krizleri küllerinden yeniden doğmak için kullanırsınız.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Mutlak sadakat, ruhsal birleşme, sırlar ve sarsılmaz bir bağlılık. Güven kazanan birine ömrünüzü adarsınız.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Güçlü, gizemli, bazen kontrolcü ama çocuğu için dünyayı yakabilecek güçte bir anne bağı.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Şüphecilik, kıskançlık ve incinme korkusuyla duvar örme. Şifa yolu, affetmenin ve teslimiyetin en büyük güç olduğunu hatırlamaktır.</p>
        `,
        "Yay": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Yay burcunda özgürlük, keşif ve yüksek bir hayat felsefesi ile beslenir. Duygusal olarak dar kalıplara hapsedilmeye tahammül edemezsiniz; iyimserliğiniz en büyük kalkanınızdır.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Birlikte seyahat etmek, yeni dünyalar keşfetmek, dürüstlük ve birbirinin bireysel alanına saygı duymak.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Özgür ruhlu, vizyoner, seyahat eden veya felsefi/öğretici bir anne figürü.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Duygusal derinlikten kaçıp sürekli bir sonraki maceraya koşma. Şifa yolu, anın içinde kalarak derinleşmeyi seçmektir.</p>
        `,
        "Oğlak": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Oğlak'ta sorumluluk, olgunluk ve dayanıklılık ile güvende hisseder. Duygularını göstermekte temkinlidir; zamanla güçlenen, sarsılmaz bir vefa duygusuna sahiptir.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Somut adımlar, güvenilirlik, partnerini geleceğe taşımak ve uzun vadeli kalıcı taahhütler vermek.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Disiplinli, çalışan, bazen mesafeli ama her zaman güven veren güçlü bir anne modeli.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Duyguları bastırma, yetersizlik hissi ve aşırı ciddiyet. Şifa yolu, kalbini açıp savunmasız kalabilmenin cesaretini göstermektir.</p>
        `,
        "Kova": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Kova'da bağımsızlık, özgünlük ve entelektüel özgürlük ile nefes alır. Geleneksel duygusal baskılara boyun eğmez; arkadaşça, eşit ve insancıl bağlar kurar.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Önce en iyi arkadaş olmak, zihinsel vizyon birliği ve bireysel özgünlüklere sonsuz saygı.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Sıradışı, entelektüel, bağımsız veya sosyal projelere düşkün bir anne figürü.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Duygusal soğukluk ve hislerden kopup tamamen mantığa kaçma. Şifa yolu, kalbin sıcaklığına temas etmeye izin vermektir.</p>
        `,
        "Balık": `
            <p><strong>Bilinçdışı Duygusal İhtiyaçlar:</strong> Ay Balık burcunda evrensel empati, psişik sezgiler ve sanatsal ilham kanalını sonuna kadar açar. Dünyanın tüm acısını hissedebilecek kadar saf bir şefkatiniz vardır.</p>
            <p><strong>Sevgi ve Güven Dili:</strong> Ruhsal bağ, koşulsuz kabul, romantizm, sanat ve sözsüz bir gönül bağı kurmak.</p>
            <p><strong>Anne ve Çocukluk Teması:</strong> Fedakar, şefkatli, sezgisel veya sanatçı ruhlu bir anne-çocuk bağı.</p>
            <p><strong>Gölge Yönler & Şifa:</strong> Sınır koyamama, gerçeklerden kaçış (eskapizm). Şifa yolu, kendi enerjisel sınırlarını koruyarak şefkatini yaymaktır.</p>
        `
    };

    document.getElementById('hc-ay-phase-badge').innerText = `${phaseIcon} ${phaseName}`;
    document.getElementById('hc-ay-deg-badge').innerText = `${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-ayburc-value').innerText = `${signObj.symbol} Ay Burcunuz: ${signObj.name}`;
    document.getElementById('hc-ay-element-modality').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-ay-phase-desc').innerHTML = `<p>${phaseDesc}</p>`;
    document.getElementById('hc-ayburc-desc').innerHTML = ayYorumlari[signObj.name];

    document.getElementById('hc-ay-burcu-result').classList.add('visible');
    document.getElementById('hc-ay-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

