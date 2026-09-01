function hcBabyNumerologyHesapla() {
    const rawName = document.getElementById('hc-bin-name').value.trim();
    if (!rawName) {
        alert('Lütfen bebeğiniz için düşündüğünüz ismi giriniz.');
        return;
    }

    const pythagoreanMap = {
        'A': 1, 'J': 1, 'S': 1, 'Ş': 1,
        'B': 2, 'K': 2, 'T': 2,
        'C': 3, 'Ç': 3, 'L': 3, 'U': 3, 'Ü': 3,
        'D': 4, 'M': 4, 'V': 4,
        'E': 5, 'N': 5, 'W': 5,
        'F': 6, 'O': 6, 'Ö': 6, 'X': 6,
        'G': 7, 'Ğ': 7, 'P': 7, 'Y': 7,
        'H': 8, 'Q': 8, 'Z': 8,
        'I': 9, 'İ': 9, 'R': 9
    };

    function reduceToSingleOrMaster(num) {
        if (num === 11 || num === 22 || num === 33) return num;
        while (num > 9 && num !== 11 && num !== 22 && num !== 33) {
            let s = 0;
            num.toString().split('').forEach(d => s += parseInt(d));
            num = s;
        }
        return num;
    }

    const clean = rawName.toLocaleUpperCase('tr-TR').replace(/[^A-ZÇĞİÖŞÜ]/g, '');
    let totalSum = 0;
    for (let char of clean) {
        if (pythagoreanMap[char]) totalSum += pythagoreanMap[char];
    }

    const babyNum = reduceToSingleOrMaster(totalSum);

    const archetypes = {
        1: { title: "1 - Cesur Öncü & Bağımsız Lider", temperament: "Kararlı, inisiyatif alan, özgüveni yüksek ve erken yaşta bağımsızlaşan bir mizaç.", talent: "Liderlik, keşif merakı ve sıfırdan oyun kurma yeteneği.", tip: "Kendi kararlarını almasına fırsat tanıyın, aşırı baskı yerine seçenek sunarak yönlendirin." },
        2: { title: "2 - Şefkatli Diplomat & Sevecen Kalp", temperament: "Duygusal zekası yüksek, nazik, paylaşımcı ve arkadaş canlısı bir çocuk.", talent: "Derin empati, müzik kulağı ve insanları sakinleştirme gücü.", tip: "Özgüvenini pekiştirin, duygularını açıkça ifade etmesini teşvik edin ve sert uyarılardan kaçının." },
        3: { title: "3 - Neşeli Sanatçı & Konuşkan Zihin", temperament: "Güleryüzlü, sosyal, kelimeleri ve renkleri çok seven dışa dönük bir enerji.", talent: "Oyunculuk, resim, hitabet, hikaye anlatıcılığı ve espri yeteneği.", tip: "Yaratıcılığını destekleyecek sanatsal aktivitelere yönlendirin ve dikkatini toplamasına yardımcı olun." },
        4: { title: "4 - Güvenilir Sistemci & Düzenli Mantık", temperament: "Sakin, sabırlı, kuralları seven, oyuncaklarını toplayan metodik bir mizaç.", talent: "Mühendislik zekası, yapboz/lego ustalığı ve güçlü odaklanma.", tip: "Ani değişikliklerden önce ona haber verin, rutinleri koruyarak güven hissini besleyin." },
        5: { title: "5 - Meraklı Gezgin & Zeki Kaşif", temperament: "Yerinde duramayan, sürekli soru soran, maceracı ve enerjisi yüksek bir çocuk.", talent: "Hızlı kavrama, yabancı diller, spor ve yeni ortamlara anında adaptasyon.", tip: "Açık hava etkinliklerine bolca alan açın, enerjisini spora ve keşfe kanalize edin." },
        6: { title: "6 - Koruyucu Şifacı & Sevgi Dolu Melek", temperament: "Kardeşlerine ve hayvanlara çok düşkün, evini ve ailesini seven şefkatli bir ruh.", talent: "Yardımseverlik, tasarım, doğa sevgisi ve aile bağlarını güçlendirme.", tip: "Başkalarının sorumluluğunu erken yaşta üstlenmemesini sağlayın, çocukluğunu doyasıya yaşatın." },
        7: { title: "7 - Küçük Düşünür & Sezgisel Bilge", temperament: "Gözlemci, kitapları ve doğayı seven, derin sorular soran zeki ve sakin bir mizaç.", talent: "Bilimsel merak, felsefe, analitik zeka ve güçlü sezgiler.", tip: "Yalnız kalıp düşünme ve üretme alanına saygı gösterin, ilgi duyduğu konularda kitaplar sağlayın." },
        8: { title: "8 - Güçlü Yönetici & Azimli Başarı", temperament: "Hedefine odaklanan, sınırları zorlayan, güçlü iradeli ve karizmatik bir duruş.", talent: "Organizasyon yeteneği, stratejik oyunlar ve büyük projeleri tamamlama.", tip: "Adalet duygusunu pekiştirin, başarı kadar çabanın ve paylaşmanın da değerini öğretin." },
        9: { title: "9 - Evrensel Kalp & Merhametli Işık", temperament: "Tüm dünyayı kucaklayan, haksızlığa gelemeyen, geniş vizyonlu ve cömert bir çocuk.", talent: "Evrensel sanatlar, çevre duyarlılığı ve kitleleri peşinden sürükleyen ilham.", tip: "Aşırı idealist beklentiler yerine anı yaşamasını sağlayın ve duygusal sınırlarını korumayı öğretin." },
        11: { title: "11 - Üstat Sezgisel Yıldız (Master 11)", temperament: "Çok hassas duyulara sahip, rüyaları güçlü, ilham dolu ve özel bir ışık taşıyan çocuk.", talent: "Olağanüstü sezgi, telepatik duyarlılık ve sanatsal dahi potansiyeli.", tip: "Hassasiyetini bir zayıflık değil süper güç olarak görmesini sağlayın, huzurlu bir ev ortamı sunun." },
        22: { title: "22 - Büyük Usta Mimar (Master 22)", temperament: "Büyük hayalleri olan, somut projeler üretmeyi seven, sabırlı ve olgun bir ruh.", talent: "Liderlik, büyük ölçekli yapılar tasarlama ve pratik dahi potansiyeli.", tip: "Hayallerini destekleyin, büyük hedeflerini adım adım planlamayı öğretin." }
    };

    const arch = archetypes[babyNum] || archetypes[1];

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">👶 İsim Sayısı: ${babyNum} ${babyNum >= 11 ? '(Üstat Sayı)' : ''}</div>
            <div class="hc-num-title">${arch.title}</div>
            <p class="hc-num-sub">Analiz Edilen İsim: <strong>${rawName}</strong></p>
        </div>
    `;

    const gridHtml = `
        <div class="hc-num-card-box">
            <div class="hc-num-card-tag">🧸 Temel Mizaç & Karakter</div>
            <p class="hc-num-card-p">${arch.temperament}</p>
        </div>

        <div class="hc-num-card-box" style="border-color: #a7f3d0; background: #ecfdf5;">
            <div class="hc-num-card-tag" style="color: #059669;">✨ Doğuştan Gelen Parlak Yetenek</div>
            <p class="hc-num-card-p">${arch.talent}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Ebeveynler İçin Pedagojik Tavsiye:</strong> ${arch.tip}</p>
        <p><strong>İsmin Titreşimi:</strong> <strong>${rawName}</strong> ismi Pisagor numerolojisinde <strong>${babyNum}</strong> sayısına denk gelir. Bu frekans, çocuğunuzun hayat yolculuğunda ona ${arch.talent} konularında büyük bir manevi ve zihinsel destek sağlayacaktır.</p>
    `;

    document.getElementById('hc-bin-hero').innerHTML = heroHtml;
    document.getElementById('hc-bin-grid').innerHTML = gridHtml;
    document.getElementById('hc-res-bin-desc').innerHTML = descHtml;

    document.getElementById('hc-bebek-ismi-numerolojisi-hesaplama-result').classList.add('visible');
    document.getElementById('hc-bebek-ismi-numerolojisi-hesaplama-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

