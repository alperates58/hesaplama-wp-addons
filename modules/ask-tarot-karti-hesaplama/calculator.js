function hcAskTarotHesapla() {
    const d1Str = document.getElementById('hc-atc-date1').value;
    const d2Str = document.getElementById('hc-atc-date2').value;
    const stage = document.getElementById('hc-atc-stage').value;

    if (!d1Str || !d2Str) {
        alert('Lütfen her iki partnerin de doğum tarihini giriniz.');
        return;
    }

    const majorArcana = {
        1: { name: "I. Büyücü (The Magician)", icon: "🪄", astro: "☿️ Merkür", element: "Hava", loveTheme: "Yaratıcı Çekim & Birlikte İnşa Etme", desc: "İlişkinizde her şeyi mümkün kılan muazzam bir kimya ve iletişim gücü var. Birlikte sıfırdan yeni projeler ve hayaller yaratırsınız.", light: "Yüksek çekim, esprili ve dinamik iletişim, ortak hedefleri hızla gerçeğe dönüştürme.", shadow: "Manipülasyon, sözlerin arkasında durmama veya güç oyunları." },
        2: { name: "II. Azize (The High Priestess)", icon: "📜", astro: "🌙 Ay", element: "Su", loveTheme: "Telepatik & Ruhsal Derinlik", desc: "Kelimelere ihtiyaç duymadan birbirinizin hislerini anladığınız mistik ve derin bir bağ.", light: "Güçlü sezgiler, koşulsuz sadakat, sırdaşlık ve ruhsal uyum.", shadow: "Duyguları içine atma, aşırı gizem veya pasif-agresif sessizlik." },
        3: { name: "III. İmparatoriçe (The Empress)", icon: "👑", astro: "♀️ Venüs", element: "Toprak", loveTheme: "Şefkat, Bereket & Romantik Çiçeklenme", desc: "Besleyici, konforlu, cömert ve fiziksel çekimi çok yüksek bir aşk bağı.", light: "Karşılıklı şefkat, evlilik ve aile kurma potansiyeli, sanatsal ve maddi bereket.", shadow: "Aşırı sahiplenme, boğucu ilgi veya tembellik." },
        4: { name: "IV. İmparator (The Emperor)", icon: "🏛️", astro: "♈ Koç", element: "Ateş", loveTheme: "Sarsılmaz Güven & Koruyucu İstikrar", desc: "Sağlam temeller üzerine kurulu, birbirine güven veren ve sınırları net olan güçlü bir birliktelik.", light: "Sadakat, dürüstlük, koruyuculuk ve uzun vadeli kalıcılık.", shadow: "İnatçılık, kontrol kurma isteği veya katı kurallar." },
        5: { name: "V. Aziz (The Hierophant)", icon: "⛪", astro: "♉ Boğa", element: "Toprak", loveTheme: "Geleneksel Uyum & Ruhsal Öğretmenlik", desc: "Birbirinizin hayat öğretmeni olduğunuz, saygı ve ahlaki değerler üzerine kurulu bir bağ.", light: "Evlilik ve resmi taahhüt, derin saygı, birlikte olgunlaşma.", shadow: "Aşırı tutuculuk, yeniliklere kapalılık veya başkalarının ne diyeceğini fazla önemseme." },
        6: { name: "VI. Aşıklar (The Lovers)", icon: "💖", astro: "♊ İkizler", element: "Hava", loveTheme: "Kusursuz Ruh Eşi & Kalp Birliği", desc: "Karşılıklı derin hayranlık, tutku ve ahenk içeren gerçek bir ruh eşi bağı.", light: "Eşsiz romantik kimya, açık iletişim, tam kabul ve ortak değerler.", shadow: "Kararsızlık, üçüncü kişilerin gölgesi veya seçim yapmaktan kaçınma." },
        7: { name: "VII. Araba (The Chariot)", icon: "🛡️", astro: "♋ Yengeç", element: "Su", loveTheme: "Birlikte Zafer & Engelleri Aşma", desc: "İki güçlü iradenin aynı hedefe kilitlendiği, engelleri yıkan dinamik bir aşk.", light: "Ortak hedeflerde büyük başarı, kararlılık ve koruyucu tutku.", shadow: "Ego çatışmaları, kimin lider olacağı kavgası ve acelecilik." },
        8: { name: "VIII. Güç (Strength)", icon: "🦁", astro: "♌ Aslan", element: "Ateş", loveTheme: "Sabır, Nezaket & Ehlileştiren Sevgi", desc: "Öfkeyi ve kırgınlıkları sevginin yumuşak gücüyle eriten olgun ve dayanıklı bir bağ.", light: "Koşulsuz kabulleniş, derin sadakat ve tutkunun şefkatle dengelenmesi.", shadow: "Bastırılmış duygular veya gurur nedeniyle geri adım atmama." },
        9: { name: "IX. Ermiş (The Hermit)", icon: "🕯️", astro: "♍ Başak", element: "Toprak", loveTheme: "Bilgece Aşk & İçsel Büyüme", desc: "Gösterişten uzak, derin, birbirinin yalnızlığına ve alanına saygı duyan olgun bir bağ.", light: "Karakter olgunlaşması, derin sohbetler ve samimi ruh birliği.", shadow: "Duygusal mesafe, soğukluk veya aşırı içine kapanma." },
        10: { name: "X. Kader Çarkı (Wheel of Fortune)", icon: "🎡", astro: "♃ Jüpiter", element: "Ateş", loveTheme: "Kadersel Karşılaşma & Şans Döngüsü", desc: "Evrenin özel bir planla bir araya getirdiği, tesadüflerin ötesinde kadersel bir birliktelik.", light: "Birlikte gelen büyük şans, genişleyen fırsatlar ve yenilikçi enerji.", shadow: "İlişkiyi akışa bırakıp sorumluluk almamak veya ani iniş çıkışlar." },
        11: { name: "XI. Adalet (Justice)", icon: "⚖️", astro: "♎ Terazi", element: "Hava", loveTheme: "Eşitlik, Dürüstlük & Karşılıklı Denge", desc: "Hak ve adaletin gözetildiği, dürüst ve şeffaf bir ortaklık bağı.", light: "Karşılıklı saygı, açık sözlülük, mantıklı kriz çözümü ve resmi nikah.", shadow: "Aşırı eleştirel olma, duyguları ikinci plana itme veya hesap tutma." },
        12: { name: "XII. Asılan Adam (The Hanged Man)", icon: "🌿", astro: "🌊 Su", element: "Su", loveTheme: "Fedakarlık & Farklı Perspektif", desc: "Birbirinizi anlamak için olaylara alışılmışın dışında bakmayı gerektiren dönüştürücü bir aşk.", light: "Karşılıksız sevgi, egoyu bırakma ve derin empati.", shadow: "Kendini kurban rolüne sokma, erteleme veya ilişkide kilitlenme hissi." },
        13: { name: "XIII. Ölüm (Death)", icon: "🦅", astro: "♏ Akrep", element: "Su", loveTheme: "Küllerinden Doğma & Radikal Dönüşüm", desc: "İkinizi de eski benliklerinizden sıyırıp yepyeni bir seviyeye taşıyan simyasal bir aşk.", light: "Yenilenme, derin bağ, engelleri kökten temizleme ve yeniden başlama gücü.", shadow: "Geçmişe takılıp kalma, bitmesi gerekeni zorla sürdürme korkusu." },
        14: { name: "XIV. Denge (Temperance)", icon: "🕊️", astro: "♐ Yay", element: "Ateş", loveTheme: "Huzur, Uyum & Şifalı Kimya", desc: "İki farklı mizacın mükemmel bir harmoniyle birleştiği sakin ve huzur veren aşk.", light: "Sabır, duygusal şifa, ortak yaşam dengesi ve ruhsal huzur.", shadow: "Çatışmalardan kaçmak için sorunların üstünü örtme." },
        15: { name: "XV. Şeytan (The Devil)", icon: "🔥", astro: "♑ Oğlak", element: "Toprak", loveTheme: "Manyetik Tutku & Karşı Konulmaz Çekim", desc: "Aralarındaki çekimin fiziksel ve psikolojik olarak son derece yoğun olduğu tutku bağı.", light: "Çok güçlü cinsel ve duygusal çekim, birbirine karşı konulamaz arzu.", shadow: "Kıskançlık, bağımlılık, toksik alışkanlıklar ve kaybetme korkusu." },
        16: { name: "XVI. Yıkılan Kule (The Tower)", icon: "⚡", astro: "♂️ Mars", element: "Ateş", loveTheme: "Uyanış, Maskelerin Düşmesi & Gerçekler", desc: "Tüm sahte beklentileri yıkan, en saf hakikati ortaya çıkaran sarsıcı bir deneyim.", light: "Tam dürüstlük, yanılsamalardan arınma ve sarsılmaz bir temel kurma.", shadow: "Ani patlamalar, incitici sözler veya egonun getirdiği yıkımlar." },
        17: { name: "XVII. Yıldız (The Star)", icon: "✨", astro: "♒ Kova", element: "Hava", loveTheme: "Umut, İlham & Şifalanan Kalpler", desc: "Birbirine ilham veren, geleceğe umutla baktıran ve geçmiş yaraları saran kutsal bir aşk.", light: "Gelecek vizyonu, koşulsuz sevgi, iyimserlik ve ruhsal berraklık.", shadow: "Gerçek dışı beklentiler veya hayallere kapılıp somut adımları unutma." },
        18: { name: "XVIII. Ay (The Moon)", icon: "🌕", astro: "♓ Balık", element: "Su", loveTheme: "Duygusal Okyanus & Gizemli Çekim", desc: "Bilinçaltının derinliklerine inen, rüyalarla ve yüksek sezgilerle örülü bir bağ.", light: "Eşsiz romantizm, sanatsal ilham ve kalpten kalbe konuşma.", shadow: "Korkular, belirsizlikler, yanlış anlamalar ve güvensizlik kuruntuları." },
        19: { name: "XIX. Güneş (The Sun)", icon: "☀️", astro: "☀️ Güneş", element: "Ateş", loveTheme: "Saf Neşe, Aydınlık & Coşkulu Aşk", desc: "Hiçbir karanlığın barınamadığı, neşe, şeffaflık ve çocuksu mutluluk dolu bir ilişki.", light: "Büyük mutluluk, başarı, berraklık, canlılık ve bereket.", shadow: "Aşırı ilgi odağı olma yarışı veya kibir." },
        20: { name: "XX. Mahkeme (Judgement)", icon: "📯", astro: "🔥 Ateş", element: "Ateş", loveTheme: "Uyanış, Kadersel Karar & Yüksek Amaç", desc: "İlişkiyi bir üst boyuta taşıyan, affetmeyi ve yenilenmeyi sağlayan kadersel çağrı.", light: "Bağışlama, ilişkinin evlilikle taçlanması ve ortak misyon.", shadow: "Sürekli geçmiş hataları yargılama veya önyargılı olma." },
        21: { name: "XXI. Dünya (The World)", icon: "🌍", astro: "♄ Satürn", element: "Toprak", loveTheme: "Tamamlanma, Zafer & Bütünsel Aşk", desc: "Birbirinde evini bulan, ruhsal ve fiziksel olarak tam bir doyum sağlayan zirve ilişkisi.", light: "Kusursuz uyum, evlilik, ortak dünya kurma ve içsel tatmin.", shadow: "Döngüyü tamamlamaktan veya yeni bir aşamaya geçmekten çekinme." },
        22: { name: "0. Joker (The Fool)", icon: "🎒", astro: "♅ Uranüs", element: "Hava", loveTheme: "Cesur Başlangıç & Özgür Aşk", desc: "Korkusuzca kalbini açan, kurallara bağlı kalmayan ve her günü macera dolu bir aşk.", light: "Tazelik, neşe, spontane romantizm ve sonsuz olasılıklar.", shadow: "Sorumluluktan kaçma veya geleceği düşünmeden hareket etme." }
    };

    function reduceToArcana(dateStr) {
        const d = new Date(dateStr);
        let sum = d.getDate() + (d.getMonth() + 1) + d.getFullYear();
        while (sum > 22) {
            let t = 0;
            sum.toString().split('').forEach(v => t += parseInt(v));
            sum = t;
        }
        return sum === 0 ? 22 : sum;
    }

    const card1Num = reduceToArcana(d1Str);
    const card2Num = reduceToArcana(d2Str);

    let compositeNum = card1Num + card2Num;
    while (compositeNum > 22) {
        let t = 0;
        compositeNum.toString().split('').forEach(v => t += parseInt(v));
        compositeNum = t;
    }
    if (compositeNum === 0) compositeNum = 22;

    const card1 = majorArcana[card1Num];
    const card2 = majorArcana[card2Num];
    const compCard = majorArcana[compositeNum];

    // Sinerji Skoru
    let synergyScore = 80;
    if (compCard.element === "Su" || compCard.element === "Toprak") synergyScore += 10;
    if (compositeNum === 6 || compositeNum === 19 || compositeNum === 21 || compositeNum === 3) synergyScore += 8;
    if (compositeNum === 15 || compositeNum === 16) synergyScore -= 10;
    if (synergyScore > 99) synergyScore = 98;

    const heroHtml = `
        <div class="hc-tarot-hero-card">
            <div class="hc-tarot-badge">💖 Kompozit Aşk Kartınız: %${synergyScore} Uyum</div>
            <div class="hc-tarot-title">${compCard.icon} ${compCard.name}</div>
            <p class="hc-tarot-sub">İlişkinizin Ruhsal Teması: <strong>${compCard.loveTheme}</strong></p>
        </div>
    `;

    const cardsHtml = `
        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">1. Partnerin Aşk Kartı</div>
            <div class="hc-tarot-card-name">${card1.icon} ${card1.name}</div>
            <div class="hc-tarot-card-astro">${card1.astro} | ${card1.element}</div>
            <p class="hc-tarot-card-p">${card1.desc}</p>
        </div>

        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">2. Partnerin Aşk Kartı</div>
            <div class="hc-tarot-card-name">${card2.icon} ${card2.name}</div>
            <div class="hc-tarot-card-astro">${card2.astro} | ${card2.element}</div>
            <p class="hc-tarot-card-p">${card2.desc}</p>
        </div>

        <div class="hc-tarot-card-box hc-tarot-composite">
            <div class="hc-tarot-card-tag">✨ Ortak Sinerji Kartı</div>
            <div class="hc-tarot-card-name">${compCard.icon} ${compCard.name}</div>
            <div class="hc-tarot-card-astro">${compCard.astro} | ${compCard.element}</div>
            <p class="hc-tarot-card-p">${compCard.desc}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>İlişkinizin Işık Gücü (Süper Gücünüz):</strong> ${compCard.light}</p>
        <p><strong>Gölge Tuzak (Dikkat Edilmesi Gereken):</strong> ${compCard.shadow}</p>
        <p><strong>Aşk & Gelecek Rehberliği:</strong> Bu ilişki sadece iki insanın bir araya gelmesi değil, birbirinizin hayatında kadersel bir tekamül başlatmasıdır. ${stage === 'dating' ? 'Acele etmeden birbirinizi derinlemesine keşfetmeye odaklanın.' : stage === 'married' ? 'Evliliğinizde ortak amaçlar ve yenilikler yaratarak enerjiyi taze tutun.' : 'Açık iletişimle birbirinizin kalbini onurlandırın.'}</p>
    `;

    document.getElementById('hc-atc-hero').innerHTML = heroHtml;
    document.getElementById('hc-atc-cards').innerHTML = cardsHtml;
    document.getElementById('hc-atc-desc').innerHTML = descHtml;

    document.getElementById('hc-ask-tarot-karti-result').classList.add('visible');
    document.getElementById('hc-ask-tarot-karti-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

