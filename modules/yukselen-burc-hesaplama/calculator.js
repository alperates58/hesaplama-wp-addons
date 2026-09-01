function hcYukselenBurcHesapla() {
    const tarihStr = document.getElementById('hc-asc-tarih').value;
    const saatStr = document.getElementById('hc-asc-saat').value;
    const sehirCoords = document.getElementById('hc-asc-sehir').value.split(',').map(Number);

    if (!tarihStr || !saatStr) {
        alert('Lütfen doğum tarihinizi ve saatinizi girin.');
        return;
    }

    const lng = sehirCoords[0];
    const lat = sehirCoords[1];

    const parts = tarihStr.split('-').map(Number);
    const timeParts = saatStr.split(':').map(Number);
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

    // Sidereal Time & Ascendant
    const gmst = norm(280.46061837 + 360.98564736629 * d + 0.000387933 * T * T);
    const lst = norm(gmst + lng);
    const eps = (23.4392911 - 0.0130042 * T) * rad;
    const phi = lat * rad;
    const ram = lst * rad;

    let asc = Math.atan2(Math.cos(ram), -Math.sin(ram) * Math.cos(eps) - Math.tan(phi) * Math.sin(eps)) / rad;
    asc = norm(asc);

    // Alçalan (Descendant) = ASC + 180
    const dsc = norm(asc + 180);

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

    const ascIdx = Math.floor(asc / 30) % 12;
    const dscIdx = Math.floor(dsc / 30) % 12;
    const ascObj = burclar[ascIdx];
    const dscObj = burclar[dscIdx];

    const degInSign = Math.floor(asc % 30);
    const minInSign = Math.floor((asc % 1) * 60);

    const yukselenYorumlari = {
        "Koç": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Koç olarak dış dünyaya son derece dinamik, kararlı, cesur ve enerjik bir vitrin sunarsınız. İnsanlar sizi ilk gördüklerinde harekete geçmeye hazır, lider ve doğrudan birisi olarak algılarlar. Genellikle canlı bakışlar, hızlı adımlar ve atletik bir beden dili sergilersiniz.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Düşünmeden önce eyleme geçme eğilimindesinizdir. Bir fırsat gördüğünüzde beklemez, ilk adımı siz atarsınız. Girişimcilik ruhunuz yüksektir.</p>
        `,
        "Boğa": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Boğa bireyleri dışarıdan sakin, güvenilir, zarif ve sarsılmaz bir intiba bırakırlar. İlk bakışta sağlamlık ve kalite hissettirirsiniz. Ses tonunuz genellikle huzur verici, giyim tarzınız kaliteli ve özenlidir.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Acele etmekten nefret edersiniz; adımlarınızı sağlam atar, riskli maceralar yerine kalıcı ve güvenli yolları tercih edersiniz.</p>
        `,
        "İkizler": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen İkizler olarak yansıttığınız enerji oldukça meraklı, konuşkan, genç görünümlü ve hareketlidir. Ellerinizi ve mimiklerinizi çok kullanırsınız; gözleriniz sürekli etrafı tarar.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Her konuda bilgi sahibi olmak, yeni insanlarla tanışmak ve monotonluktan kaçmak temel motivasyonunuzdur. Sosyal ortamlarda kelebek gibisinizdir.</p>
        `,
        "Yengeç": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Yengeç bireyleri dış dünyaya karşı şefkatli, nazik, empatik ve korumacı bir maske takarlar. İlk bakışta biraz çekingen veya mesafeli durabilirsiniz ancak güven hissettiğinizde samimiyetinizle sararsınız.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Kararlarınızı sezgileriniz ve duygusal güvenliğinizle alırsınız. İnsanların gizli hislerini anında sezme kabiliyetiniz olağanüstüdür.</p>
        `,
        "Aslan": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Aslan olarak girdiğiniz hiçbir ortamda fark edilmemeniz imkansızdır. Görkemli saçlar, dik bir duruş, sıcak bir gülümseme ve doğal bir kraliyet havası yayarsınız.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Hayatı bir sahne gibi yaşar, yaratıcılığınızı sergilemekten ve takdir edilmekten büyük keyif alırsınız. Cömertliğiniz ve koruyuculuğunuzla tanınırsınız.</p>
        `,
        "Başak": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Başak bireyleri dışarıdan bakıldığında son derece derli toplu, titiz, mütevazı ve zeki bir intiba bırakırlar. Sade, temiz ve şık bir stiliniz vardır.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Her durumu analiz eder, aksaklıkları anında tespit edip pratik çözümler üretirsiniz. Güvenilirlik ve dakiklik en büyük imzanızdır.</p>
        `,
        "Terazi": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Terazi olarak dış dünyaya son derece zarif, nazik, çekici ve diplomatik bir imaj sergilersiniz. Yüz hatlarınızda ve tavırlarınızda doğal bir estetik uyum vardır.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Çatışmalardan kaçınır, her zaman orta yolu bulmaya çalışırsınız. İlişki kurma sanatı ve sosyal zeka sizin en büyük süper gücünüzdür.</p>
        `,
        "Akrep": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Akrep bireyleri dış dünyaya karşı son derece gizemli, manyetik, güçlü ve etkileyici bir aura yayarlar. Delici bakışlarınız karşınızdakinin ruhunu okur gibi bakar.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Kendinizi hemen açmaz, önce karşınızdakini tartarsınız. Krizler karşısında sarsılmaz bir direnç gösterir ve küllerinizden yeniden doğarsınız.</p>
        `,
        "Yay": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Yay olarak dış dünyaya yansıttığınız enerji son derece iyimser, neşeli, maceracı ve özgür ruhludur. Açık sözlü, samimi ve güler yüzlü bir duruşunuz vardır.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Hayatı bir keşif yolculuğu olarak görür, felsefi ve geniş bir vizyonla hareket edersiniz. Dar kalıplara sığamazsınız.</p>
        `,
        "Oğlak": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Oğlak bireyleri dışarıdan ciddi, mesafeli, olgun ve otoriter bir intiba bırakırlar. Yaşınızdan daha olgun hareket eder, profesyonel ve güvenilir bir duruş sergilersiniz.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Stratejik sabır ve disiplinle hedeflerinize tırmanırsınız. Sorumluluk almaktan kaçınmaz, kalıcı başarılar peşinde koşarsınız.</p>
        `,
        "Kova": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Kova olarak dış dünyaya özgün, sıradışı, entelektüel ve bağımsız bir imaj yansıtırsınız. Geleneksel kalıplara uymayan tarzınızla hemen ayırt edilirsiniz.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Geleceğe odaklısınızdır; teknoloji, bilim, astroloji ve insani idealler peşinde koşarsınız. Herkese arkadaşça ama belli bir mesafeyle yaklaşırsınız.</p>
        `,
        "Balık": `
            <p><strong>Fiziksel Aura & Dış İmaj:</strong> Yükselen Balık bireyleri dış dünyaya karşı son derece yumuşak, hayalperest, merhametli ve büyüleyici bir maske takarlar. Gözleriniz genellikle derin ve anlamlı bakar.</p>
            <p><strong>Hayat Yaklaşımı:</strong> Mantıktan ziyade sezgilerinizle hareket edersiniz. Sanatsal ilhamınız ve empati yeteneğiniz çok güçlüdür; evrensel bir akışa güvenirsiniz.</p>
        `
    };

    const alcalanYorumlari = {
        "Koç": `<strong>Alçalan Koç:</strong> İlişkilerde ve evlilikte; cesur, girişimci, ne istediğini bilen, dinamik ve kendine güvenen partnerleri hayatınıza çekersiniz. Karşı tarafın net ve doğrudan olması ilişkinizi besler.`,
        "Boğa": `<strong>Alçalan Boğa:</strong> İlişkilerde; sadık, güvenilir, maddi-manevi huzur veren, sakin ve ayakları yere basan partnerler sizin için ideal dengeyi sağlar. Fırtınalı ilişkiler yerine kalıcı güven ararsınız.`,
        "İkizler": `<strong>Alçalan İkizler:</strong> İlişkilerde; zeki, esprili, konuşkan, birlikte seyahat edebileceğiniz ve entelektüel olarak sizi besleyen partnerlerle en uyumlu bağı kurarsınız.`,
        "Yengeç": `<strong>Alçalan Yengeç:</strong> İlişkilerde; şefkatli, aile değerlerine önem veren, koruyucu ve duygusal olarak sizi sarıp sarmalayan partnerleri ararsınız. Güvenli bir yuva kurmak önceliğinizdir.`,
        "Aslan": `<strong>Alçalan Aslan:</strong> İlişkilerde; karizmatik, cömert, özgüveni yüksek, gurur duyabileceğiniz ve hayatınıza neşe katan partnerler sizi tamamlar.`,
        "Başak": `<strong>Alçalan Başak:</strong> İlişkilerde; düzenli, çalışkan, pratik destek sağlayan, sadık ve hayatınızı kolaylaştıran partnerlerle mükemmel bir takım olursunuz.`,
        "Terazi": `<strong>Alçalan Terazi:</strong> İlişkilerde; nazik, zarif, adaletli, diplomasi bilen ve romantik partnerleri hayatınıza çekersiniz. Birlikte estetik ve huzurlu bir yaşam kurmak istersiniz.`,
        "Akrep": `<strong>Alçalan Akrep:</strong> İlişkilerde; tutkulu, sadık, derin, gizemli ve kriz anlarında sarsılmaz bir güç sergileyen partnerlerle kadersel bağlar kurarsınız.`,
        "Yay": `<strong>Alçalan Yay:</strong> İlişkilerde; vizyoner, neşeli, maceracı, hayat felsefesi geniş ve size özgürlük tanıyan partnerlerle en mutlu birlikteliği yaşarsınız.`,
        "Oğlak": `<strong>Alçalan Oğlak:</strong> İlişkilerde; olgun, sorumluluk sahibi, başarılı, güvenilir ve uzun vadeli taahhütlerde bulunan partnerleri çekersiniz.`,
        "Kova": `<strong>Alçalan Kova:</strong> İlişkilerde; özgür ruhlu, entelektüel, sıradışı ve önce en iyi dostunuz olabilecek bağımsız partnerler sizi cezbeder.`,
        "Balık": `<strong>Alçalan Balık:</strong> İlişkilerde; şefkatli, romantik, sanatsal yönü gelişmiş, ruhsal bir derinlik ve koşulsuz sevgi sunan partnerlerle tamamlarsınız.`
    };

    document.getElementById('hc-asc-deg-badge').innerText = `⬆ ASC: ${degInSign}° ${minInSign}' ${ascObj.name}`;
    document.getElementById('hc-dsc-badge').innerText = `💍 DSC: ${dscObj.name}`;
    document.getElementById('hc-asc-value').innerText = `${ascObj.symbol} Yükselen Burcunuz: ${ascObj.name}`;
    document.getElementById('hc-asc-meta').innerText = `${ascObj.element} Elementi • ${ascObj.modality} Nitelik • Yönetici Gezegen: ${ascObj.ruler}`;
    document.getElementById('hc-asc-desc').innerHTML = yukselenYorumlari[ascObj.name];
    document.getElementById('hc-dsc-desc').innerHTML = `<p>${alcalanYorumlari[dscObj.name]}</p>`;

    document.getElementById('hc-yukselen-burc-result').classList.add('visible');
    document.getElementById('hc-yukselen-burc-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

