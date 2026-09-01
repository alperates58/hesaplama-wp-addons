function hcAyDugumuHesapla() {
    const dateStr = document.getElementById('hc-node-date').value;
    if (!dateStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const parts = dateStr.split('-').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = 12;

    let yCalc = Y, mCalc = M;
    if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
    const A = Math.floor(yCalc / 100);
    const B = 2 - A + Math.floor(A / 4);
    const JD = Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (hour / 24);

    const T = (JD - 2451545.0) / 36525;

    // Meeus Moon Node formula
    let omega = 125.04452 - 1934.136261 * T + 0.0020708 * T * T + (T * T * T) / 450000;
    omega = omega % 360;
    if (omega < 0) omega += 360;

    let southNode = (omega + 180) % 360;

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

    const northIdx = Math.floor(omega / 30) % 12;
    const southIdx = Math.floor(southNode / 30) % 12;

    const northSign = burclar[northIdx];
    const southSign = burclar[southIdx];

    const nDeg = Math.floor(omega % 30);
    const nMin = Math.floor((omega % 1) * 60);

    const sDeg = Math.floor(southNode % 30);
    const sMin = Math.floor((southNode % 1) * 60);

    const axisInterpretations = {
        "Koç": `
            <p><strong>Ruhun Yolculuğu (KAD Koç - GAD Terazi):</strong> Geçmiş yaşamlarda sürekli başkalarını memnun etmeye çalışmış, onay bağımlılığı yaşamış ve kendi isteklerinizi feda etmiş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Terazi):</strong> Aşırı kararsızlık, yalnız kalma korkusu, sahte uyum ve sınır koyamama.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Koç):</strong> Kendi ayakları üzerinde durmak, cesurca 'ben' diyebilmek, inisiyatif almak ve liderlik etmek.</p>
        `,
        "Boğa": `
            <p><strong>Ruhun Yolculuğu (KAD Boğa - GAD Akrep):</strong> Geçmiş yaşamlarda sürekli krizler, güç savaşları ve kaos içinde yaşamış olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Akrep):</strong> Şüphecilik, aşırı kontrol arzusu, kriz bağımlılığı ve başkalarının kaynaklarına bel bağlama.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Boğa):</strong> Huzuru ve sadeliği seçmek, kendi öz değerini inşa etmek, üretmek ve sabırla kalıcı güven kurmak.</p>
        `,
        "İkizler": `
            <p><strong>Ruhun Yolculuğu (KAD İkizler - GAD Yay):</strong> Geçmişte dogmatik inançlara takılmış, 'her şeyi ben bilirim' kibri geliştirmiş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Yay):</strong> Büyük laflar edip detayları küçümsemek, fanatizm ve dinlemeyi bilmemek.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD İkizler):</strong> Bir öğrenci alçakgönüllülüğüyle merak etmek, soru sormak, dinlemek ve objektif bilgi paylaşmak.</p>
        `,
        "Yengeç": `
            <p><strong>Ruhun Yolculuğu (KAD Yengeç - GAD Oğlak):</strong> Geçmiş yaşamlarda sadece statü, başarı ve katı sorumluluklar peşinde koşup kalbinizi kapatmış olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Oğlak):</strong> Aşırı katılık, duyguları bastırma ve sadece dünyevi prestije odaklanma.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Yengeç):</strong> Şefkat göstermek, kırılganlığına izin vermek, aile ve yuva sıcaklığına değer vermek.</p>
        `,
        "Aslan": `
            <p><strong>Ruhun Yolculuğu (KAD Aslan - GAD Kova):</strong> Geçmişte kalabalıkların arkasına saklanmış, duygusal mesafeyi korumuş ve bireysel ışıltınızı gizlemiş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Kova):</strong> Soğuk mantık, seyirci kalma ve bireysel sorumluluktan kaçınma.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Aslan):</strong> Sahneye çıkmak, kalbinin sesini dinlemek, cesurca yaratıcılığını sergilemek ve parlamak.</p>
        `,
        "Başak": `
            <p><strong>Ruhun Yolculuğu (KAD Başak - GAD Balık):</strong> Geçmiş yaşamlarda kurban psikolojisine düşmüş, sınırsızca kaybolmuş ve kaosa teslim olmuş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Balık):</strong> Kaçış eğilimleri, hayalperestlik ve gerçeklerden kopma.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Başak):</strong> Hayatını organize etmek, pratik çözümler üretmek, bedenine ve rutinlerine sahip çıkmak.</p>
        `,
        "Terazi": `
            <p><strong>Ruhun Yolculuğu (KAD Terazi - GAD Koç):</strong> Geçmişte bencilce savaşmış, sadece kendi hedeflerine odaklanmış ve empatiyi ihmal etmiş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Koç):</strong> Sabırsızlık, fevrilik ve her şeyi tek başına yapma inadı.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Terazi):</strong> İş birliği kurmak, dinlemek, diplomasi ve adil ortaklıklar inşa etmek.</p>
        `,
        "Akrep": `
            <p><strong>Ruhun Yolculuğu (KAD Akrep - GAD Boğa):</strong> Geçmişte maddi konfora ve statükoya aşırı saplanmış, ruhsal derinleşmeyi reddetmiş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Boğa):</strong> İnatçılık, konfor alanı bağımlılığı ve maddiyata aşırı tutunma.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Akrep):</strong> Dönüşüme teslim olmak, derin bağlar kurmak, tabuları yıkmak ve ruhsal gücü sahiplenmek.</p>
        `,
        "Yay": `
            <p><strong>Ruhun Yolculuğu (KAD Yay - GAD İkizler):</strong> Geçmişte dedikodu ve yüzeysel bilgiler içinde kaybolmuş, büyük resmi görememiş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD İkizler):</strong> Zihinsel kararsızlık, yüzeysellik ve fikir maymunluğu.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Yay):</strong> Bir hayat felsefesi edinmek, sezgilerine güvenmek, vizyonunu genişletmek ve inanç geliştirmek.</p>
        `,
        "Oğlak": `
            <p><strong>Ruhun Yolculuğu (KAD Oğlak - GAD Yengeç):</strong> Geçmişte aşırı bağımlı, çocuksu ve konforlu aile sığınağına hapsolmuş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Yengeç):</strong> Aşırı alınganlık, geçmişe takılı kalma ve yetişkin sorumluluğu almaktan kaçınma.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Oğlak):</strong> Kendi kaderinin efendisi olmak, profesyonel hedefler koymak ve sarsılmaz bir olgunluğa ulaşmak.</p>
        `,
        "Kova": `
            <p><strong>Ruhun Yolculuğu (KAD Kova - GAD Aslan):</strong> Geçmişte sürekli alkış ve özel muamele beklemiş, egoyu merkeze koymuş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Aslan):</strong> Aşırı gurur, dram yaratma ve seçkinlik takıntısı.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Kova):</strong> Eşitliği savunmak, insanlığa hizmet eden projelere katılmak ve özgürleşmek.</p>
        `,
        "Balık": `
            <p><strong>Ruhun Yolculuğu (KAD Balık - GAD Başak):</strong> Geçmişte her şeyi aşırı kontrol etmeye çalışmış, detaylarda boğulmuş ve evham geliştirmiş olabilirsiniz.</p>
            <p><strong>Geride Bırakılacak Eski Kalıp (GAD Başak):</strong> Aşırı eleştiri, mükemmeliyetçilik kaygısı ve sürekli endişe.</p>
            <p><strong>Geliştirilecek Ruhsal Güç (KAD Balık):</strong> Akışa güvenmek, ilahi plana teslim olmak, affetmek ve koşulsuz sevgi geliştirmek.</p>
        `
    };

    document.getElementById('hc-node-north-sign').innerText = `${northSign.symbol} ${northSign.name}`;
    document.getElementById('hc-node-north-deg').innerText = `${nDeg}° ${nMin}' (Kuzey)`;
    document.getElementById('hc-node-south-sign').innerText = `${southSign.symbol} ${southSign.name}`;
    document.getElementById('hc-node-south-deg').innerText = `${sDeg}° ${sMin}' (Güney)`;

    document.getElementById('hc-node-desc').innerHTML = axisInterpretations[northSign.name];
    document.getElementById('hc-ay-dugumu-result').classList.add('visible');
    document.getElementById('hc-ay-dugumu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

