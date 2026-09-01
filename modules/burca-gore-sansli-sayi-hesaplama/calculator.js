function hcSsSyncDateToSign() {
    const dStr = document.getElementById('hc-ss-date').value;
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
            document.getElementById('hc-ss-sign').value = s.key;
            break;
        }
    }
}

function hcBurcSansliSayiHesapla() {
    const sign = document.getElementById('hc-ss-sign').value;

    const data = {
        koc: { name: "Koç", icon: "♈", primary: [1, 9], series: [1, 9, 10, 19, 28], master: "19 / 1", days: "Her ayın 1, 9, 19 ve 28. günleri", desc: "Mars'ın 9 sayısı ve Güneş'in 1 sayısı Koç'a saf liderlik, cesaret ve engelleri yıkma gücü verir." },
        boga: { name: "Boğa", icon: "♉", primary: [4, 6], series: [4, 6, 15, 24, 33], master: "33 / 6", days: "Her ayın 4, 6, 15 ve 24. günleri", desc: "Venüs'ün 6 sayısı ve Toprak'ın 4 sayısı Boğa'ya sarsılmaz finansal zenginlik ve kalıcı huzur bahşeder." },
        ikizler: { name: "İkizler", icon: "♊", primary: [3, 5], series: [3, 5, 14, 23, 32], master: "23 / 5", days: "Her ayın 3, 5, 14 ve 23. günleri", desc: "Merkür'ün 5 sayısı zihinsel hızı, 3 sayısı ise yaratıcı ifadeyi ve sosyal şansı temsil eder." },
        yengec: { name: "Yengeç", icon: "♋", primary: [2, 7], series: [2, 7, 11, 20, 29], master: "11 / 2", days: "Her ayın 2, 7, 11 ve 20. günleri", desc: "Ay'ın 2 sayısı ve mistik 7 sayısı Yengeç'e güçlü sezgiler, aile koruması ve derin şifa çeker." },
        aslan: { name: "Aslan", icon: "♌", primary: [1, 4], series: [1, 4, 10, 13, 19], master: "19 / 1", days: "Her ayın 1, 4, 10 ve 19. günleri", desc: "Güneş'in 1 sayısı sahne ışığını, 10 sayısı ise taçlanmayı ve büyük kadersel zaferleri simgeler." },
        basak: { name: "Başak", icon: "♍", primary: [5, 8], series: [5, 8, 14, 23, 32], master: "14 / 5", days: "Her ayın 5, 8, 14 ve 23. günleri", desc: "Merkür'ün analitik 5 sayısı ve 8'in maddi bolluk titreşimi Başak'a verimli projeler ve ustalık kazandırır." },
        terazi: { name: "Terazi", icon: "♎", primary: [6, 9], series: [6, 9, 15, 24, 33], master: "33 / 6", days: "Her ayın 6, 9, 15 ve 24. günleri", desc: "Venüs'ün 6 sayısı ve evrensel adalet 9 sayısı Terazi'ye kusursuz ilişkiler ve diplomatik başarılar getirir." },
        akrep: { name: "Akrep", icon: "♏", primary: [4, 9], series: [4, 9, 13, 22, 31], master: "22 / 4", days: "Her ayın 4, 9, 13 ve 22. günleri", desc: "Plüton'un 9 sayısı ve üstat 22 sayısı Akrep'e küllerinden doğma gücü ve büyük servet inşası sağlar." },
        yay: { name: "Yay", icon: "♐", primary: [3, 7], series: [3, 7, 12, 21, 30], master: "21 / 3", days: "Her ayın 3, 7, 12 ve 21. günleri", desc: "Jüpiter'in 3 sayısı neşe ve bolluğu, 21 sayısı ise yurt dışı ve büyük şans kapılarını ardına kadar açar." },
        oglak: { name: "Oğlak", icon: "♑", primary: [4, 8], series: [4, 8, 17, 26, 35], master: "17 / 8", days: "Her ayın 4, 8, 17 ve 26. günleri", desc: "Satürn'ün 8 sayısı finansal güç ve otoriteyi, 17 sayısı ise ölümsüz bir kariyer mirası bırakmayı simgeler." },
        kova: { name: "Kova", icon: "♒", primary: [4, 8], series: [4, 8, 13, 22, 31], master: "13 / 4", days: "Her ayın 4, 8, 13 ve 31. günleri", desc: "Uranüs'ün 4 sayısı dâhiyane buluşları, 22 sayısı ise dünyayı dönüştürecek vizyon projelerini çeker." },
        balik: { name: "Balık", icon: "♓", primary: [3, 7], series: [3, 7, 11, 25, 29], master: "11 / 2", days: "Her ayın 3, 7, 11 ve 25. günleri", desc: "Neptün'ün 7 sayısı ruhsal aydınlanmayı, 11 üstat sayısı ise sanatsal deha ve mistik şans getirir." }
    };

    const s = data[sign] || data.koc;
    let title = `${s.icon} ${s.name} — Ana Şans Sayıları: ${s.primary.join(', ')}`;

    const heroHtml = `
        <div class="hc-ss-hero-card">
            <div class="hc-ss-hero-badge">🔢 Numerolojik Burç Titreşimi</div>
            <div class="hc-ss-hero-title">${title}</div>
            <p class="hc-ss-hero-sub">Üstat Sayı Titreşimi: <strong>${s.master}</strong> | En Şanslı Ay Günleri: <strong>${s.days}</strong></p>
        </div>
    `;

    let badgesHtml = "";
    s.series.forEach(num => {
        badgesHtml += `
            <div class="hc-ss-badge-card">
                <div class="hc-ss-num">${num}</div>
                <div class="hc-ss-num-label">Uğurlu Titreşim</div>
            </div>
        `;
    });

    const descHtml = `
        <p><strong>Numerolojik Açıklama:</strong> ${s.desc}</p>
        <p><strong>Pratik Kullanım Önerisi:</strong> Önemli anlaşma tarihlerinizde, şanslı gün seçimlerinde, bilet alırken veya kadersel adımlar atarken bu sayı serisini ve özellikle <strong>${s.days}</strong> tarihlerini bir niyet çıpası olarak kullanabilirsiniz.</p>
    `;

    document.getElementById('hc-ss-hero').innerHTML = heroHtml;
    document.getElementById('hc-ss-badges').innerHTML = badgesHtml;
    document.getElementById('hc-ss-desc').innerHTML = descHtml;

    document.getElementById('hc-ss-result').classList.add('visible');
    document.getElementById('hc-ss-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

