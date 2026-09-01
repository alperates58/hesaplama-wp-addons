let hcKtcActiveMode = 'daily';

function hcKtcSetMode(mode) {
    hcKtcActiveMode = mode;
    document.getElementById('hc-ktc-btn-daily').classList.toggle('active', mode === 'daily');
    document.getElementById('hc-ktc-btn-spread').classList.toggle('active', mode === 'spread');
}

function hcKisiselTarotHesapla() {
    const dStr = document.getElementById('hc-ktc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const dailyArcana = {
        1: { name: "I. Büyücü (The Magician)", icon: "🪄", astro: "☿️ Merkür", element: "Hava", focus: "Eyleme Geçiş & İletişim", mantra: "Bugün aklıma koyduğum her şeyi gerçekleştirecek güç ve iradeye sahibim.", advice: "Ertelemeyi bırakın, ilk adımı atın ve yeteneklerinizi sergileyin." },
        2: { name: "II. Azize (The High Priestess)", icon: "📜", astro: "🌙 Ay", element: "Su", focus: "Sezgileri Dinleme & Sükunet", mantra: "İç sesim beni her zaman en doğru ve güvenli yola ulaştırır.", advice: "Bugün acele kararlar vermeyin, sessiz kalıp işaretleri gözlemleyin." },
        3: { name: "III. İmparatoriçe (The Empress)", icon: "👑", astro: "♀️ Venüs", element: "Toprak", focus: "Bolluk, Sevgi & Kendini Şımartma", mantra: "Yaşamın tüm güzelliklerine ve sonsuz berekete kalbimi açıyorum.", advice: "Bedeninize, sevdiklerinize ve yaratıcı projelere sevgiyle zaman ayırın." },
        4: { name: "IV. İmparator (The Emperor)", icon: "🏛️", astro: "♈ Koç", element: "Ateş", focus: "Disiplin & Kontrolü Ele Alma", mantra: "Kendi hayatımın lideriyim, düzen ve kararlılıkla ilerliyorum.", advice: "Sınırlarınızı net çizin, planınıza sadık kalın ve ertelemeyin." },
        5: { name: "V. Aziz (The Hierophant)", icon: "⛪", astro: "♉ Boğa", element: "Toprak", focus: "Öğrenme, Rehberlik & Güvenli Adımlar", mantra: "Kadim bilgelik ve doğru ahlak yolumu aydınlatıyor.", advice: "Bir bilenden akıl alın veya köklü, denenmiş yöntemleri uygulayın." },
        6: { name: "VI. Aşıklar (The Lovers)", icon: "💖", astro: "♊ İkizler", element: "Hava", focus: "Kalp Seçimi & Uyumlu İlişkiler", mantra: "Tüm ilişkilerimde dürüstlüğü, sevgiyi ve dengeyi seçiyorum.", advice: "Seçimlerinizi korkuyla değil, kalbinizin gerçek arzusuyla yapın." },
        7: { name: "VII. Araba (The Chariot)", icon: "🛡️", astro: "♋ Yengeç", element: "Su", focus: "Zafer & Kararlılıkla İlerleme", mantra: "Hiçbir engel kararlılığımı ve inancımı sarsamaz.", advice: "Dağılmayın, tek bir önceliğe odaklanın ve sonuca ulaşın." },
        8: { name: "VIII. Güç (Strength)", icon: "🦁", astro: "♌ Aslan", element: "Ateş", focus: "Sabır, Nezaket & İçsel Huzur", mantra: "Öfkeyi ve korkuyu sevginin şefkatli gücüyle eritiyorum.", advice: "Zor durumları sertlikle değil, zarafet ve sabırla yönetin." },
        9: { name: "IX. Ermiş (The Hermit)", icon: "🕯️", astro: "♍ Başak", element: "Toprak", focus: "İçsel Muhakeme & Sadeleşme", mantra: "Sessizlikte kendi ruhumun berrak ışığını buluyorum.", advice: "Gürültüden uzaklaşın, kendinizle baş başa kalıp derin nefes alın." },
        10: { name: "X. Kader Çarkı (Wheel of Fortune)", icon: "🎡", astro: "♃ Jüpiter", element: "Ateş", focus: "Kadersel Şans & Değişime Uyum", mantra: "Evrenin akışına güveniyorum, her değişim beni yükseltiyor.", advice: "Günün getireceği beklenmedik sürprizlere ve yeni kapılara açık olun." },
        11: { name: "XI. Adalet (Justice)", icon: "⚖️", astro: "♎ Terazi", element: "Hava", focus: "Denge, Dürüstlük & Net Kararlar", mantra: "Düşüncelerimde, sözlerimde ve eylemlerimde hakkaniyetliyim.", advice: "Objektif olun, duygusal fevrilikten uzak durup mantıklı adım atın." },
        12: { name: "XII. Asılan Adam (The Hanged Man)", icon: "🌿", astro: "🌊 Su", element: "Su", focus: "Farklı Bakış Açısı & Teslimiyet", mantra: "Akışa direnmeyi bırakıyor, olayları yeni bir gözle görüyorum.", advice: "Israr etmeyin, bazı şeyleri zamana bırakmak en doğru çözümdür." },
        13: { name: "XIII. Ölüm (Death)", icon: "🦅", astro: "♏ Akrep", element: "Su", focus: "Yenilenme & Eskiyi Geride Bırakma", mantra: "Bana hizmet etmeyen her şeyi huzurla bırakıyor, yenileniyorum.", advice: "Biten bir şeye tutunmayın; yeni bir güzellik başlamak üzere." },
        14: { name: "XIV. Denge (Temperance)", icon: "🕊️", astro: "♐ Yay", element: "Ateş", focus: "Ölçülülük, Şifa & Huzur", mantra: "Bedenim, zihnim ve ruhum kusursuz bir uyum içindedir.", advice: "Aşırılıklardan kaçının, sakinliğinizi koruyun ve uzlaşmacı olun." },
        15: { name: "XV. Şeytan (The Devil)", icon: "🔥", astro: "♑ Oğlak", element: "Toprak", focus: "Gölgeyle Yüzleşme & Özgürleşme", mantra: "Korkularımın ve bağımlılıklarımın ötesinde tamamen özgürüm.", advice: "Sizi aşağı çeken alışkanlıkları fark edin ve kontrolü geri alın." },
        16: { name: "XVI. Yıkılan Kule (The Tower)", icon: "⚡", astro: "♂️ Mars", element: "Ateş", focus: "Uyanış & Yanılsamalardan Kurtuluş", mantra: "Yıkılan her sahte durumun ardında daha güçlü bir gerçeklik doğar.", advice: "Planlarınız değişirse paniklemeyin; bu durum sizi daha iyiye götürecek." },
        17: { name: "XVII. Yıldız (The Star)", icon: "✨", astro: "♒ Kova", element: "Hava", focus: "Umut, İlham & Şifalanma", mantra: "Evren beni seviyor ve geleceğim parlak umutlarla dolu.", advice: "Dileklerinizi dileyin, geleceğe güvenin ve ilhamınızı takip edin." },
        18: { name: "XVIII. Ay (The Moon)", icon: "🌕", astro: "♓ Balık", element: "Su", focus: "Bilinçaltı & Yanılgılardan Kaçınma", mantra: "Korkularımı aşıyor, sezgilerimin ışığıyla ilerliyorum.", advice: "Kafanızda kuruntu yapmayın; netleşmeyen konular hakkında acele etmeyin." },
        19: { name: "XIX. Güneş (The Sun)", icon: "☀️", astro: "☀️ Güneş", element: "Ateş", focus: "Saf Neşe, Başarı & Canlılık", mantra: "Işığım çevremdeki herkesi aydınlatıyor, neşe doluyum.", advice: "Gülümseyin, enerjinizi yüksek tutun ve başarınızın tadını çıkarın." },
        20: { name: "XX. Mahkeme (Judgement)", icon: "📯", astro: "🔥 Ateş", element: "Ateş", focus: "Ruhsal Uyanış & Net Bir Karar", mantra: "Geçmişi affediyor ve yeni bir farkındalıkla yola çıkıyorum.", advice: "Önemli bir kararı ertelemeyin; içinizdeki çağrıya kulak verin." },
        21: { name: "XXI. Dünya (The World)", icon: "🌍", astro: "♄ Satürn", element: "Toprak", focus: "Tamamlanma, Zafer & Bütünlük", mantra: "Yolculuğumun her anı mükemmel bir tamamlanmaya hizmet ediyor.", advice: "Bir görevi başarıyla bitirin ve kendinizi kutlayın." },
        22: { name: "0. Joker (The Fool)", icon: "🎒", astro: "♅ Uranüs", element: "Hava", focus: "Cesur Başlangıç & Sonsuz İnanç", mantra: "Bilinmeze cesaretle adım atıyor, hayatın mucizelerine güveniyorum.", advice: "Önyargısız olun, yeni bir deneyime evet deyin ve anı yaşayın." }
    };

    const birthDate = new Date(dStr);
    const bSum = birthDate.getDate() + (birthDate.getMonth() + 1) + birthDate.getFullYear();

    const now = new Date();
    const nSum = now.getDate() + (now.getMonth() + 1) + now.getFullYear();

    function reduceNum(val) {
        while (val > 22) {
            let t = 0;
            val.toString().split('').forEach(v => t += parseInt(v));
            val = t;
        }
        return val === 0 ? 22 : val;
    }

    const todayCardNum = reduceNum(bSum + nSum);
    const cToday = dailyArcana[todayCardNum];

    if (hcKtcActiveMode === 'daily') {
        const heroHtml = `
            <div class="hc-tarot-hero-card">
                <div class="hc-tarot-badge">☀️ Bugünün Rehber Kartı (${now.toLocaleDateString('tr-TR')})</div>
                <div class="hc-tarot-title">${cToday.icon} ${cToday.name}</div>
                <p class="hc-tarot-sub">Günün Enerji Odağı: <strong>${cToday.focus}</strong></p>
            </div>
        `;

        const cardsHtml = `
            <div class="hc-tarot-card-box hc-tarot-span-2">
                <div class="hc-tarot-card-tag">🌟 Günün Kozmik Mesajı</div>
                <div class="hc-tarot-card-name">${cToday.focus}</div>
                <p class="hc-tarot-card-p">${cToday.advice}</p>
            </div>
        `;

        const descHtml = `
            <p><strong>Günün Olumlaması:</strong> <em>"${cToday.mantra}"</em></p>
            <p><strong>Günün Rehber Tavsiyesi:</strong> ${cToday.advice}</p>
        `;

        document.getElementById('hc-ktc-hero').innerHTML = heroHtml;
        document.getElementById('hc-ktc-cards').innerHTML = cardsHtml;
        document.getElementById('hc-ktc-desc').innerHTML = descHtml;
    } else {
        // 3 Kartlık Açılım (Geçmiş Dersi, Bugün Odağı, Gelecek Yolu)
        const pastCardNum = reduceNum(bSum + nSum - 1);
        const futureCardNum = reduceNum(bSum + nSum + 1);

        const cPast = dailyArcana[pastCardNum];
        const cFuture = dailyArcana[futureCardNum];

        const heroHtml = `
            <div class="hc-tarot-hero-card">
                <div class="hc-tarot-badge">🃏 3 Kartlık Zaman Çizelgesi Açılımı</div>
                <div class="hc-tarot-title">Geçmiş • Şimdi • Gelecek Sentezi</div>
                <p class="hc-tarot-sub">Bugünün Merkez Enerjisi: <strong>${cToday.name}</strong></p>
            </div>
        `;

        const cardsHtml = `
            <div class="hc-tarot-card-box">
                <div class="hc-tarot-card-tag">⏳ 1. Kart: Geçmişin Dersi</div>
                <div class="hc-tarot-card-name">${cPast.icon} ${cPast.name}</div>
                <p class="hc-tarot-card-p">${cPast.advice}</p>
            </div>

            <div class="hc-tarot-card-box" style="border: 2px solid #8b5cf6; background: #faf5ff;">
                <div class="hc-tarot-card-tag" style="color: #7c3aed;">☀️ 2. Kart: Bugünün Odağı</div>
                <div class="hc-tarot-card-name" style="color: #5b21b6;">${cToday.icon} ${cToday.name}</div>
                <p class="hc-tarot-card-p">${cToday.advice}</p>
            </div>

            <div class="hc-tarot-card-box">
                <div class="hc-tarot-card-tag">🔮 3. Kart: Geleceğin Rehberi</div>
                <div class="hc-tarot-card-name">${cFuture.icon} ${cFuture.name}</div>
                <p class="hc-tarot-card-p">${cFuture.advice}</p>
            </div>
        `;

        const descHtml = `
            <p><strong>Günün Olumlaması:</strong> <em>"${cToday.mantra}"</em></p>
            <p><strong>Zaman Akışı Tavsiyesi:</strong> Geçmişin (${cPast.name}) tecrübesini yanınıza alarak, bugünün (${cToday.name}) görevlerini tamamlayın; böylece geleceğin (${cFuture.name}) bereketine en hazır şekilde adım atacaksınız.</p>
        `;

        document.getElementById('hc-ktc-hero').innerHTML = heroHtml;
        document.getElementById('hc-ktc-cards').innerHTML = cardsHtml;
        document.getElementById('hc-ktc-desc').innerHTML = descHtml;
    }

    document.getElementById('hc-kisisel-tarot-karti-result').classList.add('visible');
    document.getElementById('hc-kisisel-tarot-karti-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

