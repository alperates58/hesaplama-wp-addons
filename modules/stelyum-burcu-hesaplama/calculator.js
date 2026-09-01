/**
 * Stelyum (Gezegen Kümelenmesi) Hesaplama & Doğum Haritası Analiz Motoru
 * Pure Client-Side Astronomik Hesaplama & Astroloji Yorumlama Sistemi
 */

// Saat bilinmiyor kutusu değiştiğinde
function hcStelyumSaatDegisti(checkbox) {
    const saatInput = document.getElementById('hc-st-saat');
    if (checkbox.checked) {
        saatInput.value = '12:00';
        saatInput.disabled = true;
    } else {
        saatInput.disabled = false;
    }
}

// 1. ASTRONOMİK EFE MERİS & DOĞUM HARİTASI HESAPLAMA MOTORU
function hcStelyumHesaplaGezegenler(tarihStr, saatStr, lat, lng) {
    if (!tarihStr) return null;

    const parts = tarihStr.split('-').map(Number);
    const timeParts = (saatStr || '12:00').split(':').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = timeParts[0] + (timeParts[1] || 0) / 60;

    // Türkiye Saat Dilimi (2016 Eylül sonrası kalıcı UTC+3, öncesinde kış UTC+2 / yaz UTC+3)
    let tzOffset = 3;
    if (Y < 2016 || (Y === 2016 && M < 9)) {
        if (M > 3 && M < 10) {
            tzOffset = 3;
        } else if (M === 3 && D >= 25) {
            tzOffset = 3;
        } else if (M === 10 && D < 25) {
            tzOffset = 3;
        } else {
            tzOffset = 2;
        }
    }

    let ut = hour - tzOffset;
    let yCalc = Y, mCalc = M;
    if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
    const A = Math.floor(yCalc / 100);
    const B = 2 - A + Math.floor(A / 4);
    const JD = Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (ut / 24);

    const d = JD - 2451543.5; // Days from J2000.0
    const T = d / 36525;      // Julian centuries
    const rad = Math.PI / 180;

    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    // 1.1 GÜNEŞ (SUN)
    const M_sun = norm(357.5291 + 0.98560028 * d);
    const C_sun = (1.914602 - 0.004817 * T) * Math.sin(M_sun * rad) + 
                  (0.019993 - 0.000101 * T) * Math.sin(2 * M_sun * rad) + 
                  0.000289 * Math.sin(3 * M_sun * rad);
    const L0_sun = norm(280.46646 + 36000.76983 * T);
    const sunLon = norm(L0_sun + C_sun);
    const sunR = 1.00014 - 0.01671 * Math.cos(M_sun * rad) - 0.00014 * Math.cos(2 * M_sun * rad);

    // 1.2 AY (MOON)
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

    // 1.3 GEZEGENLER (HELIOCENTRIC -> GEOCENTRIC)
    const planetsOrbitalData = {
        mercury: { N: 48.3313 + 0.0000324587 * d, i: 7.0047, w: 77.4564 + 0.0000155447 * d, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus:   { N: 76.6799 + 0.0000246590 * d, i: 3.3946, w: 131.5721 + 0.000004085 * d, a: 0.723330, e: 0.006773, M0: 181.9797, M1: 1.6021302 },
        mars:    { N: 49.5574 + 0.0000211080 * d, i: 1.8497, w: 336.0408 + 0.000012280 * d, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { N: 100.4542 + 0.0000276854 * d, i: 1.3030, w: 273.8777 + 0.000016450 * d, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn:  { N: 113.6634 + 0.0000239810 * d, i: 2.4886, w: 339.3939 + 0.000029766 * d, a: 9.55475,  e: 0.055546, M0: 316.9670, M1: 0.0334442 },
        uranus:  { N: 74.0005 + 0.0000139780 * d, i: 0.7733, w: 96.6612 + 0.000030565 * d, a: 19.18171, e: 0.047318, M0: 142.5905, M1: 0.0117258 },
        neptune: { N: 131.7806 + 0.0000301730 * d, i: 1.7700, w: 272.8461 - 0.000006027 * d, a: 30.05826, e: 0.008606, M0: 260.2471, M1: 0.0059951 },
        pluto:   { N: 110.3034 + 0.0000139 * d,    i: 17.1417, w: 113.7632 + 0.0000139 * d, a: 39.48168, e: 0.248807, M0: 14.882,   M1: 0.00396 }
    };

    function getHeliocentricPos(p) {
        let M = norm(p.M0 + p.M1 * d);
        let E = M + (180 / Math.PI) * p.e * Math.sin(M * rad) * (1 + p.e * Math.cos(M * rad));
        for (let j = 0; j < 4; j++) {
            E = E - (E - (180 / Math.PI) * p.e * Math.sin(E * rad) - M) / (1 - p.e * Math.cos(E * rad));
        }
        let xv = p.a * (Math.cos(E * rad) - p.e);
        let yv = p.a * (Math.sqrt(1 - p.e * p.e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        let r = Math.sqrt(xv * xv + yv * yv);
        let lonecl = norm(v + p.w);
        let x = r * (Math.cos(p.N * rad) * Math.cos(lonecl * rad) - Math.sin(p.N * rad) * Math.sin(lonecl * rad) * Math.cos(p.i * rad));
        let y = r * (Math.sin(p.N * rad) * Math.cos(lonecl * rad) + Math.cos(p.N * rad) * Math.sin(lonecl * rad) * Math.cos(p.i * rad));
        let z = r * Math.sin(lonecl * rad) * Math.sin(p.i * rad);
        return { x, y, z };
    }

    const earthX = sunR * Math.cos(sunLon * rad);
    const earthY = sunR * Math.sin(sunLon * rad);

    const planetLongitudes = {
        gunes: sunLon,
        ay: moonLon
    };

    for (let key in planetsOrbitalData) {
        const hp = getHeliocentricPos(planetsOrbitalData[key]);
        const gx = hp.x + earthX;
        const gy = hp.y + earthY;
        let geoLon = norm(Math.atan2(gy, gx) / rad);
        
        let transKey = key;
        if (key === 'mercury') transKey = 'merkur';
        if (key === 'venus') transKey = 'venus';
        if (key === 'mars') transKey = 'mars';
        if (key === 'jupiter') transKey = 'jupiter';
        if (key === 'saturn') transKey = 'saturn';
        if (key === 'uranus') transKey = 'uranus';
        if (key === 'neptune') transKey = 'neptun';
        if (key === 'pluto') transKey = 'pluton';

        planetLongitudes[transKey] = geoLon;
    }

    // 1.4 YÜKSELEN (ASCENDANT)
    const gmst = norm(280.46061837 + 360.98564736629 * d + 0.000387933 * T * T);
    const lst = norm(gmst + lng);
    const eps = (23.4392911 - 0.0130042 * T) * rad;
    const phi = lat * rad;
    const ram = lst * rad;

    let asc = Math.atan2(Math.cos(ram), -Math.sin(ram) * Math.cos(eps) - Math.tan(phi) * Math.sin(eps)) / rad;
    asc = norm(asc);
    planetLongitudes['asc'] = asc;

    return planetLongitudes;
}

// Burç Anahtarları ve İsimleri
const HC_SIGNS = [
    { key: "koc", name: "Koç", element: "fire", modality: "cardinal", symbol: "♈" },
    { key: "boga", name: "Boğa", element: "earth", modality: "fixed", symbol: "♉" },
    { key: "ikizler", name: "İkizler", element: "air", modality: "mutable", symbol: "♊" },
    { key: "yengec", name: "Yengeç", element: "water", modality: "cardinal", symbol: "♋" },
    { key: "aslan", name: "Aslan", element: "fire", modality: "fixed", symbol: "♌" },
    { key: "basak", name: "Başak", element: "earth", modality: "mutable", symbol: "♍" },
    { key: "terazi", name: "Terazi", element: "air", modality: "cardinal", symbol: "♎" },
    { key: "akrep", name: "Akrep", element: "water", modality: "fixed", symbol: "♏" },
    { key: "yay", name: "Yay", element: "fire", modality: "mutable", symbol: "♐" },
    { key: "oglak", name: "Oğlak", element: "earth", modality: "cardinal", symbol: "♑" },
    { key: "kova", name: "Kova", element: "air", modality: "fixed", symbol: "♒" },
    { key: "balik", name: "Balık", element: "water", modality: "mutable", symbol: "♓" }
];

const HC_PLANET_CONFIG = {
    gunes:   { name: "Güneş", symbol: "☀️", type: "personal" },
    ay:      { name: "Ay", symbol: "🌙", type: "personal" },
    merkur:  { name: "Merkür", symbol: "☿", type: "personal" },
    venus:   { name: "Venüs", symbol: "♀", type: "personal" },
    mars:    { name: "Mars", symbol: "♂", type: "personal" },
    jupiter: { name: "Jüpiter", symbol: "♃", type: "social" },
    saturn:  { name: "Satürn", symbol: "♄", type: "social" },
    uranus:  { name: "Uranüs", symbol: "♅", type: "outer" },
    neptun:  { name: "Neptün", symbol: "♆", type: "outer" },
    pluton:  { name: "Plüton", symbol: "♇", type: "outer" },
    asc:     { name: "Yükselen", symbol: "⬆", type: "angle" }
};

// DOĞUM BİLGİLERİNDEN GEZEGENLERİ DOLDURMA
function hcStelyumHaritaDoldur() {
    const tarihStr = document.getElementById('hc-st-tarih').value;
    const saatStr = document.getElementById('hc-st-saat').value;
    const sehirVal = document.getElementById('hc-st-sehir').value;

    if (!tarihStr) {
        alert('Lütfen geçerli bir doğum tarihi giriniz.');
        return;
    }

    const coords = sehirVal.split(',').map(Number);
    const lng = coords[0];
    const lat = coords[1];

    const lons = hcStelyumHesaplaGezegenler(tarihStr, saatStr, lat, lng);
    if (!lons) return;

    for (let pKey in lons) {
        const deg = lons[pKey];
        const signIdx = Math.floor(deg / 30) % 12;
        const signObj = HC_SIGNS[signIdx];
        const degInSign = Math.floor(deg % 30);
        const minInSign = Math.floor((deg % 1) * 60);

        const selectEl = document.getElementById('hc-st-p-' + pKey);
        const badgeEl = document.getElementById('hc-st-deg-' + pKey);

        if (selectEl) {
            selectEl.value = signObj.key;
        }
        if (badgeEl) {
            badgeEl.innerText = `${degInSign}° ${minInSign}' ${signObj.name}`;
            badgeEl.style.display = 'inline-block';
        }
    }

    // Otomatik hesaplama sonrası doğrudan stelyum analizini de çalıştır
    hcStelyumHesapla();
}

// 12 BURÇ İÇİN DERİNLEMESİNE STELYUM YORUM KÜTÜPHANESİ
const HC_STELLIUM_DATA = {
    koc: {
        title: "Koç Stelyumu (Ateş / Öncü)",
        archetype: "Kozmik Savaşçı & Öncü Girişimci Dehası",
        summary: "Haritanızda Koç burcundaki bu yoğun kümelenme; içinizde asla sönmeyen bir tutku ateşi, durdurulamaz bir girişimcilik cesareti ve 'ilk başlatan olma' dürtüsü yaratır.",
        nature: "Koç stelyumu taşıyan kişiler, bekleme salonlarında oturmak için değil, kapıları kırıp yeni yollar açmak için doğmuşlardır. İçinizdeki yüksek adrenalin seviyesi sizi sürekli bir eylem ve fetih arayışına iter. Fikirlerinizi düşünce aşamasında bekletmek yerine doğrudan pratiğe dökme refleksine sahipsiniz. Hızlı karar alma, kriz anlarında soğukkanlı bir cesaret gösterme ve liderlik etme yeteneğiniz olağanüstüdür.",
        superpower: "<strong>Süper Gücünüz:</strong> Yenilikçi cesaret, korkusuzca risk alma, sıfırdan proje başlatma ve kriz anlarında insanları peşinden sürükleyen dinamik liderlik.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Sabırsızlık, başladığı işi bitirmekte zorlanma, aşırı rekabetçilik, fevrilik ve başkalarının sınırlarını farkında olmadan ezme riski. 'Ben bilirim' tavrı ekip çalışmalarında gerilim yaratabilir.",
        remedy: "<strong>Dengeleme Rehberi (Terazi Şifası):</strong> Karşıt burcunuz olan Terazi'nin diplomasi, empati ve uzlaşma yeteneğini hayatınıza entegre edin. Tek başına zafere koşmak yerine, başkalarının fikirlerini dinlemeyi ve stratejik ortaklıklar kurmayı öğrendiğinizde yenilmez olursunuz.",
        career: "Girişimcilik, yöneticilik, cerrahi, acil durum yönetimi, spor, savunma sanayii ve inovasyon alanlarında zirve potansiyeli taşır."
    },
    boga: {
        title: "Boğa Stelyumu (Toprak / Sabit)",
        archetype: "Sarsılmaz Mimar & Maddi Bolluk Dehası",
        summary: "Boğa burcundaki güçlü stelyum; size dünya üzerinde kalıcı yapılar, somut zenginlikler ve estetik şaheserler inşa etme sabrı ve dehası bahşeder.",
        nature: "Bu kümelenme haritanızın kalbine derin bir dinginlik, güven arayışı ve olağanüstü bir direnç aşılar. Hayata karşı yaklaşımınız pratik, sağlamcı ve köklüdür. Fırtınalar kopsa dahi yerinden kıpırdamayan bir dağ gibi sakin kalabilirsiniz. Beş duyunuz son derece gelişmiştir; iyi yemek, kaliteli yaşam, sanat ve doğa sizin ruhsal besin kaynağınızdır.",
        superpower: "<strong>Süper Gücünüz:</strong> Emsalsiz sabır, finansal zeka, kaynakları çoğaltma ustalığı, estetik vizyon ve başladığı işi her koşulda kusursuzca tamamlama kararlılığı.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Aşırı inatçılık, değişime ve yeniliklere direnç gösterme, konfor alanına saplanıp kalma, maddiyata veya kişilere aşırı sahiplenici yaklaşma.",
        remedy: "<strong>Dengeleme Rehberi (Akrep Şifası):</strong> Karşıt burcunuz olan Akrep'in krizleri kabullenme, dönüşüm ve bırakabilme gücünü benimseyin. Bazen eskiyen yapıları yıkmanın yeni ve daha büyük bolluklara kapı araladığını fark etmelisiniz.",
        career: "Finans, gayrimenkul, mimarlık, gastronomi, lüks marka yönetimi, sanat galerisi işletmeciliği ve tarım/doğa projelerinde büyük başarı getirir."
    },
    ikizler: {
        title: "İkizler Stelyumu (Hava / Değişken)",
        archetype: "Bilgi Simyacısı & İletişim Dehası",
        summary: "İkizler burcundaki stelyum; zihninizin adeta bir süper bilgisayar gibi çalışmasını, bilgiye doymayan bir merakı ve kelimelerle dünyayı büyüleme yeteneğini gösterir.",
        nature: "Zihninizde aynı anda onlarca fikir uçuşur. Monotonluktan nefret eder, sürekli yeni trendleri, teknolojileri ve fikirleri araştırırsınız. Sosyal zekanız ve bağlantı kurma kabiliyetiniz sayesinde girdiğiniz her ortamda havanın rengini değiştirebilir, insanları entelektüel cazibenizle etkileyebilirsiniz. Çok dillilik, hızlı öğrenme ve adapte olma yeteneğiniz üst düzeydedir.",
        superpower: "<strong>Süper Gücünüz:</strong> Entelektüel kıvraklık, ikna sanatı, karmaşık bilgileri basitleştirerek aktarma, ağ (networking) oluşturma ve çoklu görev (multitasking) ustalığı.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Zihinsel hiperaktivite, odaklanma eksikliği, yüzeysellik riski, sinirsel yorgunluk (burnout) ve duygusal derinlikten kaçma eğilimi.",
        remedy: "<strong>Dengeleme Rehberi (Yay Şifası):</strong> Karşıt burcunuz Yay'ın büyük resmi görme, derin felsefe ve tek bir vizyona odaklanma erdemini hayatınıza katın. Parçalı bilgiler toplamak yerine bunları büyük bir hayat felsefesine dönüştürün.",
        career: "Medya, gazetecilik, yazarlık, dijital pazarlama, yazılım, ticaret, halkla ilişkiler ve eğitim alanlarında mükemmel başarı potansiyeli taşır."
    },
    yengec: {
        title: "Yengeç Stelyumu (Su / Öncü)",
        archetype: "Kozmik Şifacı & Duygusal Güvenlik Ustası",
        summary: "Yengeç burcundaki stelyum; derin sezgiler, inanılmaz bir hafıza ve çevrenizdekileri koruyup büyüten güçlü bir duygusal zeka yaratır.",
        nature: "Siz sadece mantığınızla değil, doğrudan kalbiniz ve sezgilerinizle algılarsınız. Bir ortama girdiğinizde insanların görünmeyen duygularını ve atmosferi anında tararsınız. Aile, kökler, aidiyet ve güven sizin için vazgeçilmezdir. Geçmişe ve anılara verdiğiniz değer, sizi kültürlerin, geleneklerin ve insan kalbinin sadık bir koruyucusu yapar.",
        superpower: "<strong>Süper Gücünüz:</strong> Büyüleyici sezgisel öngörü, empati dehası, insanları duygusal olarak iyileştirme gücü, sadakat ve koruyucu liderlik.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Aşırı alınganlık, geçmişteki kırgınlıklara takılı kalma, kabuğuna çekilerek küsme eğilimi ve kontrolü elden bırakamama.",
        remedy: "<strong>Dengeleme Rehberi (Oğlak Şifası):</strong> Karşıt burcunuz Oğlak'ın rasyonel sınırlarını, duygusal dayanıklılığını ve profesyonel disiplinini entegre edin. Duygularınızı bir güç olarak kullanırken mantığınızın sınırlarını net çizin.",
        career: "Psikoloji, sağlık/tıp, insan kaynakları, tarih/arkeoloji, çocuk gelişimi, restoran/otelcilik ve gayrimenkul yönetiminde parlar."
    },
    aslan: {
        title: "Aslan Stelyumu (Ateş / Sabit)",
        archetype: "Yaratıcı Hükümdar & Sahne Işığı Karizması",
        summary: "Aslan burcundaki stelyum; haritanızda doğuştan bir yıldız ışığı, asil bir duruş, cömert bir kalp ve sahneye hükmeden bir yaratıcılık barındırır.",
        nature: "Girdiğiniz hiçbir mekanda gölgede kalamazsınız. Varlığınız doğal bir sıcaklık, neşe ve otorite yayar. Kalbinizle hareket eder, sevdiklerinize karşı kraliyet seviyesinde cömert olursunuz. Takdir edilmek, alkışlanmak ve fark edilmek sizin için en büyük yaşam motivatörüdür. Sıradan olan hiçbir şey sizi tatmin etmez; hayatınızı bir sanat eserine dönüştürmek istersiniz.",
        superpower: "<strong>Süper Gücünüz:</strong> Manyetik karizma, sanatsal yaratıcılık, yüksek özgüven, ilham verici liderlik ve her koşulda kalpten cesaret gösterebilme.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Gurur, eleştiriye tahammülsüzlük, ilgi odağı olma saplantısı ve aşırı dramatik tepkiler verme riski.",
        remedy: "<strong>Dengeleme Rehberi (Kova Şifası):</strong> Karşıt burcunuz Kova'nın tevazu, kolektif bilinç ve eşitlikçi vizyonunu hayatınıza dahil edin. Işığınızı sadece kendi egonuzu parlatmak için değil, bütünün hayrına yakmayı öğrenin.",
        career: "Sahne sanatları, sinema, moda, yaratıcı direktörlük, üst düzey yöneticilik, eğlence sektörü ve lüks tasarımda zirveye oynar."
    },
    basak: {
        title: "Başak Stelyumu (Toprak / Değişken)",
        archetype: "Kusursuz Usta & Sistem Mimarı Dehası",
        summary: "Başak burcundaki stelyum; kaostan kusursuz bir düzen çıkarma yeteneği, keskin bir analiz gücü ve faydalı olma arzusu yaratır.",
        nature: "Gözünüzden hiçbir detay kaçmaz. Bir sistemdeki en ufak aksaklığı, bir projedeki en gizli açığı milisaniyeler içinde fark edersiniz. Disiplinli, çalışkan ve çözüm odaklısınız. İnsanların saatlerce çözemediği karmaşık problemleri adım adım analiz ederek mükemmel işleyen pratik süreçlere dönüştürürsünüz.",
        superpower: "<strong>Süper Gücünüz:</strong> Keskin analitik zeka, süreç optimizasyonu, mükemmeliyetçi iş ahlakı, sağlık/beslenme bilinci ve krizleri pratik akılla çözme ustalığı.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Kendini ve başkalarını aşırı eleştirme (hiperkritik tutum), detaylarda boğulup büyük resmi kaçırma, vesvese ve aşırı kaygı.",
        remedy: "<strong>Dengeleme Rehberi (Balık Şifası):</strong> Karşıt burcunuz Balık'ın teslimiyet, akışa güven ve sezgisel kabullenişini uygulayın. Her şeyin %100 kontrol edilemeyeceğini ve bazen kusurların da bir güzellik barındırdığını kabul edin.",
        career: "Veri analitiği, yazılım mühendisliği, tıp/cerrahi, kalite güvence, finans denetimi, editörlük ve organizasyon yönetiminde benzersizdir."
    },
    terazi: {
        title: "Terazi Stelyumu (Hava / Öncü)",
        archetype: "Büyük Diplomat & Estetik Vizyoner",
        summary: "Terazi burcundaki stelyum; kusursuz bir adalet duygusu, zarafet, ilişki kurma sanatı ve estetik mükemmellik anlayışı aşılar.",
        nature: "Dünyaya barış, uyum ve güzellik getirmek için buradasınız. İnsanlar arasındaki çatışmaları ustalıkla yatıştırabilir, her iki tarafın da haklarını gözeten adil çözümler üretebilirsiniz. Görsel zevkiniz ve stil anlayışınız son derece gelişmiştir; çirkinlikten ve kabalıktan fiziksel olarak rahatsızlık duyarsınız.",
        superpower: "<strong>Süper Gücünüz:</strong> Üstün diplomasi, müzakere ustalığı, estetik ve tasarım dehası, sosyal cazibe ve insanları bir araya getiren barışçıl güç.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Aşırı kararsızlık, çatışmadan kaçmak için 'hayır' diyememe, onaylanma bağımlılığı ve kendi isteklerini sürekli erteleme.",
        remedy: "<strong>Dengeleme Rehberi (Koç Şifası):</strong> Karşıt burcunuz Koç'un net duruşunu, sınır koyma cesaretini ve 'önce ben' diyebilme gücünü benimseyin. Bazen huzuru korumanın tek yolu açıkça tavır koymaktır.",
        career: "Hukuk, diplomasi, arabuluculuk, moda tasarımı, iç mimarlık, halkla ilişkiler ve lüks marka temsilciliğinde zirveye ulaşır."
    },
    akrep: {
        title: "Akrep Stelyumu (Su / Sabit)",
        archetype: "Simyacı & Manyetik Güç Dehası",
        summary: "Akrep burcundaki stelyum; haritanızda sarsılmaz bir irade, gizemli bir çekim gücü, psikolojik derinlik ve küllerinden yeniden doğma gücü yaratır.",
        nature: "Yüzeysel olan hiçbir şey ilginizi çekmez. İnsanların maskelerinin ardındaki gerçek niyetleri, saklanan sırları ve bilinçdışı motivasyonları röntgen çeker gibi görürsünüz. Hayatta karşılaştığınız en ağır krizlerden dahi eskisinden çok daha güçlü bir şekilde çıkabilen bir zümrüdüanka kuşusunuz. Bağlılığınız tutkulu ve derindir; asla yarı yolda bırakmazsınız.",
        superpower: "<strong>Süper Gücünüz:</strong> Manyetik hipnotik karizma, kriz yönetimi dehası, psikolojik analiz yeteneği, sarsılmaz irade ve kadersel dönüşüm gücü.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Aşırı kontrolcülük, şüphecilik, takıntı (obsesyon), kıskançlık ve yapılan haksızlıkları asla unutmama (kin).",
        remedy: "<strong>Dengeleme Rehberi (Boğa Şifası):</strong> Karşıt burcunuz Boğa'nın sade huzurunu, affediciliğini ve hayatın basit güzelliklerine güvenme erdemini hayatınıza davet edin. Her şeyin arkasında bir komplo aramak yerine akışa teslim olmayı deneyin.",
        career: "Stratejik danışmanlık, psikiyatri/psikoloji, cerrahi, kriz yöneticiliği, istihbarat/araştırmacı gazetecilik, yatırım ve okült bilimlerde efsaneleşir."
    },
    yay: {
        title: "Yay Stelyumu (Ateş / Değişken)",
        archetype: "Kozmik Gezgin & Vizyoner Filozof",
        summary: "Yay burcundaki stelyum; sınır tanımayan bir özgürlük aşkı, yüksek bir hayat felsefesi, sınırsız iyimserlik ve küresel bir vizyon bahşeder.",
        nature: "Siz dar kalıplara sığamayacak kadar büyük hedeflere sahipsiniz. Yeni ülkeler, farklı kültürler, yüksek öğretim ve evrenin sırları sizin daimi tutkunuzdur. Doğuştan şanslı bir auranız vardır; en zor durumlarda bile evrenin size bir kapı açacağına inanırsınız. İnsanlara ilham veren, vizyonlarını genişleten ve hakikati cesurca savunan bir bilgesiniz.",
        superpower: "<strong>Süper Gücünüz:</strong> Geniş vizyon, yabancı kültürlerle köprü kurma, ilham veren öğretmenlik/önderlik, yüksek şans faktörü ve dürüstlük.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Aşırı iyimserlikten kaynaklanan dikkatsizlik, fanatizm (kendi fikrini dayatma), detayları küçümseme ve patavatsızlık.",
        remedy: "<strong>Dengeleme Rehberi (İkizler Şifası):</strong> Karşıt burcunuz İkizler'in detaylara saygı gösterme, dinleme ve pratik gerçeklerle bağ kurma yeteneğini uygulayın. Büyük vizyonları hayata geçirmek için somut adımları ihmal etmeyin.",
        career: "Uluslararası ticaret, akademi, felsefe, yayıncılık, turizm/havacılık, dış ilişkiler ve motivasyon konuşmacılığında büyük fark yaratır."
    },
    oglak: {
        title: "Oğlak Stelyumu (Toprak / Öncü)",
        archetype: "Zirve Fatihi & Stratejik Otorite Dehası",
        summary: "Oğlak burcundaki stelyum; haritanızda granit gibi sağlam bir disiplin, kadersel bir hırs, sabırlı bir liderlik ve kalıcı bir imparatorluk kurma gücü taşır.",
        nature: "Genç yaşlarda olgunlaşmış, hayatın sorumluluklarını omuzlamaktan çekinmeyen bir karaktere sahipsiniz. Geçici hevesler peşinde koşmaz; 10-20 yıllık stratejik planlar yaparsınız. Zaman sizin en büyük müttefikinizdir; yaşınız ilerledikçe saygınlığınız, gücünüz ve başarınız katlanarak büyür. Güvenilir, ilkeli ve sarsılmaz bir kaya gibisiniz.",
        superpower: "<strong>Süper Gücünüz:</strong> Çelik gibi irade, krizlerde sarsılmaz liderlik, kurumsal vizyon, stratejik sabır ve en zorlu hedeflere adım adım tırmanma ustalığı.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Aşırı katılık, duygusal mesafelilik, işkoliklik (workaholic), başarısızlık korkusu ve her şeyi kontrol etme yükü.",
        remedy: "<strong>Dengeleme Rehberi (Yengeç Şifası):</strong> Karşıt burcunuz Yengeç'in şefkatini, duygulara alan açma yeteneğini ve kırılganlığı kabullenme gücünü benimseyin. Ruhunuzu beslemeden sadece başarıyla beslenemezsiniz.",
        career: "CEO'luk, üst düzey bürokrasi, siyaset, finansal yapılar, inşaat/mühendislik imparatorlukları ve kurumsal yöneticilikte zirve yapar."
    },
    kova: {
        title: "Kova Stelyumu (Hava / Sabit)",
        archetype: "Geleceğin Mimarı & Devrimci Deha",
        summary: "Kova burcundaki stelyum; çağının onlarca yıl ötesinde düşünen sıradışı bir zeka, özgürlük tutkusu ve toplumu dönüştürme ideali yaratır.",
        nature: "Geleneksel kalıplara ve 'böyle gelmiş böyle gider' tabularına meydan okursunuz. Sizin için bireysel özgürlük ve insanlığın ilerlemesi her şeyden önce gelir. Olaylara tamamen objektif, bilimsel ve yenilikçi bir pencereden bakarsınız. Arkadaş çevrelerinde, kolektif projelerde ve devrim niteliğindeki fikirlerde doğal bir lider ve ilham kaynağısınız.",
        superpower: "<strong>Süper Gücünüz:</strong> İleri görüşlü vizyon, teknoloji ve inovasyon dehası, sıradışı özgünlük, hümanist liderlik ve sisteme meydan okuyan zeka.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Duygusal olarak soğuk ve mesafeli görünme, isyankarlık için isyan etme, uzlaşmaz dik kafalılık ve insanları teorik birer veri gibi görme.",
        remedy: "<strong>Dengeleme Rehberi (Aslan Şifası):</strong> Karşıt burcunuz Aslan'ın sıcak kalbini, bireysel sevgisini ve tutkusunu hayatınıza katın. İnsanlığı uzaktan sevmek yerine, yanı başınızdaki insanların kalplerine dokunmayı öğrenin.",
        career: "Yapay zeka/teknoloji, uzay bilimleri, astroloji, sivil toplum liderliği, bilimsel araştırma, fütürizm ve alternatif enerji projelerinde çığır açar."
    },
    balik: {
        title: "Balık Stelyumu (Su / Değişken)",
        archetype: "Kozmik Mistik & Evrensel Sanatçı Dehası",
        summary: "Balık burcundaki stelyum; evrensel bir empati, sınırsız bir hayal gücü, psişik sezgiler ve sanatsal ilham kanalının açık olduğunu gösterir.",
        nature: "Görünen dünyanın ötesindeki frekansları, enerjileri ve manevi bağları hissedersiniz. Sınırlarınız akışkandır; başkalarının acısını kendi acınız gibi hissedebilecek kadar saf bir merhametiniz vardır. Sanat, müzik, maneviyat ve kolektif bilinç sizin doğal oyun alanınızdır. Dünyaya katı kurallar için değil, koşulsuz sevgiyi ve büyüyü hatırlatmak için geldiniz.",
        superpower: "<strong>Süper Gücünüz:</strong> Emsalsiz psişik sezgiler, sanatsal yaratıcılık, ruhsal şifacılık gücü, koşulsuz şefkat ve ilham verici vizyonerlik.",
        shadow: "<strong>Gölge Yönler & Kör Noktalar:</strong> Sınır çizememe, kurban/kurtarıcı psikolojisine düşme, gerçeklerden kaçış (eskapizm), aldatılmaya açık olma ve pratik hayatta dağılma.",
        remedy: "<strong>Dengeleme Rehberi (Başak Şifası):</strong> Karşıt burcunuz Başak'ın pratik sınırlarını, zihinsel ayrım gücünü ve günlük rutin disiplinini hayatınıza entegre edin. Sezgilerinizi somut eserlere dönüştürmek için topraklanmayı öğrenin.",
        career: "Müzik, sinema/fotoğrafçılık, psikoloji/terapi, enerji şifacılığı, edebiyat, denizcilik ve hayır kurumları liderliğinde mucizeler yaratır."
    }
};

// ANA STELYUM VE HARİTA HESAPLAMA FONKSİYONU
function hcStelyumHesapla() {
    const selects = document.querySelectorAll('.hc-st-planet');
    const counts = {};
    const signPlanets = {};
    let totalPlanets = 0;

    // Element ve Modality sayaçları
    const elementCounts = { fire: 0, earth: 0, air: 0, water: 0 };
    const modalityCounts = { cardinal: 0, fixed: 0, mutable: 0 };

    selects.forEach(s => {
        const signKey = s.value;
        const planetKey = s.getAttribute('data-planet');
        if (signKey && signKey !== "yok") {
            counts[signKey] = (counts[signKey] || 0) + 1;
            if (!signPlanets[signKey]) signPlanets[signKey] = [];
            signPlanets[signKey].push(planetKey);
            totalPlanets++;

            const signObj = HC_SIGNS.find(item => item.key === signKey);
            if (signObj) {
                elementCounts[signObj.element]++;
                modalityCounts[signObj.modality]++;
            }
        }
    });

    if (totalPlanets === 0) {
        alert('Lütfen en azından doğum bilgilerinizi girip haritayı doldurun veya gezegen burçlarını seçin.');
        return;
    }

    // Stelyum tespiti (3 veya daha fazla gezegen aynı burçta)
    const stelliums = [];
    for (let signKey in counts) {
        if (counts[signKey] >= 3) {
            stelliums.push({
                signKey: signKey,
                count: counts[signKey],
                planets: signPlanets[signKey]
            });
        }
    }

    // Gezegen sayısına göre sırala (En çok olan başa)
    stelliums.sort((a, b) => b.count - a.count);

    // Gezegen Dağılım Çiplerini Hazırla
    let chipsHtml = "";
    selects.forEach(s => {
        const pName = s.getAttribute('data-planet');
        const sKey = s.value;
        const signObj = HC_SIGNS.find(item => item.key === sKey);
        if (signObj) {
            const isStellium = stelliums.some(st => st.signKey === sKey);
            chipsHtml += `
                <div class="hc-st-chip ${isStellium ? 'is-stellium' : ''}">
                    <span class="hc-st-chip-planet">${pName}:</span>
                    <span class="hc-st-chip-sign">${signObj.symbol} ${signObj.name}</span>
                </div>
            `;
        }
    });
    document.getElementById('hc-st-planets-chips').innerHTML = chipsHtml;

    // Element & Nitelik Yüzdelerini Güncelle
    const calcPct = (val) => totalPlanets > 0 ? Math.round((val / totalPlanets) * 100) : 0;

    const firePct = calcPct(elementCounts.fire);
    const earthPct = calcPct(elementCounts.earth);
    const airPct = calcPct(elementCounts.air);
    const waterPct = calcPct(elementCounts.water);

    document.getElementById('hc-el-fire-val').innerText = firePct + '%';
    document.getElementById('hc-el-fire-bar').style.width = firePct + '%';
    document.getElementById('hc-el-earth-val').innerText = earthPct + '%';
    document.getElementById('hc-el-earth-bar').style.width = earthPct + '%';
    document.getElementById('hc-el-air-val').innerText = airPct + '%';
    document.getElementById('hc-el-air-bar').style.width = airPct + '%';
    document.getElementById('hc-el-water-val').innerText = waterPct + '%';
    document.getElementById('hc-el-water-bar').style.width = waterPct + '%';

    const cardPct = calcPct(modalityCounts.cardinal);
    const fixedPct = calcPct(modalityCounts.fixed);
    const mutPct = calcPct(modalityCounts.mutable);

    document.getElementById('hc-mo-card-val').innerText = cardPct + '%';
    document.getElementById('hc-mo-card-bar').style.width = cardPct + '%';
    document.getElementById('hc-mo-fixed-val').innerText = fixedPct + '%';
    document.getElementById('hc-mo-fixed-bar').style.width = fixedPct + '%';
    document.getElementById('hc-mo-mut-val').innerText = mutPct + '%';
    document.getElementById('hc-mo-mut-bar').style.width = mutPct + '%';

    // Detaylı Yorum Metnini Oluştur
    const summaryCard = document.getElementById('hc-st-summary-card');
    const badgeType = document.getElementById('hc-st-badge-type');
    const badgeCount = document.getElementById('hc-st-badge-count');
    const titleVal = document.getElementById('hc-st-value');
    const subtitleVal = document.getElementById('hc-st-subtitle');
    const descContainer = document.getElementById('hc-st-desc');

    let analysisHtml = "";

    if (stelliums.length > 0) {
        const primaryStellium = stelliums[0];
        const signData = HC_STELLIUM_DATA[primaryStellium.signKey];
        const signObj = HC_SIGNS.find(s => s.key === primaryStellium.signKey);

        summaryCard.classList.remove('no-stellium');
        summaryCard.classList.add('has-stellium');

        badgeType.innerText = stelliums.length > 1 ? "Çifte Stelyum Tespit Edildi" : "Güçlü Stelyum Tespit Edildi";
        badgeCount.innerText = `${primaryStellium.count} Gök Cismi`;
        titleVal.innerText = `${signObj.name} Burcunda Stelyum`;
        subtitleVal.innerText = `Haritanızın ana güç merkezi: ${signData.archetype}`;

        analysisHtml += `
            <div class="hc-st-report-card">
                <h4 class="hc-st-report-title">🌟 Stelyumunuzun Anlamı & Öz Enerjisi</h4>
                <p>${signData.nature}</p>
                <div class="hc-st-highlight-box">
                    <strong>Bu Kümelenmedeki Gezegenleriniz:</strong> ${primaryStellium.planets.join(', ')}
                    <br><span style="font-size:13px; color:#64748b;">Bu gezegenler bir araya gelerek hayatınızda bir lazer odağı gibi tek bir burcun temalarını devasa ölçüde güçlendirir.</span>
                </div>
            </div>

            <div class="hc-st-report-card">
                <h4 class="hc-st-report-title">⚡ Deha Alanı & Kariyer Potansiyeli</h4>
                <p>${signData.superpower}</p>
                <p><strong>İdeal Kariyer Alanları:</strong> ${signData.career}</p>
            </div>

            <div class="hc-st-report-card">
                <h4 class="hc-st-report-title">⚠️ Gölge Yönler & Dikkat Edilmesi Gerekenler</h4>
                <p>${signData.shadow}</p>
            </div>

            <div class="hc-st-report-card">
                <h4 class="hc-st-report-title">🌿 Kadersel Dengeleme Rehberi (Şifa Yolu)</h4>
                <p>${signData.remedy}</p>
            </div>
        `;

        // İkinci bir stelyum varsa ekle
        if (stelliums.length > 1) {
            const secondStellium = stelliums[1];
            const secondData = HC_STELLIUM_DATA[secondStellium.signKey];
            const secondSign = HC_SIGNS.find(s => s.key === secondStellium.signKey);
            analysisHtml += `
                <div class="hc-st-report-card secondary-stellium">
                    <h4 class="hc-st-report-title">✨ İkincil Stelyum: ${secondSign.name} Burcu (${secondStellium.count} Gezegen)</h4>
                    <p>Haritanızda aynı zamanda <strong>${secondSign.name}</strong> burcunda da (${secondStellium.planets.join(', ')}) toplanan ikinci bir kümelenme mevcuttur. Bu durum çok nadir görülen bir çifte güç merkezi oluşturur.</p>
                    <p>${secondData.summary}</p>
                </div>
            `;
        }

    } else {
        // Stelyum Yoksa (Dağıtık Enerji Haritası)
        // En çok gezegen içeren burcu bul
        let maxCount = 0;
        let topSigns = [];
        for (let signKey in counts) {
            if (counts[signKey] > maxCount) {
                maxCount = counts[signKey];
                topSigns = [signKey];
            } else if (counts[signKey] === maxCount) {
                topSigns.push(signKey);
            }
        }

        const topSignNames = topSigns.map(sk => HC_SIGNS.find(s => s.key === sk).name).join(' ve ');

        summaryCard.classList.remove('has-stellium');
        summaryCard.classList.add('no-stellium');

        badgeType.innerText = "Dağıtık Enerji Haritası";
        badgeCount.innerText = "Stelyum Bulunmadı";
        titleVal.innerText = "Dengeli ve Çok Yönlü Yaşam Enerjisi";
        subtitleVal.innerText = `Haritanızda tek bir burçta 3+ kümelenme yok; enerjiniz dengeli dağılmıştır.`;

        analysisHtml = `
            <div class="hc-st-report-card">
                <h4 class="hc-st-report-title">🌈 Harita Dağılımınızın Anlamı</h4>
                <p>Doğum haritanızda 3 veya daha fazla gezegenin aynı burçta toplanmasıyla oluşan klasik bir <strong>Stelyum</strong> bulunmamaktadır. Bu durum astrolojide bir eksiklik değil, aksine <strong>büyük bir denge ve çok yönlülük</strong> göstergesidir.</p>
                <p>Stelyumu olan kişiler tek bir hayat alanına takıntılı derecede odaklanırken, sizin hayat enerjiniz haritanızın farklı evlerine ve burçlarına dengeli biçimde yayılmıştır. Bu sayede hayatın birden fazla alanında (kariyer, ilişkiler, kişisel gelişim, aile) aynı anda başarılı olabilir ve kriz durumlarında diğer güçlü burçlarınızdan destek alarak kolayca toparlanabilirsiniz.</p>
            </div>

            <div class="hc-st-report-card">
                <h4 class="hc-st-report-title">🎯 Haritanızın En Baskın Enerjisi</h4>
                <p>Haritanızda en çok gezegen toplanan burç <strong>${topSignNames}</strong> (${maxCount} gezegen) olarak öne çıkıyor. Karakterinizde ve kararlarınızda bu burcun özellikleri en belirgin rehberinizdir.</p>
                <p>Element dengenize baktığımızda en yüksek orana sahip olan element, zorluklarla başa çıkma stratejinizi ve hayattan aldığınız motivasyonu doğrudan belirler.</p>
            </div>
        `;
    }

    descContainer.innerHTML = analysisHtml;
    document.getElementById('hc-st-result').classList.add('visible');
    
    // Otomatik sonuca kaydır
    document.getElementById('hc-st-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
