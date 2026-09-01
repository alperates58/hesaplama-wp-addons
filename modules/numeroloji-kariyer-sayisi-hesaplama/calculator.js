function hcCareerNumberHesapla() {
    const rawName = document.getElementById('hc-cn-name').value.trim();
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

    const clean = rawName.toLocaleUpperCase('tr-TR').replace(/[^A-ZÇĞİÖŞÜ]/g, '');
    let totalSum = 0;
    for (let char of clean) {
        if (pythagoreanMap[char]) totalSum += pythagoreanMap[char];
    }

    const careerNum = reduceToSingleOrMaster(totalSum);

    const careerArchetypes = {
        1: { title: "1 - Bağımsız Girişimci & Vizyoner Kurucu", sectors: "Teknoloji start-up'ları, üst düzey yöneticilik, bağımsız danışmanlık, inovasyon ve girişimcilik.", style: "Otoriter değil vizyoner, hızlı karar alan ve sıfırdan kuran öncü lider.", money: "Kendi markasını yaratıp doğrudan yönettiğinde en yüksek finansal bolluğa ulaşır." },
        2: { title: "2 - Stratejik Diplomat & Ortaklık Uzmanı", sectors: "İnsan kaynakları, uluslararası ilişkiler, arabuluculuk, müzakere, halkla ilişkiler ve ortaklık yönetimi.", style: "Kapsayıcı, dinleyen, uzlaştıran ve krizleri yumuşatan diplomatik lider.", money: "Güçlü ortaklıklar ve doğru iş birlikleri kurduğunda refahı katlanır." },
        3: { title: "3 - Yaratıcı İletişimci & Medya Yıldızı", sectors: "Pazarlama, reklamcılık, dijital içerik, tasarım, sahne sanatları, televizyon ve halkla ilişkiler.", style: "İlham veren, enerjik, kitleleri motive eden ve fikir fabrikası gibi çalışan lider.", money: "Yaratıcı zekasını ve hitabet yeteneğini ticarileştirdiğinde para kapıları açılır." },
        4: { title: "4 - Sistem Mimarı & Güvenilir Operasyon", sectors: "Mühendislik, finans & bankacılık, gayrimenkul, lojistik, inşaat, veri analizi ve operasyon yönetimi.", style: "Metodik, şeffaf, kuralcı, çalışanlarına güven veren ve sağlam temeller kuran lider.", money: "Düzenli yatırımlar, gayrimenkul ve uzun vadeli kalıcı projelerle servet inşa eder." },
        5: { title: "5 - Çok Yönlü Satışçı & Değişim Lideri", sectors: "Uluslararası ticaret, turizm, etkinlik yönetimi, e-ticaret, medya ve kriz yönetimi.", style: "Hızlı adapte olan, esnek, risk almaktan korkmayan ve dinamik lider.", money: "Farklı gelir kanalları oluşturup hızlı pazar trendlerini yakaladığında kazanır." },
        6: { title: "6 - Hizmet & Şifa Mimarı", sectors: "Sağlık sektörü, eğitim, mimarlık, gastronomi, sosyal girişimcilik, insan kaynakları ve hukuk.", style: "Çalışanlarını koruyan, adil, etik değerlere bağlı ve huzurlu çalışma ortamı kuran lider.", money: "İnsanların hayatına doğrudan fayda sağlayan etik iş modelleriyle sürekli gelir elde eder." },
        7: { title: "7 - Analitik Stratejist & Teknoloji Dehası", sectors: "Yapay zeka, siber güvenlik, Ar-Ge, akademi, bilimsel araştırmalar ve felsefi danışmanlık.", style: "Derinlemesine düşünen, veriye dayalı strateji üreten, sessiz ama çok etkili bilge lider.", money: "Niş uzmanlık alanlarında rakipsizleştiğinde en yüksek danışmanlık gelirlerine ulaşır." },
        8: { title: "8 - Büyük Sermaye & Finans İmparatoru", sectors: "Yatırım fonları, holding yönetimi, kurumsal finans, gayrimenkul geliştirme ve endüstri.", style: "Kararlı, hedefe kilitlenen, kaynakları mükemmel yöneten ve otoriter başarı lideri.", money: "Büyük projeleri ve para akışını stratejik yönettiğinde multi-milyonluk başarılara ulaşır." },
        9: { title: "9 - Evrensel Lider & Sosyal Dönüşümcü", sectors: "Sivil toplum kuruluşları, küresel iletişim, sanat yönetimi, uluslararası yardım ve eğitim.", style: "Vizyonunu tüm dünyaya duyuran, idealist, ilham verici ve fedakar büyük lider.", money: "Topluma katkı sağlayan ve insanlığa hizmet eden projeler yönettikçe bolluk onu bulur." },
        11: { title: "11 - Vizyoner İlham Kanalı (Master 11)", sectors: "Yaratıcı sanatlar, spiritüel danışmanlık, inovasyon koçluğu ve kitle iletişim.", style: "Özgün vizyonuyla çağının ötesinde fikirler üreten ilham verici lider.", money: "Fikirlerinin özgünlüğüne inandığında büyük sponsorluk ve kitle desteği bulur." },
        22: { title: "22 - Küresel Sistemler Kurucusu (Master 22)", sectors: "Uluslararası altyapı, dev sanayi projeleri, global şirketler ve şehircilik.", style: "Büyük ekipleri ortak bir dünya hedefine kusursuzca kanalize eden mega lider.", money: "Devasa ölçekli kalıcı sistemler ve eserler üreterek kurumsal miras bırakır." }
    };

    const c = careerArchetypes[careerNum] || careerArchetypes[1];

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">💼 Kariyer Sayınız: ${careerNum} ${careerNum >= 11 ? '(Üstat Sayı)' : ''}</div>
            <div class="hc-num-title">${c.title}</div>
            <p class="hc-num-sub">İş Dünyasındaki İsminiz: <strong>${rawName}</strong></p>
        </div>
    `;

    const gridHtml = `
        <div class="hc-num-card-box">
            <div class="hc-num-card-tag">🏢 İdeal ve En Çok Kazandıran Sektörler</div>
            <p class="hc-num-card-p">${c.sectors}</p>
        </div>

        <div class="hc-num-card-box" style="border-color: #93c5fd; background: #eff6ff;">
            <div class="hc-num-card-tag" style="color: #1d4ed8;">👔 Liderlik ve Çalışma Tarzınız</div>
            <p class="hc-num-card-p">${c.style}</p>
        </div>

        <div class="hc-num-card-box" style="border-color: #86efac; background: #f0fdf4;">
            <div class="hc-num-card-tag" style="color: #15803d;">💰 Finansal Bolluk ve Para Kapısı</div>
            <p class="hc-num-card-p">${c.money}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>İş Hayatında 2026 Stratejiniz:</strong> ${rawName} ismi, kurumsal ve profesyonel hayatta <strong>${careerNum}</strong> frekansıyla titreşir. Bu sayı size rekabet ortamında ${c.style} şeklinde doğal bir avantaj sağlar.</p>
        <p><strong>Kariyer Tavsiyesi:</strong> ${c.money} Güçlü yönlerinizi sergilemekten çekinmeyin ve doğru sektörlerde (${c.sectors}) yer alarak potansiyelinizi maksimuma çıkarın.</p>
    `;

    document.getElementById('hc-cn-hero').innerHTML = heroHtml;
    document.getElementById('hc-cn-grid').innerHTML = gridHtml;
    document.getElementById('hc-res-cn-desc').innerHTML = descHtml;

    document.getElementById('hc-numeroloji-kariyer-sayisi-hesaplama-result').classList.add('visible');
    document.getElementById('hc-numeroloji-kariyer-sayisi-hesaplama-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
