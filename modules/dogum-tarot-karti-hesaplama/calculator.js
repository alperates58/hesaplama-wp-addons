function hcDogumTarotHesapla() {
    const dStr = document.getElementById('hc-tbc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const majorArcana = {
        1: { name: "I. Büyücü (The Magician)", icon: "🪄", astro: "☿️ Merkür", element: "Hava", title: "Yaratıcı Zeka & Başlangıçlar", desc: "Zihinsel çeviklik, odaklanma gücü ve düşünceleri fiziksel gerçeğe dönüştürme yeteneği.", lifeMission: "Kendi gerçekliğinizi sıfırdan inşa etmek, iletişim ve yenilikçi projelerle dünyaya öncülük etmek.", shadow: "Kibrine yenik düşme, manipülasyon veya yeteneklerini dağıtıp hiçbirini bitirememe." },
        2: { name: "II. Azize (The High Priestess)", icon: "📜", astro: "🌙 Ay", element: "Su", title: "Mistik Sezgi & İçsel Bilgelik", desc: "Görünmeyeni görme, derin sezgiler, sükunet ve bilinçaltı sırlarına hakimiyet.", lifeMission: "Görünmeyen ruhsal kapıları aralamak, sezgilerin sesine güvenerek derin hakikatleri korumak.", shadow: "Aşırı gizem, kendini dış dünyadan soyutlama ve duygularını bastırma." },
        3: { name: "III. İmparatoriçe (The Empress)", icon: "👑", astro: "♀️ Venüs", element: "Toprak", title: "Bolluk, Yaratıcılık & Şefkat", desc: "Yaşam enerjisini büyüten, sanatsal, üretken ve koşulsuz besleyici aura.", lifeMission: "Güzellik, sanat, doğurganlık ve sevgiyle dünyayı bereketlendirmek.", shadow: "Tembellik, aşırı sahiplenme veya maddiyata bağımlılık." },
        4: { name: "IV. İmparator (The Emperor)", icon: "🏛️", astro: "♈ Koç", element: "Ateş", title: "Düzen, Liderlik & Otorite", desc: "Kaosu nizama çeviren, sarsılmaz irade, koruyuculuk ve stratejik güç.", lifeMission: "Kalıcı yapılar, kurumlar ve güvenli sistemler inşa ederek insanları organize etmek.", shadow: "Katı inatçılık, tahammülsüzlük veya aşırı baskı kurma eğilimi." },
        5: { name: "V. Aziz (The Hierophant)", icon: "⛪", astro: "♉ Boğa", element: "Toprak", title: "Ruhsal Rehberlik & Gelenek", desc: "Evrensel ilkeleri öğreten, ahlaki pusula, bilgelik ve toplumsal uyum.", lifeMission: "Kadim bilgileri modernize edip başkalarına aktarmak ve ruhsal köprü olmak.", shadow: "Dogmatizm, yeniliklere körü körüne karşı çıkma veya kalıplara sıkışma." },
        6: { name: "VI. Aşıklar (The Lovers)", icon: "💖", astro: "♊ İkizler", element: "Hava", title: "Kalp Seçimi, Uyum & Bütünleşme", desc: "Aşk, estetik değerler, samimi ortaklıklar ve kalbin yolunu seçme cesareti.", lifeMission: "Zıtlıkları bir araya getirip kusursuz bir uyum ve sevgi bağı yaratmak.", shadow: "Kararsızlık, sürekli dışarıdan onay bekleme veya yüzeysellik." },
        7: { name: "VII. Araba (The Chariot)", icon: "🛡️", astro: "♋ Yengeç", element: "Su", title: "Zafer, Kararlılık & İrade Gücü", desc: "Zıt duyguları ehlileştirip hedefe kilitlenen, engelleri yıkan savaşçı ruh.", lifeMission: "Kendi hayatının sürücü koltuğuna geçip büyük hedefleri kararlılıkla fethetmek.", shadow: "Duygusal patlamalar, aşırı hız veya başkalarını ezerek ilerleme riski." },
        8: { name: "VIII. Güç (Strength)", icon: "🦁", astro: "♌ Aslan", element: "Ateş", title: "Şefkatli Cesaret & İçsel Ehlileştirme", desc: "Zorlukları kaba kuvvetle değil, sevgi, sabır ve asil bir duruşla dönüştürme.", lifeMission: "Kendi içindeki vahşi tutkuları şefkatle dönüştürüp dünyaya ilham vermek.", shadow: "Öfke patlamaları veya gurur nedeniyle yardım istemekten çekinme." },
        9: { name: "IX. Ermiş (The Hermit)", icon: "🕯️", astro: "♍ Başak", element: "Toprak", title: "İçsel Işık & Hakikat Arayışı", desc: "Sessizlikte olgunlaşan bilgelik, derin araştırma ve yalnızlığın gücü.", lifeMission: "Kendi iç fenerini yakarak karanlıkta yürüyenlere rehberlik etmek.", shadow: "İnsanlardan tamamen kaçma, kibirli izolasyon veya aşırı eleştirellik." },
        10: { name: "X. Kader Çarkı (Wheel of Fortune)", icon: "🎡", astro: "♃ Jüpiter", element: "Ateş", title: "Döngüler, Şans & Kadersel Fırsatlar", desc: "Evrenin ritmini kavrama, şans kapılarını açma ve değişime hızla adapte olma.", lifeMission: "Hayatın iniş çıkışlarını bilgelikle yönetip fırsatları yakalamak.", shadow: "Her şeyi kadere bağlayıp tembelleşmek veya kontrol takıntısı." },
        11: { name: "XI. Adalet (Justice)", icon: "⚖️", astro: "♎ Terazi", element: "Hava", title: "Hakikat, Denge & Karma", desc: "Sebep-sonuç yasalarını anlama, dürüstlük, netlik ve tarafsız muhakeme.", lifeMission: "Hayatta her konuda adaleti, eşitliği ve berrak hakikati savunmak.", shadow: "Acımasız yargılama, kusur arama veya empati yoksunluğu." },
        12: { name: "XII. Asılan Adam (The Hanged Man)", icon: "🌿", astro: "🌊 Su", element: "Su", title: "Aydınlanma & Teslimiyet", desc: "Egoyu askıya alarak olaylara bambaşka bir açıdan bakabilme derinliği.", lifeMission: "Maddi dünyanın illüzyonlarını aşıp yüksek ruhsal farkındalığa ulaşmak.", shadow: "Kurban psikolojisine girme, kendini feda etme veya eylemsizlik." },
        13: { name: "XIII. Ölüm (Death)", icon: "🦅", astro: "♏ Akrep", element: "Su", title: "Yenilenme, Dönüşüm & Küllerinden Doğuş", desc: "Miadı dolmuş her şeyi cesurca bırakıp yepyeni bir sayfa açma gücü.", lifeMission: "Eskimiş yapıları temizleyip köklü ve taze başlangıçlara öncülük etmek.", shadow: "Değişime direnmek, geçmişe takılı kalmak veya sonlanmalardan korkmak." },
        14: { name: "XIV. Denge (Temperance)", icon: "🕊️", astro: "♐ Yay", element: "Ateş", title: "Şifa, Ölçülülük & Harmoni", desc: "Farklı kutupları bir potada eriterek şifa ve huzur yaratma ustalığı.", lifeMission: "Aşırılıklardan uzak kalarak dinginlik, denge ve şifa enerjisini yaymak.", shadow: "Sorunları erteleme, aşırı konfor alanında kalma veya tutkusuzluk." },
        15: { name: "XV. Şeytan (The Devil)", icon: "🔥", astro: "♑ Oğlak", element: "Toprak", title: "Gölgeyle Yüzleşme & Maddi Güç", desc: "Bilinçaltı zincirlerini fark edip dünyevi hırsları büyük bir yaratıcı güce çevirme.", lifeMission: "İçindeki gölgeyle dost olup illüzyon zincirlerini kırarak tam özgürleşmek.", shadow: "Maddiyata, güce veya bağımlılıklara köle olma riski." },
        16: { name: "XVI. Yıkılan Kule (The Tower)", icon: "⚡", astro: "♂️ Mars", element: "Ateş", title: "Radikal Uyanış & Gerçeğin Işığı", desc: "Sahte yapıları yıkarak en saf ve sarsılmaz hakikati ortaya çıkarma.", lifeMission: "Yanılsamaları parçalayıp insanları gerçek özgürlükle buluşturmak.", shadow: "Öfke patlamaları veya kontrolü kaybetme korkusu." },
        17: { name: "XVII. Yıldız (The Star)", icon: "✨", astro: "♒ Kova", element: "Hava", title: "İlham, Umut & Kozmik Şifa", desc: "Geleceğe ışık tutan, tükenmeyen inanç, saf niyet ve evrensel rehberlik.", lifeMission: "En karanlık gecede bile insanlara umut, şifa ve yaratıcı ilham aşılamak.", shadow: "Gerçeklikten kopuk hayallere dalma veya kendini izole etme." },
        18: { name: "XVIII. Ay (The Moon)", icon: "🌕", astro: "♓ Balık", element: "Su", title: "Derin Bilinçaltı & Rüyalar", desc: "Sezgilerin okyanusu, yaratıcı hayal gücü ve gizemli dünyalara kapı açma.", lifeMission: "Korkularla yüzleşip bilinçaltı hazinelerini sanata ve bilgeliğe dökmek.", shadow: "Evham, kuruntu, belirsizlikler içinde kaybolma veya aldanma." },
        19: { name: "XIX. Güneş (The Sun)", icon: "☀️", astro: "☀️ Güneş", element: "Ateş", title: "Başarı, Neşe & Saf Canlılık", desc: "Çevresini ısıtan, karanlığı aydınlatan çocuksu coşku ve sınırsız başarı.", lifeMission: "Neşe, samimiyet ve ışık saçarak yaşamı kutlamak.", shadow: "Ego patlamaları, kibir veya her an ilgi odağı olma arzusu." },
        20: { name: "XX. Mahkeme (Judgement)", icon: "📯", astro: "🔥 Ateş", element: "Ateş", title: "Ruhsal Uyanış & Yeniden Doğuş", desc: "Kozmik çağrıyı duyma, geçmişi bağışlama ve yüksek amaca adım atma.", lifeMission: "Kendi uyanışını yaşayıp başkalarının da potansiyeline uyanmasına öncülük etmek.", shadow: "Sürekli kendini veya başkalarını acımasızca yargılama." },
        21: { name: "XXI. Dünya (The World)", icon: "🌍", astro: "♄ Satürn", element: "Toprak", title: "Bütünlük, Tamamlanma & Kozmik Zafer", desc: "Tüm hayat derslerini başarıyla tamamlayıp evrenle bir olma tatmini.", lifeMission: "Kişisel potansiyelini zirveye ulaştırıp küresel fayda ve huzur yaratmak.", shadow: "Döngüyü kapatmaktan korkma veya konfor alanına hapsolma." },
        22: { name: "0. Joker (The Fool)", icon: "🎒", astro: "♅ Uranüs", element: "Hava", title: "Sonsuz Potansiyel & Masumiyet", desc: "Korkusuzca bilinmeze atlayan, kalıpları yıkan ve saf inançla yaşayan ruh.", lifeMission: "Önyargısızca yeni yollar açmak ve hayatı kutsal bir macera olarak yaşamak.", shadow: "Sorumsuzluk, düşüncesiz riskler veya tecrübelerden ders çıkarmama." }
    };

    const d = new Date(dStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    // 1. Kişilik Kartı (Personality Card)
    let sum1 = day + month + year;
    while (sum1 > 22) {
        let t = 0;
        sum1.toString().split('').forEach(digit => t += parseInt(digit));
        sum1 = t;
    }
    const personalityNum = sum1 === 0 ? 22 : sum1;

    // 2. Ruh Kartı (Soul Card) - Mary K. Greer metodolojisi
    let sum2 = personalityNum;
    if (sum2 > 9 && sum2 !== 19 && sum2 !== 22) {
        let t = 0;
        sum2.toString().split('').forEach(digit => t += parseInt(digit));
        sum2 = t;
    } else if (sum2 === 19) {
        sum2 = 10; // 19 Güneş -> 10 Kader Çarkı -> 1 Büyücü zinciri
    }
    const soulNum = sum2 === 0 ? 22 : sum2;

    const pCard = majorArcana[personalityNum];
    const sCard = majorArcana[soulNum];

    const heroHtml = `
        <div class="hc-tarot-hero-card">
            <div class="hc-tarot-badge">✨ Doğum Arkana Kartınız: ${pCard.name}</div>
            <div class="hc-tarot-title">${pCard.icon} ${pCard.title}</div>
            <p class="hc-tarot-sub">Kozmik Element: <strong>${pCard.element}</strong> | Astrolojik Rezonans: <strong>${pCard.astro}</strong></p>
        </div>
    `;

    const cardsHtml = `
        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">🌍 Kişilik Kartınız (Dış Dünyadaki Rolünüz)</div>
            <div class="hc-tarot-card-name">${pCard.icon} ${pCard.name}</div>
            <div class="hc-tarot-card-astro">${pCard.astro} | ${pCard.element}</div>
            <p class="hc-tarot-card-p">${pCard.desc}</p>
        </div>

        <div class="hc-tarot-card-box ${soulNum !== personalityNum ? 'hc-tarot-soul-special' : ''}">
            <div class="hc-tarot-card-tag">🕊️ Ruh Kartınız (İçsel Evren & Tekamül Amacı)</div>
            <div class="hc-tarot-card-name">${sCard.icon} ${sCard.name}</div>
            <div class="hc-tarot-card-astro">${sCard.astro} | ${sCard.element}</div>
            <p class="hc-tarot-card-p">${sCard.lifeMission}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Kişilik Kartınızın Yaşam Görevi:</strong> ${pCard.lifeMission}</p>
        <p><strong>Gölge Yanınız (Aşılması Gereken Sınav):</strong> ${pCard.shadow}</p>
        <p><strong>Ruhsal Evrim Tavsiyesi:</strong> Kişilik kartınız dünyevi sahnede nasıl parladığınızı, Ruh kartınız ise sessizlikte ruhunuzun neyi arzuladığını fısıldar. Bu iki arketipi hayatınızda birleştirdiğinizde gerçek içsel huzura ulaşırsınız.</p>
    `;

    document.getElementById('hc-tbc-hero').innerHTML = heroHtml;
    document.getElementById('hc-tbc-cards').innerHTML = cardsHtml;
    document.getElementById('hc-tbc-desc').innerHTML = descHtml;

    document.getElementById('hc-dogum-tarot-karti-result').classList.add('visible');
    document.getElementById('hc-dogum-tarot-karti-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

