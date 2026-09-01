function hcTarotNumHesapla() {
    const dStr = document.getElementById('hc-tnc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const numerologyArcana = {
        1: { num: 1, name: "I. Büyücü (The Magician)", icon: "🪄", astro: "☿️ Merkür", element: "Hava", chakra: "Boğaz Çakrası", power: "Liderlik, İrade & Sıfırdan Yaratım", desc: "Pisagor 1 sayısı başlangıçları, özgünlüğü ve bağımsızlığı simgeler. Büyücü kartı ile birleştiğinde, düşüncelerinizi anında maddeye dönüştürme ve yeni yollar açma gücü verir." },
        2: { num: 2, name: "II. Azize (The High Priestess)", icon: "📜", astro: "🌙 Ay", element: "Su", chakra: "Üçüncü Göz Çakrası", power: "Sezgi, Diplomasi & Bilinçaltı Rehberliği", desc: "Pisagor 2 sayısı ikiliği, dengeyi ve sezgisel uyumu temsil eder. Azize arketipi sayesinde görünmeyen hakikatleri ve insanların gerçek niyetlerini derinden sezersiniz." },
        3: { num: 3, name: "III. İmparatoriçe (The Empress)", icon: "👑", astro: "♀️ Venüs", element: "Toprak", chakra: "Sakral Çakra", power: "Bolluk, Sanat & Yaratıcı Coşku", desc: "Pisagor 3 sayısı yaratıcı kendini ifade etmeyi, neşeyi ve sosyal çekimi yönetir. İmparatoriçe kartı yaşamınızı bereket, estetik ve üretkenlikle taçlandırır." },
        4: { num: 4, name: "IV. İmparator (The Emperor)", icon: "🏛️", astro: "♈ Koç", element: "Ateş", chakra: "Kök Çakra", power: "İstikrar, Düzen & Kalıcı Sistemler", desc: "Pisagor 4 sayısı sağlam temelleri, sadakati ve disiplini simgeler. İmparator arketipiyle birleştiğinde hayatınızda sarsılmaz kurumlar ve güvenli limanlar inşa edersiniz." },
        5: { num: 5, name: "V. Aziz (The Hierophant)", icon: "⛪", astro: "♉ Boğa", element: "Toprak", chakra: "Kalp / Boğaz Çakrası", power: "Öğretmenlik, Değerler & Ruhsal Bilgelik", desc: "Pisagor 5 sayısı hareket, özgürlük ve hayat tecrübelerinden öğrenmeyi simgeler. Aziz kartı sizi evrensel ilkeleri topluma aktaran bilge bir köprü yapar." },
        6: { num: 6, name: "VI. Aşıklar (The Lovers)", icon: "💖", astro: "♊ İkizler", element: "Hava", chakra: "Kalp Çakrası", power: "Sevgi, Harmoni & Doğru Kararlar", desc: "Pisagor 6 sayısı aileyi, sorumluluğu ve koşulsuz sevgiyi simgeler. Aşıklar kartıyla birleştiğinde zıtlıkları birleştiren bir çekim ve uyum ustası olursunuz." },
        7: { num: 7, name: "VII. Araba (The Chariot)", icon: "🛡️", astro: "♋ Yengeç", element: "Su", chakra: "Solar Pleksus Çakrası", power: "Odaklanma, Zafer & Engelleri Aşma", desc: "Pisagor 7 sayısı zihinsel derinliği, analizi ve mistik arayışı yönetir. Araba kartı ile birlikte zihinsel ve duygusal iradenizle hedeflerinize fırtına gibi ulaşırsınız." },
        8: { num: 8, name: "VIII. Güç (Strength)", icon: "🦁", astro: "♌ Aslan", element: "Ateş", chakra: "Solar Pleksus Çakrası", power: "Maddi Güç, Sabır & Asalet", desc: "Pisagor 8 sayısı sonsuzluk döngüsünü, finansal başarıyı ve karma dengesini temsil eder. Güç kartıyla birleştiğinde içsel gücünüzle dünyayı nezaketle yönetirsiniz." },
        9: { num: 9, name: "IX. Ermiş (The Hermit)", icon: "🕯️", astro: "♍ Başak", element: "Toprak", chakra: "Taç Çakra", power: "Evrensel Bilgelik & Ruhsal Işık", desc: "Pisagor 9 sayısı tamamlanmayı, hümanizmi ve yüksek bilinci simgeler. Ermiş arketipi sizi kendi iç ışığını bulmuş ve insanlığa yol gösteren bir rehber kılar." },
        11: { num: 11, name: "XI. Adalet (Master 11 / Justice)", icon: "⚖️", astro: "♎ Terazi", element: "Hava", chakra: "Üçüncü Göz / Taç", power: "Üstat Sezgi, Kozmik Denge & Adalet", desc: "Üstat Sayı 11, yüksek ilahi kanallığı ve mutlak hakikati simgeler. Adalet kartı evrensel karma yasalarını dünyada tesis etme misyonu yükler." },
        22: { num: 22, name: "0/XXII. Joker & Büyük Mimar (Master 22)", icon: "🎒", astro: "♅ Uranüs", element: "Hava", chakra: "Tüm Çakralar", power: "Büyük Mimar, Sınırsız Vizyon & Dünya İnşası", desc: "Üstat Sayı 22, en büyük hayalleri fiziksel gerçekliğe dökebilen küresel mimarları simgeler. Joker ve Dünya senteziyle imkansızı başarırsınız." }
    };

    const d = new Date(dStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    // Pisagor Hayat Yolu Toplamı (Tek haneli ve Master 11, 22 kontrolü)
    function digitSum(n) {
        let s = 0;
        n.toString().split('').forEach(ch => s += parseInt(ch));
        return s;
    }

    let total = digitSum(day) + digitSum(month) + digitSum(year);
    while (total > 9 && total !== 11 && total !== 22) {
        total = digitSum(total);
    }

    const nInfo = numerologyArcana[total] || numerologyArcana[digitSum(total)];

    const heroHtml = `
        <div class="hc-tarot-hero-card">
            <div class="hc-tarot-badge">🔢 Hayat Yolu Sayınız: ${nInfo.num} ${nInfo.num >= 11 ? '(Üstat Sayı / Master Number)' : ''}</div>
            <div class="hc-tarot-title">${nInfo.icon} ${nInfo.name}</div>
            <p class="hc-tarot-sub">Kozmik Rezonans: <strong>${nInfo.power}</strong></p>
        </div>
    `;

    const cardsHtml = `
        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">🪐 Astrolojik & Çakra Rezonansı</div>
            <div class="hc-tarot-card-name">${nInfo.astro} | ${nInfo.element}</div>
            <p class="hc-tarot-card-p">Baskın Enerji Merkezi: <strong>${nInfo.chakra}</strong></p>
        </div>

        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">⚡ Süper Gücünüz</div>
            <div class="hc-tarot-card-name">${nInfo.power}</div>
            <p class="hc-tarot-card-p">${nInfo.desc}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Numerolojik Yaşam Kodunuz:</strong> Doğum tarihinizdeki sayıların toplam titreşimi olan <strong>${nInfo.num}</strong> sayısı, Tarot'un <strong>${nInfo.name}</strong> kartıyla doğrudan rezonansa girer.</p>
        <p><strong>Kader Tavsiyesi:</strong> Kendi sayısal titreşiminizi (${nInfo.power}) kabul edip hayatınızın merkezine yerleştirdiğinizde, evrensel eşzamanlılıklar ve bereket kapıları ardına kadar açılır.</p>
    `;

    document.getElementById('hc-tnc-hero').innerHTML = heroHtml;
    document.getElementById('hc-tnc-cards').innerHTML = cardsHtml;
    document.getElementById('hc-tnc-desc').innerHTML = descHtml;

    document.getElementById('hc-tarot-numeroloji-karti-result').classList.add('visible');
    document.getElementById('hc-tarot-numeroloji-karti-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

