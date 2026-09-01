function hcSgSyncDateToSign() {
    const dStr = document.getElementById('hc-sg-date').value;
    if (!dStr) return;
    const parts = dStr.split('-').map(Number);
    const m = parts[1], d = parts[2];

    const signDates = [
        { key: "oglak", start: [1, 1], end: [1, 19] },
        { key: "kova", start: [1, 20], end: [2, 18] },
        { key: "balik", start: [2, 19], end: [3, 20] },
        { key: "koc", start: [3, 21], end: [4, 19] },
        { key: "boga", start: [4, 20], end: [5, 20] },
        { key: "ikizler", start: [5, 21], end: [6, 20] },
        { key: "yengec", start: [6, 21], end: [7, 22] },
        { key: "aslan", start: [7, 23], end: [8, 22] },
        { key: "basak", start: [8, 23], end: [9, 22] },
        { key: "terazi", start: [9, 23], end: [10, 22] },
        { key: "akrep", start: [10, 23], end: [11, 21] },
        { key: "yay", start: [11, 22], end: [12, 21] },
        { key: "oglak", start: [12, 22], end: [12, 31] }
    ];

    for (let s of signDates) {
        if ((m === s.start[0] && d >= s.start[1]) && (m === s.end[0] && d <= s.end[1])) {
            document.getElementById('hc-sg-sign').value = s.key;
            break;
        }
    }
}

function hcBurcSansliGunHesapla() {
    const sign = document.getElementById('hc-sg-sign').value;

    const data = {
        koc: { name: "Koç", icon: "♈", day: "Salı", ruler: "Mars ♂️", color: "#ef4444", hours: ["06:00 - 07:00 (Gündoğumu)", "13:00 - 14:00 (Öğle Gücü)", "20:00 - 21:00 (Gece İnisiyatifi)"], energy: "Cesaret, girişim, spor, ameliyat ve rekabet." },
        boga: { name: "Boğa", icon: "♉", day: "Cuma", ruler: "Venüs ♀️", color: "#10b981", hours: ["07:00 - 08:00 (Sabah Bereketi)", "14:00 - 15:00 (Sanat & Finans)", "21:00 - 22:00 (Aşk & Huzur)"], energy: "Yatırımlar, lüks alışveriş, estetik ve romantizm." },
        ikizler: { name: "İkizler", icon: "♊", day: "Çarşamba", ruler: "Merkür ☿️", color: "#f59e0b", hours: ["08:00 - 09:00 (Zihinsel Netlik)", "15:00 - 16:00 (Ticari Anlaşmalar)", "22:00 - 23:00 (Yazı & İletişim)"], energy: "Sözleşmeler, ticaret, eğitim, mülakat ve sosyal medya." },
        yengec: { name: "Yengeç", icon: "♋", day: "Pazartesi", ruler: "Ay 🌙", color: "#38bdf8", hours: ["06:00 - 07:00 (Sezgisel Uyanış)", "13:00 - 14:00 (Aile & Beslenme)", "20:00 - 21:00 (Duygusal Şifa)"], energy: "Gayrimenkul, aile bağları, sezgisel kararlar ve ev düzeni." },
        aslan: { name: "Aslan", icon: "♌", day: "Pazar", ruler: "Güneş ☀️", color: "#f97316", hours: ["06:00 - 07:00 (Liderlik Doğuşu)", "13:00 - 14:00 (Kariyer Zirvesi)", "20:00 - 21:00 (Yaratıcı İfade)"], energy: "Sahneye çıkış, terfi isteme, otorite figürleriyle görüşme." },
        basak: { name: "Başak", icon: "♍", day: "Çarşamba", ruler: "Merkür ☿️", color: "#84cc16", hours: ["07:00 - 08:00 (Planlama)", "14:00 - 15:00 (Detaylı Analiz)", "21:00 - 22:00 (Sağlık & Düzen)"], energy: "Sağlık kontrolleri, bütçe planlama, arındırma ve çalışma." },
        terazi: { name: "Terazi", icon: "♎", day: "Cuma", ruler: "Venüs ♀️", color: "#ec4899", hours: ["08:00 - 09:00 (Uyum & Zarafet)", "15:00 - 16:00 (Ortaklık & Hukuk)", "22:00 - 23:00 (Sosyal Davetler)"], energy: "Evlilik teklifi, ortaklık kurma, davalar ve diplomatik görüşmeler." },
        akrep: { name: "Akrep", icon: "♏", day: "Salı", ruler: "Mars ♂️ / Plüton ♇", color: "#7f1d1d", hours: ["06:00 - 07:00 (Stratejik Güç)", "13:00 - 14:00 (Derin Araştırma)", "20:00 - 21:00 (Kriz Dönüşümü)"], energy: "Kredi, miras, stratejik yatırımlar ve gizli sırları çözme." },
        yay: { name: "Yay", icon: "♐", day: "Perşembe", ruler: "Jüpiter ♃", color: "#8b5cf6", hours: ["07:00 - 08:00 (Vizyon & Genişleme)", "14:00 - 15:00 (Yurt Dışı & Ticaret)", "21:00 - 22:00 (Felsefe & Şans)"], energy: "Vize, seyahat, akademi, büyük yatırımlar ve şans oyunları." },
        oglak: { name: "Oğlak", icon: "♑", day: "Cumartesi", ruler: "Satürn ♄", color: "#475569", hours: ["06:00 - 07:00 (Disiplin & Temel)", "13:00 - 14:00 (Kariyer Anlaşması)", "20:00 - 21:00 (Uzun Vadeli Karar)"], energy: "Resmi işler, şirket kurma, gayrimenkul ve uzun vadeli kontratlar." },
        kova: { name: "Kova", icon: "♒", day: "Cumartesi", ruler: "Satürn ♄ / Uranüs ♅", color: "#0ea5e9", hours: ["08:00 - 09:00 (İcat & Yenilik)", "15:00 - 16:00 (Kolektif Projeler)", "22:00 - 23:00 (Teknoloji & Vizyon)"], energy: "Teknolojik atılımlar, dernekler, toplumsal projeler ve özgünlük." },
        balik: { name: "Balık", icon: "♓", day: "Perşembe", ruler: "Jüpiter ♃ / Neptün ♆", color: "#06b6d4", hours: ["07:00 - 08:00 (Mistik İlham)", "14:00 - 15:00 (Sanat & Şifa)", "21:00 - 22:00 (Ruhsal Birlik)"], energy: "Meditasyon, sanatsal yaratıcılık, yardım faaliyetleri ve şifa." }
    };

    const s = data[sign] || data.koc;
    let title = `${s.icon} ${s.name} — En Şanslı Gününüz: ${s.day}`;

    const heroHtml = `
        <div class="hc-sg-hero-card">
            <div class="hc-sg-hero-badge">🍀 Şanslı Gün & Yönetici Frekans</div>
            <div class="hc-sg-hero-title">${title}</div>
            <p class="hc-sg-hero-sub">Yönetici Gezegen: <strong>${s.ruler}</strong> | Bu gün atılan adımlarda evrensel rüzgar arkanızdadır.</p>
        </div>
    `;

    let hoursHtml = "";
    s.hours.forEach(h => {
        hoursHtml += `
            <div class="hc-sg-hour-item">
                <span class="hc-sg-hour-icon">⏰</span>
                <div class="hc-sg-hour-text"><strong>${h}</strong></div>
            </div>
        `;
    });

    const descHtml = `
        <p><strong>Bu Günün Enerji Alanı:</strong> ${s.energy}</p>
        <p><strong>Nasıl Değerlendirmelisiniz?</strong> Haftanın ${s.day} gününde yönetici gezegeniniz ${s.ruler} gökyüzünde en güçlü tesiri yayar. Önemli kararlarınızı, imza atacağınız işleri, ilk buluşmaları veya yatırım hamlelerinizi özellikle yukarıda belirtilen gezegen saatlerine denk getirdiğinizde sonuç alma hızınız ve şansınız katlanacaktır.</p>
    `;

    document.getElementById('hc-sg-hero').innerHTML = heroHtml;
    document.getElementById('hc-sg-hours').innerHTML = hoursHtml;
    document.getElementById('hc-sg-desc').innerHTML = descHtml;

    document.getElementById('hc-sg-result').classList.add('visible');
    document.getElementById('hc-sg-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

