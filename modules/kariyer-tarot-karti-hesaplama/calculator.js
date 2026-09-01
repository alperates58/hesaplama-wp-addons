function hcKariyerTarotHesapla() {
    const dStr = document.getElementById('hc-ctc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const careerArcana = {
        1: { name: "I. Büyücü (The Magician)", icon: "🪄", astro: "☿️ Merkür", element: "Hava", title: "Vizyoner Girişimci & İletişim Ustası", moneyDoor: "Yenilikçi fikirler, satış, dijital ticaret, teknoloji ve lansmanlar.", sectors: "Teknoloji, Girişimcilik, Pazarlama, Medya, Yazarlık, E-Ticaret.", leadership: "Hızlı karar alan, ikna kabiliyeti yüksek ve ekipleri vizyonuyla peşinden sürükleyen bir lider." },
        2: { name: "II. Azize (The High Priestess)", icon: "📜", astro: "🌙 Ay", element: "Su", title: "Stratejik Danışman & Gizli Akıl", moneyDoor: "Analiz, veri madenciliği, psikoloji, araştırma ve stratejik gizli danışmanlık.", sectors: "Psikoloji, Araştırma-Geliştirme, İstihbarat/Veri Analitiği, Kütüphanecilik, Danışmanlık.", leadership: "Sessizce gözlemleyen, sezgisel riskleri önceden gören ve derin strateji üreten bilge lider." },
        3: { name: "III. İmparatoriçe (The Empress)", icon: "👑", astro: "♀️ Venüs", element: "Toprak", title: "Yaratıcı Üretici & Bereket Mimarı", moneyDoor: "Tasarım, sanat, estetik, gayrimenkul, gastronomi ve lüks tüketim.", sectors: "Moda, İç Mimarlık, Sanat Yönetimi, Tarım/Organik Ürünler, Etkinlik & Otelcilik.", leadership: "Çalışanlarını besleyen, yaratıcılığı teşvik eden ve çalışma ortamını güzelleştiren koruyucu lider." },
        4: { name: "IV. İmparator (The Emperor)", icon: "🏛️", astro: "♈ Koç", element: "Ateş", title: "Kurumsal Yönetici & Sistem İnşaatçısı", moneyDoor: "Büyük ölçekli yatırımlar, gayrimenkul, endüstri ve kurumsal üst düzey yöneticilik.", sectors: "İnşaat, Savunma Sanayii, Kurumsal Yönetim, Finans, Kamu Yönetimi, Hukuk.", leadership: "Otoriter, disiplinli, kuralları net koyan ve kriz anlarında sarsılmaz duran komutan lider." },
        5: { name: "V. Aziz (The Hierophant)", icon: "⛪", astro: "♉ Boğa", element: "Toprak", title: "Kurumsal Rehber & Akademi Lideri", moneyDoor: "Eğitim, lisanslama, yayıncılık, mentörlük ve köklü kurumlar.", sectors: "Akademi, Eğitim Teknolojileri, Yayıncılık, Hukuki Danışmanlık, Vakıflar.", leadership: "Kurum kültürünü koruyan, etik standartları yüksek tutan ve çalışanlarını eğiten mentör lider." },
        6: { name: "VI. Aşıklar (The Lovers)", icon: "💖", astro: "♊ İkizler", element: "Hava", title: "İlişki Mimarı & Ağ (Networking) Dehası", moneyDoor: "Ortaklıklar, temsilcilik, diplomasi, halkla ilişkiler ve arabuluculuk.", sectors: "Halkla İlişkiler (PR), İnsan Kaynakları, Marka Elçiliği, Müzakerecilik, Moda.", leadership: "Empati kuran, zıt tarafları uzlaştıran ve takım içinde sinerji yaratan demokratik lider." },
        7: { name: "VII. Araba (The Chariot)", icon: "🛡️", astro: "♋ Yengeç", element: "Su", title: "Hedef Odaklı Fatih & Saha Lideri", moneyDoor: "Lojistik, taşımacılık, küresel dağıtım, hızlı büyüme ve operasyonel fetihler.", sectors: "Lojistik, Havacılık, Uluslararası Satış, Otomotiv, Spor Yönetimi.", leadership: "Yüksek tempoda çalışan, engelleri yıkan ve hedefe odaklanmış dinamik lider." },
        8: { name: "VIII. Güç (Strength)", icon: "🦁", astro: "♌ Aslan", element: "Ateş", title: "Kriz Çözücü & Karizmatik Yönetici", moneyDoor: "Zorlu müzakereler, yeniden yapılandırma, koçluk ve prestijli markalar.", sectors: "Üst Düzey Yönetici Koçluğu, Kriz Yönetimi, Sağlık/Rehabilitasyon, Gösteri Dünyası.", leadership: "Baskı altında sakin kalan, şefkatli otoritesiyle saygı uyandıran asil lider." },
        9: { name: "IX. Ermiş (The Hermit)", icon: "🕯️", astro: "♍ Başak", element: "Toprak", title: "Bağımsız Uzman & Derin Araştırmacı", moneyDoor: "Uzmanlık danışmanlığı, yazarlık, yazılım mimarisi ve bağımsız araştırma.", sectors: "Yazılım/Algoritma Geliştirme, Akademik Araştırma, Felsefe, Finansal Risk Analizi.", leadership: "Kendi başına çalışan, derin bilgi birikimiyle yön gösteren ve kaliteyi denetleyen lider." },
        10: { name: "X. Kader Çarkı (Wheel of Fortune)", icon: "🎡", astro: "♃ Jüpiter", element: "Ateş", title: "Piyasa Analisti & Trend Yakalayıcı", moneyDoor: "Borsa, kripto, değişken piyasalar, turizm ve fırsat odaklı yatırımlar.", sectors: "Hisse Senedi/Fon Yönetimi, Küresel Ticaret, Trend Tahmini, Seyahat & Turizm.", leadership: "Piyasanın yönünü önceden koklayan, hızlı manevra yapabilen esnek lider." },
        11: { name: "XI. Adalet (Justice)", icon: "⚖️", astro: "♎ Terazi", element: "Hava", title: "Etik Denetçi & Hukuk Stratejisti", moneyDoor: "Sözleşmeler, denetim, vergi hukuku, hakemlik ve kurumsal uyum (compliance).", sectors: "Hukuk, Bağımsız Denetim (Audit), Muhasebe, İhale Yönetimi, Kamu.", leadership: "Tarafsız, dürüst, liyakate önem veren ve hakkaniyeti gözeten adil lider." },
        12: { name: "XII. Asılan Adam (The Hanged Man)", icon: "🌿", astro: "🌊 Su", element: "Su", title: "Ezber Bozan İnovatör & Sanat Yönetmeni", moneyDoor: "Sıra dışı tasarım, alternatif çözümler, psikoloji ve sanatsal prodüksiyon.", sectors: "Kreatif Direktörlük, Sinema/Medya, Alternatif Tıp, Kullanıcı Deneyimi (UX).", leadership: "Farklı bakış açıları sunan, egodan arınmış ve kalıpların dışına çıkan lider." },
        13: { name: "XIII. Ölüm (Death)", icon: "🦅", astro: "♏ Akrep", element: "Su", title: "Dönüşüm Mimarı & Yeniden Yapılandırıcı", moneyDoor: "Batık şirket kurtarma, restorasyon, geri dönüşüm ve köklü şirket reformları.", sectors: "Restorasyon, Kriz Yönetimi, Cerrahi/Tıp, Atık Yönetimi, Birleşme & Devralmalar (M&A).", leadership: "Gerektiğinde radikal kararlar alan, eskiyi cesurca tasfiye edip yeniyi kuran lider." },
        14: { name: "XIV. Denge (Temperance)", icon: "🕊️", astro: "♐ Yay", element: "Ateş", title: "Uluslararası Koordinatör & Arabulucu", moneyDoor: "Farklı kültürler arası ticaret, kimya/biyoteknoloji ve çok uluslu projeler.", sectors: "Dış Ticaret, Biyoteknoloji, Çevirmenlik/Diplomasi, Sürdürülebilirlik Danışmanlığı.", leadership: "Departmanlar arası ahengi sağlayan, çatışmaları eriten ve denge kuran lider." },
        15: { name: "XV. Şeytan (The Devil)", icon: "🔥", astro: "♑ Oğlak", element: "Toprak", title: "Yüksek Finans Devrimcisi & Güç Oyuncusu", moneyDoor: "Büyük sermaye yönetimi, lüks sektör, yatırım bankacılığı ve rekabetçi piyasalar.", sectors: "Yatırım Bankacılığı, Risk Sermayesi (VC), Madencilik, Lüks Gayrimenkul.", leadership: "Hırslı, sonuç odaklı, insan psikolojisindeki zaafları ve arzuları iyi yöneten lider." },
        16: { name: "XVI. Yıkılan Kule (The Tower)", icon: "⚡", astro: "♂️ Mars", element: "Ateş", title: "Radikal Risk Uzmanı & Kriz Yöneticisi", moneyDoor: "Siber güvenlik, acil durum yönetimi, risk sigortası ve radikal yeniden yapılanma.", sectors: "Siber Güvenlik, İnşaat/Yıkım Mühendisliği, Sigortacılık, Kriz İletişimi.", leadership: "En büyük kriz anında paniğe kapılmadan gerçeği gören ve acil eyleme geçen lider." },
        17: { name: "XVII. Yıldız (The Star)", icon: "✨", astro: "♒ Kova", element: "Hava", title: "İlham Verici Vizyoner & Gelecek Tasarımcısı", moneyDoor: "Yenilenebilir enerji, uzay/teknoloji, yapay zeka, sosyal sorumluluk ve ilham.", sectors: "Yapay Zeka, Uzay Sanayii, Yenilenebilir Enerji, Sosyal Girişimcilik.", leadership: "Ekiplerine geleceğin vizyonunu aşılayan, açık fikirli ve hümanist lider." },
        18: { name: "XVIII. Ay (The Moon)", icon: "🌕", astro: "♓ Balık", element: "Su", title: "Kreatif Hayal Mimarı & Bilinçaltı Analisti", moneyDoor: "Eğlence endüstrisi, sinema, rüya tabanlı ürünler ve sezgisel pazarlama.", sectors: "Sinema/Animasyon, Müzik Prodüksiyonu, İllüstrasyon, Reklam Yazarlığı.", leadership: "Kitlelerin gizli duygusal ihtiyaçlarını sezen ve bunları markalaştıran lider." },
        19: { name: "XIX. Güneş (The Sun)", icon: "☀️", astro: "☀️ Güneş", element: "Ateş", title: "Karizmatik Marka Yüzü & Başarı Mıknatısı", moneyDoor: "Kişisel markalaşma, sahne, konuşmacılık, medya ve büyük kitle liderliği.", sectors: "Motivasyonel Liderlik, Medya & Televizyon, Çocuk Eğitimi, Turizm & Eğlence.", leadership: "Pozitif enerjisiyle tüm şirkete neşe ve yüksek motivasyon katan parlayan lider." },
        20: { name: "XX. Mahkeme (Judgement)", icon: "📯", astro: "🔥 Ateş", element: "Ateş", title: "Kolektif Uyanış Lideri & Reformcu", moneyDoor: "Kurumsal kültür değişimi, toplumsal davalar ve büyük sektörel devrimler.", sectors: "Stratejik Yönetim Danışmanlığı, İnsan Hakları, Büyük Proje Direktörlüğü.", leadership: "Herkesin içindeki en yüksek potansiyeli uyandıran ve amaç birliği yaratan lider." },
        21: { name: "XXI. Dünya (The World)", icon: "🌍", astro: "♄ Satürn", element: "Toprak", title: "Küresel Yönetici & Uluslararası Zafer", moneyDoor: "Çok uluslu şirketler, küresel ihracat, uluslararası organizasyonlar.", sectors: "Global CEO'luk, Dış Ticaret, Uluslararası Diplomasi, Dünya Bankası/BM.", leadership: "Dünya standartlarında iş üreten, bütünsel düşünen ve zirveyi koruyan küresel lider." },
        22: { name: "0. Joker (The Fool)", icon: "🎒", astro: "♅ Uranüs", element: "Hava", title: "Özgür Girişimci & Sıra Dışı Mucit", moneyDoor: "Freelance işler, start-up projeleri, dijital göçebelik ve niş pazarlar.", sectors: "Start-up Kuruculuğu, Seyahat Yazarlığı, Bağımsız Danışmanlık, İnovasyon.", leadership: "Hiyerarşiyi reddeden, esnek, yaratıcı ve risk almaktan korkmayan vizyoner lider." }
    };

    const d = new Date(dStr);
    let sum = d.getDate() + (d.getMonth() + 1) + d.getFullYear();
    while (sum > 22) {
        let t = 0;
        sum.toString().split('').forEach(v => t += parseInt(v));
        sum = t;
    }
    const cardNum = sum === 0 ? 22 : sum;
    const c = careerArcana[cardNum];

    const heroHtml = `
        <div class="hc-tarot-hero-card">
            <div class="hc-tarot-badge">💼 Kariyer Arketipiniz: ${c.name}</div>
            <div class="hc-tarot-title">${c.icon} ${c.title}</div>
            <p class="hc-tarot-sub">Astrolojik Rezonans: <strong>${c.astro}</strong> | Element: <strong>${c.element}</strong></p>
        </div>
    `;

    const cardsHtml = `
        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">💰 Para & Bereket Kapınız</div>
            <div class="hc-tarot-card-name">Finansal Akış Alanı</div>
            <p class="hc-tarot-card-p">${c.moneyDoor}</p>
        </div>

        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">👑 Liderlik & Yönetim Tarzınız</div>
            <div class="hc-tarot-card-name">Yönetim Profili</div>
            <p class="hc-tarot-card-p">${c.leadership}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>En Çok Başarı Getiren Sektörler:</strong> ${c.sectors}</p>
        <p><strong>2026 Kariyer Tavsiyesi:</strong> Bu yıl kendi arketipinizin süper güçlerine (${c.element} elementinin dinamizmi) odaklanın. Güçlü olduğunuz alanları başkalarına devretmek yerine vizyonu bizzat siz yönetin.</p>
    `;

    document.getElementById('hc-ctc-hero').innerHTML = heroHtml;
    document.getElementById('hc-ctc-cards').innerHTML = cardsHtml;
    document.getElementById('hc-ctc-desc').innerHTML = descHtml;

    document.getElementById('hc-kariyer-tarot-karti-result').classList.add('visible');
    document.getElementById('hc-kariyer-tarot-karti-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

