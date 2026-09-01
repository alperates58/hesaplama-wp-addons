function hcTarotYilHesapla() {
    const dStr = document.getElementById('hc-tyc-date').value;
    const targetYear = parseInt(document.getElementById('hc-tyc-year').value, 10);

    if (!dStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const yearArcana = {
        1: { name: "I. Büyücü (The Magician)", icon: "🪄", astro: "☿️ Merkür", element: "Hava", mainTheme: "Yepyeni Başlangıçlar & İnisiyatif", q1: "Tohum ekme, yeni fikirler geliştirme ve ilk adımı atma dönemi.", q2: "İletişim ağını genişletme, projeleri sahneye çıkarma ve görünürlük.", q3: "Yaratıcı üretkenliğin zirvesi, maddi ve mesleki fırsat kapıları.", q4: "Yılın kazanımlarını somutlaştırma ve yeni vizyon belirleme.", love: "Yeni bir aşka yelken açma veya ilişkide yepyeni dinamikler başlatma zamanı.", career: "Kendi işini kurmak, yeni bir pozisyona geçmek veya büyük bir projeyi başlatmak için en ideal yıl." },
        2: { name: "II. Azize (The High Priestess)", icon: "📜", astro: "🌙 Ay", element: "Su", mainTheme: "İçsel Büyüme & Sezgisel Bekleyiş", q1: "İçe çekilme, planları gizli tutma ve işaretleri izleme dönemi.", q2: "Eğitim, ruhsal pratikler ve gizli fırsatların olgunlaşması.", q3: "Sezgilerin test edilmesi, sabrın karşılığını alma.", q4: "Sırların açığa çıkması ve içsel dinginliğin meyveleri.", love: "Sessiz, derin ve telepatik bağların güçlendiği bir dönem.", career: "Perde arkasında strateji üretmek, araştırma yapmak ve aceleci risklerden kaçınmak gereken yıl." },
        3: { name: "III. İmparatoriçe (The Empress)", icon: "👑", astro: "♀️ Venüs", element: "Toprak", mainTheme: "Bolluk, Bereket & Romantik Çiçeklenme", q1: "Yaratıcı tohumların filizlenmesi, konfor ve estetik odaklı adımlar.", q2: "Sosyal çevre, aşk ve sanatsal üretimde hızlı büyüme.", q3: "Maddi kazançların artması, evlilik veya ailevi kutlamalar.", q4: "Büyük şükran, huzur ve bereket dolu bir tamamlanma.", love: "Evlilik, aile genişlemesi ve romantizmin zirve yaptığı aşk yılı.", career: "Yaratıcılık gerektiren projelerde büyük kazanç ve takdir toplama." },
        4: { name: "IV. İmparator (The Emperor)", icon: "🏛️", astro: "♈ Koç", element: "Ateş", mainTheme: "Disiplin, Düzen & Kalıcı Yapılar", q1: "Bütçe ve kariyer hedeflerini katı kurallarla yapılandırma.", q2: "Otorite figürleriyle müzakereler, liderlik sorumlulukları alma.", q3: "Sarsılmaz bir finansal ve mesleki temel inşa etme.", q4: "Genişleyen etki alanı ve güçlü kurumsal başarı.", love: "Geleceğe yönelik ciddi adımlar, güven ve bağlılık odaklı dönem.", career: "Yöneticilik, terfi, kendi şirketinde sağlam hiyerarşi kurma yılı." },
        5: { name: "V. Aziz (The Hierophant)", icon: "⛪", astro: "♉ Boğa", element: "Toprak", mainTheme: "Eğitim, Değerler & Ruhsal Rehberlik", q1: "Yeni bir uzmanlık öğrenme veya mentörlük alma başlangıcı.", q2: "Geleneksel kurumlarla iş birliği, yasal/resmi anlaşmalar.", q3: "Toplumsal saygınlık, sertifikasyon veya diplomalar.", q4: "Başkalarına yol gösteren bilge bir rehbere dönüşme.", love: "Resmiyet, nişan/düğün veya ilişkiyi geleneksel temellere oturtma.", career: "Akademik başarı, kurumsal terfi ve etik değerlerle yükselme." },
        6: { name: "VI. Aşıklar (The Lovers)", icon: "💖", astro: "♊ İkizler", element: "Hava", mainTheme: "Kritik Seçimler, Aşk & Kalp Birliği", q1: "İkilemlerle yüzleşme ve kalbin gerçek sesini dinleme.", q2: "İkili ilişkilerde ve ortaklıklarda önemli taahhütler.", q3: "Kaderi şekillendiren seçimlerin sonuçlarını yaşama.", q4: "Kusursuz denge ve huzurlu duygusal birliktelik.", love: "Ruh eşiyle tanışma veya ilişkide en önemli yol ayrımı kararı.", career: "Kilit ortaklıklar kurma, müzakereler ve diplomatik başarılar." },
        7: { name: "VII. Araba (The Chariot)", icon: "🛡️", astro: "♋ Yengeç", element: "Su", mainTheme: "Hızlı İlerleme, Zafer & Engelleri Aşma", q1: "Hedefe kilitlenme, motivasyon patlaması ve hazırlık.", q2: "Saha çalışmaları, seyahatler ve yoğun operasyonel tempo.", q3: "Rakipleri geride bırakma, büyük hedefe ulaşma.", q4: "Kazanılan zaferin meyvelerini toplama ve dinlenme.", love: "Birlikte seyahatler, ortak engelleri aşarak kenetlenme.", career: "Taşınma, şirket değiştirme, uluslararası başarı ve zafer yılı." },
        8: { name: "VIII. Güç (Strength)", icon: "🦁", astro: "♌ Aslan", element: "Ateş", mainTheme: "İçsel Cesaret & Sevgiyle Ehlileştirme", q1: "Korkularla yüzleşme, sabır ve dinginlik geliştirme.", q2: "Zorlu insanları ve krizleri nezaketle yönetme.", q3: "İçsel özgüvenin parlaması, zorlukları aşma.", q4: "Sarsılmaz bir itibar ve iç huzura erişme.", love: "Kırgınlıkları sevgi ve sabırla eriterek bağı güçlendirme.", career: "Krizleri çözen kilit kişi olma, yönetici koçluğu ve saygınlık." },
        9: { name: "IX. Ermiş (The Hermit)", icon: "🕯️", astro: "♍ Başak", element: "Toprak", mainTheme: "İçsel Yolculuk & Sadeleşme", q1: "Gereksiz yükleri atma, zihinsel detoks ve içe dönüş.", q2: "Derinlemesine araştırma, yazarlık veya uzmanlık geliştirme.", q3: "İç fenerini yakma, yalnızlıkta bulunan berrak cevaplar.", q4: "Yeni bir farkındalıkla dış dünyaya dönme hazırlığı.", love: "Kendi alanına saygı duyma, ilişkide derin ve sessiz bağ kurma.", career: "Arka planda büyük eser üretme, uzmanlaşma ve sadeleşme yılı." },
        10: { name: "X. Kader Çarkı (Wheel of Fortune)", icon: "🎡", astro: "♃ Jüpiter", element: "Ateş", mainTheme: "Kadersel Fırsatlar & Büyük Döngü Değişimi", q1: "Eski döngünün kapanışı, beklenmedik sürpriz haberler.", q2: "Şans kapılarının açılması, ani fırsatları yakalama.", q3: "Yeni bir hayat standartına yükseliş, bolluk dalgası.", q4: "Yeni döngünün kalıcı avantajlara dönüşmesi.", love: "Kadersel karşılaşmalar, beklenmedik romantik dönüm noktaları.", career: "Büyük yatırımlar, terfiler ve kariyerde şanslı sıçrama yılı." },
        11: { name: "XI. Adalet (Justice)", icon: "⚖️", astro: "♎ Terazi", element: "Hava", mainTheme: "Hakikat, Denge & Karma Hesabı", q1: "Geçmiş konuların netleşmesi, yasal ve etik düzenlemeler.", q2: "Objektif kararlar, resmi sözleşmeler ve hakkaniyet.", q3: "Emeklerin tam karşılığını alma, hak yerini bulması.", q4: "Kusursuz yaşam dengesi ve vicdani berraklık.", love: "Dürüstlük, şeffaflık ve resmi nikah/evlilik kararları.", career: "Sözleşmeler, hak kazanımları, adil terfiler ve denetimler." },
        12: { name: "XII. Asılan Adam (The Hanged Man)", icon: "🌿", astro: "🌊 Su", element: "Su", mainTheme: "Teslimiyet & Bakış Açısı Dönüşümü", q1: "Zorlamayı bırakma, olayları akışına bırakma süreci.", q2: "Farklı bakış açıları kazanma, egoyu askıya alma.", q3: "Bekleyişin getirdiği aydınlanma, yeni stratejiler.", q4: "Düğümün çözülmesi ve yeniden özgürce akışa geçiş.", love: "Fedakarlıkların dengelenmesi, empati ve koşulsuz sevgi.", career: "Ezber bozan yaratıcı çözümler, inovatif hazırlık yılı." },
        13: { name: "XIII. Ölüm (Death)", icon: "🦅", astro: "♏ Akrep", element: "Su", mainTheme: "Büyük Dönüşüm & Küllerinden Doğuş", q1: "Miadı dolmuş durumları tespit etme ve bırakma cesareti.", q2: "Eskinin tasfiyesi, kabuk değiştirme sancısı.", q3: "Yepyeni bir benliğin ve vizyonun doğuşu.", q4: "Tam yenilenme, arınmış ve güçlü bir hayat sayfası.", love: "Toksik bağların bitmesi veya ilişkinin kökten yenilenmesi.", career: "Sektör veya kariyer değiştirme, sıfırdan zirveye başlama yılı." },
        14: { name: "XIV. Denge (Temperance)", icon: "🕊️", astro: "♐ Yay", element: "Ateş", mainTheme: "Şifa, Uyum & Ilımlı Yaşam", q1: "Aşırılıklardan arınma, ruh ve beden sağlığını hizalama.", q2: "Çatışan tarafları uzlaştırma, sakin diplomasi.", q3: "Ruhsal huzur, yaratıcı kimyanın tutması.", q4: "Kusursuz içsel tatmin ve dengeli refah.", love: "Huzurlu, sakin ve birbirini şifalandıran romantik dönem.", career: "Departmanlar arası ahenk, sürdürülebilir büyüme ve huzurlu çalışma." },
        15: { name: "XV. Şeytan (The Devil)", icon: "🔥", astro: "♑ Oğlak", element: "Toprak", mainTheme: "Bağlardan Özgürleşme & Güçlü Tutku", q1: "Sizi kısıtlayan alışkanlıkların ve korkuların fark edilmesi.", q2: "Maddi hırsları ve tutkuları yapıcı güce dönüştürme.", q3: "İllüzyon zincirlerini kırma, gerçek bağımsızlık.", q4: "Kendi gücüne sahip çıkmış özgür bir liderlik.", love: "Çok yüksek çekim ve tutku; ancak sınırları koruma sınavı.", career: "Büyük sermaye yönetimi, hırslı hedefler ve finansal güç." },
        16: { name: "XVI. Yıkılan Kule (The Tower)", icon: "⚡", astro: "♂️ Mars", element: "Ateş", mainTheme: "Radikal Uyanış & Sahteliklerin Yıkılışı", q1: "Sahte beklentilerin çatlaması, gerçeğin görülmesi.", q2: "Eski yapıların çöküşü ve ferahlatıcı arınma.", q3: "Yeni ve sarsılmaz temeller üzerine inşa süreci.", q4: "Korkusuz özgürlük ve sağlam gelecek.", love: "Maskelerin düşmesi, en saf dürüstlükle yeniden başlama.", career: "Krizden büyük fırsat çıkarma, radikal yeniden yapılanma." },
        17: { name: "XVII. Yıldız (The Star)", icon: "✨", astro: "♒ Kova", element: "Hava", mainTheme: "Umut, İlham & Şifalı Gelecek", q1: "Geçmişin yaralarını sarma, umutla hedefler koyma.", q2: "Yaratıcı ilhamın akışı, kitlelere seslenme.", q3: "Dileklerin gerçekleşmeye başlaması, şans dalgası.", q4: "Geleceğe dair tam güven ve kozmik şifa.", love: "Ruhsal şifa veren, geleceğe umut aşılayan romantik aşk.", career: "Sosyal projeler, dijital dünya, ün ve ilham verici başarılar." },
        18: { name: "XVIII. Ay (The Moon)", icon: "🌕", astro: "♓ Balık", element: "Su", mainTheme: "Bilinçaltı Yolculuğu & Sezgisel Sırlar", q1: "Belirsizliklerle yüzleşme, rüyaları ve hisleri izleme.", q2: "Sanatsal yaratıcılık, gizli niyetlerin fark edilmesi.", q3: "Sisin dağılması, gerçeğin netlik kazanması.", q4: "Korkulardan arınmış berrak bir içsel rehberlik.", love: "Romantik derinlik; evham ve kuruntulardan kaçınma ihtiyacı.", career: "Kreatif alanlar, sezgisel pazarlama ve dikkatli sözleşmeler." },
        19: { name: "XIX. Güneş (The Sun)", icon: "☀️", astro: "☀️ Güneş", element: "Ateş", mainTheme: "Zirve Başarı, Neşe & Parlama Yılı", q1: "Pozitif enerjinin yükselişi, berrak planlar yapma.", q2: "Görünürlüğün zirvesi, takdir ve övgü toplama.", q3: "Büyük başarıların kutlanması, çocuksu neşe.", q4: "Maddi ve manevi tam bir zaferle yılı tamamlama.", love: "Kusursuz mutluluk, aydınlık ve neşeli aşk birlikteliği.", career: "Yılın yıldızı olma, büyük terfi, alkış ve bereket." },
        20: { name: "XX. Mahkeme (Judgement)", icon: "📯", astro: "🔥 Ateş", element: "Ateş", mainTheme: "Kozmik Uyanış & Kadersel Karar", q1: "İçsel çağrıyı duyma, geçmişi değerlendirme.", q2: "Bağışlama, geçmiş yükleri bırakıp ayağa kalkma.", q3: "Yeni bir kimlikle hayat sahnesine çıkma.", q4: "Yüksek amaca adanmış yeni bir hayat düzeyi.", love: "Kadersel barışma veya ilişkiyi bir üst boyuta taşıma.", career: "Büyük kariyer sıçraması, sektörel çağrı ve yenilenme." },
        21: { name: "XXI. Dünya (The World)", icon: "🌍", astro: "♄ Satürn", element: "Toprak", mainTheme: "Büyük Tamamlanma & Küresel Zafer", q1: "Yılların emeğini taçlandırma hazırlığı.", q2: "Uluslararası kapıların açılması, büyük projeyi bitirme.", q3: "Zirve zafer, mezuniyet veya büyük başarı ödülü.", q4: "Huzurlu bir döngü kapanışı ve yeni bir çağa adım.", love: "Evlilik, birlikte dünya turu veya tam ruhsal doyum.", career: "Global başarı, büyük projenin tamamlanması ve zirve tatmin." },
        22: { name: "0. Joker (The Fool)", icon: "🎒", astro: "♅ Uranüs", element: "Hava", mainTheme: "Cesur Yeni Sayfa & Sonsuz Macera", q1: "Tüm kalıpları yıkıp sıfırdan başlama heyecanı.", q2: "Spontane fırsatlar, seyahatler ve yeni deneyimler.", q3: "Korkusuzca bilinmeze adım atma ve eğlenme.", q4: "Yepyeni bir hayat vizyonuyla yılı tamamlama.", love: "Spontane, sürpriz dolu ve özgürlükçü yeni bir aşk.", career: "Yeni girişimler, start-up'lar, bağımsız çalışma ve inovasyon." }
    };

    const d = new Date(dStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;

    let sum = day + month + targetYear;
    while (sum > 22) {
        let t = 0;
        sum.toString().split('').forEach(v => t += parseInt(v));
        sum = t;
    }
    const cardNum = sum === 0 ? 22 : sum;
    const y = yearArcana[cardNum];

    const heroHtml = `
        <div class="hc-tarot-hero-card">
            <div class="hc-tarot-badge">📅 ${targetYear} Yılı Tarot Kartınız: ${y.name}</div>
            <div class="hc-tarot-title">${y.icon} ${y.mainTheme}</div>
            <p class="hc-tarot-sub">Kozmik Element: <strong>${y.element}</strong> | Astrolojik Rezonans: <strong>${y.astro}</strong></p>
        </div>
    `;

    const quartersHtml = `
        <div class="hc-tarot-quarter-card">
            <div class="hc-tarot-q-tag">🌱 1. Çeyrek (Ocak - Mart)</div>
            <div class="hc-tarot-q-title">Tohum & Başlangıç</div>
            <p class="hc-tarot-q-desc">${y.q1}</p>
        </div>

        <div class="hc-tarot-quarter-card">
            <div class="hc-tarot-q-tag">☀️ 2. Çeyrek (Nisan - Haziran)</div>
            <div class="hc-tarot-q-title">Büyüme & Genişleme</div>
            <p class="hc-tarot-q-desc">${y.q2}</p>
        </div>

        <div class="hc-tarot-quarter-card">
            <div class="hc-tarot-q-tag">🌾 3. Çeyrek (Temmuz - Eylül)</div>
            <div class="hc-tarot-q-title">Hasat & Dönüm Noktası</div>
            <p class="hc-tarot-q-desc">${y.q3}</p>
        </div>

        <div class="hc-tarot-quarter-card">
            <div class="hc-tarot-q-tag">❄️ 4. Çeyrek (Ekim - Aralık)</div>
            <div class="hc-tarot-q-title">Tamamlanma & Entegrasyon</div>
            <p class="hc-tarot-q-desc">${y.q4}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>💖 ${targetYear} Aşk & İlişkiler Teması:</strong> ${y.love}</p>
        <p><strong>💼 ${targetYear} Kariyer & Para Teması:</strong> ${y.career}</p>
        <p><strong>✨ Yıllık Ruhsal Dönüşüm Tavsiyesi:</strong> ${targetYear} yılı boyunca <strong>${y.name}</strong> arketipinin enerjisi sizi destekleyecek. Bu yılın ana sınavlarını bilgelikle yönetmek için kartınızın sunduğu yaratıcı potansiyele güvenin.</p>
    `;

    document.getElementById('hc-tyc-hero').innerHTML = heroHtml;
    document.getElementById('hc-tyc-quarters').innerHTML = quartersHtml;
    document.getElementById('hc-tyc-desc').innerHTML = descHtml;

    document.getElementById('hc-tarot-yil-karti-result').classList.add('visible');
    document.getElementById('hc-tarot-yil-karti-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

