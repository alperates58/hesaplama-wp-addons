function hcKaderHesapla() {
    const rawName = document.getElementById('hc-kader-name').value.trim();
    if (!rawName) {
        alert('Lütfen adınızı ve soyadınızı giriniz.');
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

    const cleanChars = rawName.toLocaleUpperCase('tr-TR').replace(/[^A-ZÇĞİÖŞÜ]/g, '');
    let totalSum = 0;
    for (let char of cleanChars) {
        if (pythagoreanMap[char]) totalSum += pythagoreanMap[char];
    }

    const num = reduceToSingleOrMaster(totalSum);

    const destinyDetails = {
        1: { title: "Öncü & Bağımsız Lider", planet: "☀️ Güneş", element: "Ateş", gift: "İrade, kararlılık ve sıfırdan yol açma cesareti.", mission: "Kendi ayakları üzerinde durup başkalarına cesaret ve yenilik aşılamak.", exam: "Bencillik ve inatçılıktan kaçınıp alçakgönüllü bir lider olmak." },
        2: { title: "Barışçıl Diplomat & Sezgi Ustası", planet: "🌙 Ay", element: "Su", gift: "Koşulsuz empati, arabuluculuk ve derin duygusal algı.", mission: "Zıt kutupları uzlaştırmak ve ilişkilerde kusursuz bir ahenk kurmak.", exam: "Aşırı alınganlıktan kaçınıp kendi sınırlarını korumayı öğrenmek." },
        3: { title: "Yaratıcı İlham & Neşe Elçisi", planet: "♃ Jüpiter", element: "Hava", gift: "Sanatsal vizyon, kelimelerin büyüsü ve sosyal çekim.", mission: "Dünyaya neşe, umut ve sanatsal estetik yaymak.", exam: "Enerjiyi gereksiz detaylara dağıtmayıp başladığı projeleri bitirmek." },
        4: { title: "Sağlam Temel & Usta Kurucu", planet: "♄ Satürn", element: "Toprak", gift: "Sarsılmaz disiplin, metodik akıl ve güvenilirlik.", mission: "Kalıcı sistemler, kurumlar ve güvenli limanlar inşa etmek.", exam: "Aşırı katılıktan sıyrılıp değişime esneklik göstermek." },
        5: { title: "Özgür Kaşif & Değişim Öncüsü", planet: "☿️ Merkür", element: "Hava", gift: "Hızlı adaptasyon, cesur macera ruhu ve hitabet.", mission: "Kalıpları kırmak, insanlara özgürlüğü ve yeni ufukları tanıtmak.", exam: "Maymun iştahlılıktan kaçınıp derinleşmeyi öğrenmek." },
        6: { title: "Şefkatli Koruyucu & Sevgi Mimarı", planet: "♀️ Venüs", element: "Toprak", gift: "Koşulsuz sevgi, şifacılık ve estetik anlayış.", mission: "Aileyi, toplumu ve çevreyi güzellik ve adaletle sarmalamak.", exam: "Herkesi kontrol etmeye çalışmadan, kendi ihtiyaçlarını da gözetmek." },
        7: { title: "Mistik Bilge & Hakikat Arayıcısı", planet: "♆ Neptün", element: "Su", gift: "Analitik keskinlik, derin felsefi idrak ve yüksek sezgiler.", mission: "Görünmeyenin arkasındaki hakikati bulup dünyaya aktarmak.", exam: "İnsanlardan tamamen soyutlanmayıp bilgisini paylaşmak." },
        8: { title: "Güç Yöneticisi & Bolluk Kapısı", planet: "♄ Satürn", element: "Toprak", gift: "Stratejik zeka, finansal ustalık ve büyük organizasyon gücü.", mission: "Maddi gücü manevi bir adalete ve toplumsal faydaya dönüştürmek.", exam: "Güç hırsına kapılmadan adil ve cömert kalabilmek." },
        9: { title: "Evrensel Hümanist & Bilge Işık", planet: "♂️ Mars", element: "Ateş", gift: "Kozmik merhamet, evrensel anlayış ve sanatsal ilham.", mission: "Dünyayı karşılıksız sevgiyle şifalandırmak ve eski döngüleri kapatmak.", exam: "Geçmiş kayıplara takılmadan affetmeyi ve bırakmayı bilmek." },
        11: { title: "Aydınlanmış Ruhsal Rehber (Master 11)", planet: "🌙 / ♅", element: "Hava", gift: "Kozmik sezgisel kanal, vizyonerlik ve ilham kaynağı olma.", mission: "İnsanlığın bilincini uyandırmak ve karanlığa ışık tutmak.", exam: "Aşırı duygusal fırtınaları sakinlikle yönetmeyi öğrenmek." },
        22: { title: "Büyük Usta Mimar (Master 22)", planet: "♄ / ♅", element: "Toprak", gift: "İmkansız hayalleri devasa yapılara ve sistemlere dökme gücü.", mission: "Dünyayı küresel ölçekte dönüştürecek kalıcı eserler bırakmak.", exam: "Büyük sorumluluğun getirdiği baskıyı sabırla göğüslemek." },
        33: { title: "Evrensel Şifa Öğretmeni (Master 33)", planet: "♀️ / ♆", element: "Su", gift: "Zirve merhamet, şifacı dokunuş ve saf sevgi bilinci.", mission: "Acıları dindirmek, insanlığa sevgiyi ve ruhsal bilgeliği öğretmek.", exam: "Kendini tamamen feda etmeden dengeyi korumak." }
    };

    const d = destinyDetails[num] || destinyDetails[1];

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">⭐ Kader Sayınız: ${num} ${num >= 11 ? '(Üstat Sayı / Master Number)' : ''}</div>
            <div class="hc-num-title">${d.title}</div>
            <p class="hc-num-sub">Kozmik Yönetici: <strong>${d.planet}</strong> | Element: <strong>${d.element}</strong></p>
        </div>
    `;

    const gridHtml = `
        <div class="hc-num-card-box">
            <div class="hc-num-card-tag">🎁 Doğuştan Gelen Kadersel Hediye</div>
            <p class="hc-num-card-p">${d.gift}</p>
        </div>

        <div class="hc-num-card-box" style="border-color: #fde047; background: #fefce8;">
            <div class="hc-num-card-tag" style="color: #ca8a04;">🎯 Kadersel Yaşam Misyonunuz</div>
            <p class="hc-num-card-p">${d.mission}</p>
        </div>

        <div class="hc-num-card-box" style="border-color: #fca5a5; background: #fef2f2;">
            <div class="hc-num-card-tag" style="color: #dc2626;">⚠️ Aşılması Gereken Kadersel Sınav</div>
            <p class="hc-num-card-p">${d.exam}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Kader Sayınızın Sırrı:</strong> İsminizin sayısal toplamı olan <strong>${num}</strong> sayısı, bu dünyada hangi rolde parlayacağınızı fısıldar. Bu enerjiyle uyumlandığınızda engeller kendiliğinden kalkar.</p>
        <p><strong>Ruhsal Rehberlik:</strong> ${d.mission} Kendi yolunuza inanın ve doğuştan gelen hediyenizi (${d.gift}) dünyaya sunmaktan çekinmeyin.</p>
    `;

    document.getElementById('hc-kader-hero').innerHTML = heroHtml;
    document.getElementById('hc-kader-grid').innerHTML = gridHtml;
    document.getElementById('hc-kader-desc').innerHTML = descHtml;

    document.getElementById('hc-kader-result').classList.add('visible');
    document.getElementById('hc-kader-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
