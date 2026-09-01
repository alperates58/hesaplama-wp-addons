function hcTarotRuhHesapla() {
    const dStr = document.getElementById('hc-trc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const soulArcana = {
        1: { name: "I. Büyücü (The Magician)", icon: "🪄", astro: "☿️ Merkür", element: "Hava", soulTheme: "Sonsuz Yaratım & Maddi-Ruhsal Köprü", karmicMission: "Düşüncelerin yaratıcı gücünü keşfedip, evrensel enerjiyi dünyada iyilik ve inovasyon için kanalize etmek.", meditation: "Nefes ve odaklanma meditasyonları; 'Zihnim evrenle birdir' mantrası.", shadowExam: "Kibrin tuzağına düşmeden, yeteneklerini bencilce değil kolektif faydaya adamak." },
        2: { name: "II. Azize (The High Priestess)", icon: "📜", astro: "🌙 Ay", element: "Su", soulTheme: "Kozmik Hafıza & Mistik Sezgi", karmicMission: "Görünmeyen alemlerin bilgisini korumak, sezgilerin sesine koşulsuz güvenmek ve derin ruhsal sükuneti yaymak.", meditation: "Ay ışığı ve sessizlik inzivaları; rüya günlükleri tutmak.", shadowExam: "Duyguları bastırıp buz gibi bir mesafeye sığınmaktan kaçınmak." },
        3: { name: "III. İmparatoriçe (The Empress)", icon: "👑", astro: "♀️ Venüs", element: "Toprak", soulTheme: "Evrensel Sevgi, Şefkat & Bereket", karmicMission: "Dünyayı güzelleştirmek, doğayla tam bir bağ kurmak ve karşılıksız sevgiyi her canlıya ulaştırmak.", meditation: "Doğada topraklanma ve kalp çakrası şifa çalışmaları.", shadowExam: "Sevgi verirken kendini tüketmemek ve bağımlılık geliştirmemek." },
        4: { name: "IV. İmparator (The Emperor)", icon: "🏛️", astro: "♈ Koç", element: "Ateş", soulTheme: "İlahi Düzen & Koruyucu Güç", karmicMission: "Kaotik enerjileri ilahi bir düzene oturtmak, güçsüzleri korumak ve kalıcı bir miras bırakmak.", meditation: "Köklenme meditasyonları ve omurga hizalama pratikleri.", shadowExam: "Otoriteyi baskı değil, adil ve şefkatli bir koruyuculuk olarak kullanmak." },
        5: { name: "V. Aziz (The Hierophant)", icon: "⛪", astro: "♉ Boğa", element: "Toprak", soulTheme: "Kutsal Öğretmenlik & Ruhsal Köprü", karmicMission: "Evrensel hakikatleri insan diline çevirip aktarmak, ruhsal topluluklara rehberlik etmek.", meditation: "Kadim mantralar, kutsal metin okumaları ve dua.", shadowExam: "Dogmalara saplanmadan, ruhun özgür deneyimine alan açmak." },
        6: { name: "VI. Aşıklar (The Lovers)", icon: "💖", astro: "♊ İkizler", element: "Hava", soulTheme: "Bütünleşme & Koşulsuz Kalp Birliği", karmicMission: "İçsel eril ve dişil enerjileri dengeleyerek evrensel birliğin (Monad) sevgisini deneyimlemek.", meditation: "İkiz alev ve içsel denge meditasyonları.", shadowExam: "Sürekli dışarıda ruh eşi aramak yerine önce kendi içinde tam olmak." },
        7: { name: "VII. Araba (The Chariot)", icon: "🛡️", astro: "♋ Yengeç", element: "Su", soulTheme: "İçsel Zafer & Ruhsal İrade", karmicMission: "Nefsin zıt arzularını yüksek benliğin emrine vererek tekamül yolunda hızla yükselmek.", meditation: "Işık kalkanı görselleştirmeleri ve irade güçlendirme çalışmaları.", shadowExam: "Duygusal savunma zırhını indirip kalbini kırılganlığa açabilmek." },
        8: { name: "VIII. Güç (Strength)", icon: "🦁", astro: "♌ Aslan", element: "Ateş", soulTheme: "Ehlileştirici Şefkat & Asil Kalp", karmicMission: "Korkuyu ve öfkeyi sevginin yumuşak dokunuşuyla şifalandırmak, asil bir duruş sergilemek.", meditation: "İçsel hayvan arketipiyle barışma ve şefkat (Metta) meditasyonları.", shadowExam: "Gurur ve üstünlük duygusunu bırakıp tam alçakgönüllülüğe ulaşmak." },
        9: { name: "IX. Ermiş (The Hermit)", icon: "🕯️", astro: "♍ Başak", element: "Toprak", soulTheme: "Hakikat Işığı & Ruhsal Olgunluk", karmicMission: "Karanlıkta yürüyen ruhlara kendi feneriyle yol göstermek, bilgeliği damıtmak.", meditation: "Zazen (Sessiz oturma) ve derin tefekkür inzivaları.", shadowExam: "Yalnızlığı bir kaçış değil, insanlığa hizmet edecek bir güç kaynağı olarak yaşamak." }
    };

    const d = new Date(dStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    let birthSum = day + month + year;
    while (birthSum > 22) {
        let t = 0;
        birthSum.toString().split('').forEach(v => t += parseInt(v));
        birthSum = t;
    }

    let soulSum = birthSum;
    while (soulSum > 9) {
        let t = 0;
        soulSum.toString().split('').forEach(v => t += parseInt(v));
        soulSum = t;
    }
    if (soulSum === 0) soulSum = 9;

    const s = soulArcana[soulSum] || soulArcana[9];

    const heroHtml = `
        <div class="hc-tarot-hero-card">
            <div class="hc-tarot-badge">🕊️ Ruh Kartınız: ${s.name}</div>
            <div class="hc-tarot-title">${s.icon} ${s.soulTheme}</div>
            <p class="hc-tarot-sub">Kozmik Element: <strong>${s.element}</strong> | Astrolojik Rezonans: <strong>${s.astro}</strong></p>
        </div>
    `;

    const cardsHtml = `
        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">✨ Reenkarnasyonel / Karmik Amaç</div>
            <div class="hc-tarot-card-name">Ruhun Yaşam Görevi</div>
            <p class="hc-tarot-card-p">${s.karmicMission}</p>
        </div>

        <div class="hc-tarot-card-box">
            <div class="hc-tarot-card-tag">🧘 Meditasyon & Şifa Odağı</div>
            <div class="hc-tarot-card-name">Frekans Yükseltme Pratiği</div>
            <p class="hc-tarot-card-p">${s.meditation}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Tekamül Sınavınız (Gölge Yüzleşmesi):</strong> ${s.shadowExam}</p>
        <p><strong>Yüksek Benlik Mesajı:</strong> Ruh kartınız, bu dünyaya gelirken ruhunuzun seçtiği ana frekansı temsil eder. Günlük hayatın telaşından sıyrılıp bu arketipin bilgeliğine kulak verdiğinizde yolunuz kendiliğinden aydınlanır.</p>
    `;

    document.getElementById('hc-trc-hero').innerHTML = heroHtml;
    document.getElementById('hc-trc-cards').innerHTML = cardsHtml;
    document.getElementById('hc-trc-desc').innerHTML = descHtml;

    document.getElementById('hc-tarot-ruh-karti-result').classList.add('visible');
    document.getElementById('hc-tarot-ruh-karti-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

