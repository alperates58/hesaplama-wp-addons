function hcBurcYasHesapla() {
    const birthdate = document.getElementById('hc-byas-birthdate').value;
    const targetDate = document.getElementById('hc-byas-target').value || '2026-05-15';

    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const bDate = new Date(birthdate);
    const tDate = new Date(targetDate);
    const ageInDays = (tDate - bDate) / (1000 * 60 * 60 * 24);
    const ageInYears = ageInDays / 365.2422;

    if (ageInYears < 0) {
        alert('Doğum tarihiniz hesaplama tarihinden sonra olamaz!');
        return;
    }

    const planets = [
        { name: "Merkür Yaşı", icon: "☿️", period: 0.2408467, desc: "Zihinsel adaptasyon ve öğrenme döngüsü", color: "#64748b" },
        { name: "Venüs Yaşı", icon: "♀️", period: 0.61519726, desc: "Kalp, değerler ve ilişki tekamülü", color: "#ec4899" },
        { name: "Mars Yaşı", icon: "♂️", period: 1.8808476, desc: "Cesaret, fiziksel eylem ve irade döngüsü", color: "#ef4444" },
        { name: "Jüpiter Yaşı", icon: "♃", period: 11.862615, desc: "Bolluk, şans ve felsefi genişleme döngüsü", color: "#f59e0b" },
        { name: "Satürn Yaşı", icon: "♄", period: 29.447498, desc: "Büyük olgunlaşma, sorumluluk ve ustalık", color: "#3b82f6" },
        { name: "Kiron Yaşı", icon: "⚷", period: 50.7, desc: "Yaraları şifalandırma ve bilgelik aktarımı", color: "#8b5cf6" },
        { name: "Uranüs Yaşı", icon: "♅", period: 84.016846, desc: "Büyük aydınlanma ve ruhsal özgürleşme", color: "#06b6d4" }
    ];

    let lifePhase = "";
    if (ageInYears < 28) {
        lifePhase = "🌱 1. Büyüme & Keşif Evresi (Satürn Öncesi): Kimliğinizi inşa ettiğiniz, hayatı deneyimlediğiniz ve temel potansiyellerinizi keşfettiğiniz dönemdesiniz.";
    } else if (ageInYears <= 31) {
        lifePhase = "👑 1. Büyük Satürn Dönüşü (28-30 Yaş İnisiyasyonu): Hayatınızın en kritik eşiği. Çocukluk ve gençlik illüzyonlarının bittiği, gerçek yetişkinliğe ve kalıcı kariyer temellerine adım attığınız kadersel sınav ve inşa dönemi.";
    } else if (ageInYears < 40) {
        lifePhase = "🏛️ 2. Üretim & Somut Başarı Evresi: Kendi kurallarınızı koyduğunuz, kariyerde ve ailede ustalaştığınız en verimli dönem.";
    } else if (ageInYears <= 44) {
        lifePhase = "⚡ Uranüs Karşıtlığı & Orta Yaş Uyanışı (40-44 Yaş): 'Ben gerçekten ne istiyorum?' sorusunun sorulduğu, ruhsal özgürleşme ve ikinci bahar evresi.";
    } else if (ageInYears <= 52) {
        lifePhase = "✨ Kiron Dönüşü (50 Yaş Şifası): Yaşamın tüm deneyimlerini bilgeliğe dönüştürdüğünüz ve başkalarına rehberlik ettiğiniz ruhsal şifa dönemi.";
    } else if (ageInYears <= 60) {
        lifePhase = "👑 2. Satürn Dönüşü (58-60 Yaş): Yaşam ustalığının taçlandığı, bilge bir lider ve mentor olarak saygınlığınızın zirve yaptığı dönem.";
    } else {
        lifePhase = "🌌 Uranüs Döngüsü & Tam Ruhsal Bilgelik: Dünyevi kaygılardan arınmış, derin bir içsel huzur ve evrensel anlayış evresi.";
    }

    const heroHtml = `
        <div class="hc-byas-hero-card">
            <div class="hc-byas-hero-badge">🌍 Dünya Yaşınız: ${ageInYears.toFixed(1)} Yaşında (${Math.floor(ageInDays).toLocaleString('tr-TR')} Gün)</div>
            <div class="hc-byas-hero-title">Satürn Döngü İlerlemeniz: %${((ageInYears % 29.45) / 29.45 * 100).toFixed(0)}</div>
            <p class="hc-byas-hero-sub">${lifePhase}</p>
        </div>
    `;

    let gridHtml = "";
    planets.forEach(p => {
        const pAge = (ageInYears / p.period).toFixed(2);
        const cycleProgress = ((ageInYears % p.period) / p.period * 100).toFixed(0);
        gridHtml += `
            <div class="hc-byas-card">
                <div class="hc-byas-card-head">
                    <span class="hc-byas-icon">${p.icon}</span>
                    <div class="hc-byas-info">
                        <strong>${p.name}</strong>
                        <div class="hc-byas-sub">${p.desc}</div>
                    </div>
                    <div class="hc-byas-age">${pAge} <small>Döngü</small></div>
                </div>
                <div class="hc-byas-bar-wrap">
                    <div class="hc-byas-bar-head"><span>Döngü İlerlemesi</span><span>%${cycleProgress}</span></div>
                    <div class="hc-byas-bar"><div class="hc-byas-fill" style="width: ${cycleProgress}%; background: ${p.color};"></div></div>
                </div>
            </div>
        `;
    });

    const descHtml = `
        <p><strong>Astrolojik Gezegen Yaşı Nedir?</strong> Her gezegenin Güneş etrafındaki turu farklı bir zaman alır. Dünya'da 30 yaşında olan biri, Güneş sisteminde Merkür'e göre 124 yaşında bir zihinsel ustalığa, Jüpiter'e göre ise henüz 2.5 döngülük bir genişleme deneyimine sahiptir.</p>
        <p><strong>Kadersel Eşikler:</strong></p>
        <p>• <strong>Jüpiter Döngüleri (Her 12 Yılda Bir - 12, 24, 36, 48, 60...):</strong> Hayatınızda büyük şans, yurt dışı, eğitim ve kariyer sıçramaları getirir.</p>
        <p>• <strong>Satürn Döngüleri (29.5 ve 59 Yaş):</strong> Ruhun olgunlaşma sınavıdır; sorumluluk alanlar ödüllendirilir.</p>
        <p>• <strong>Uranüs Karşıtlığı (40-42 Yaş):</strong> Ruhun özgürleşme ve yaşam amacını yeniden tanımlama çağıdır.</p>
    `;

    document.getElementById('hc-byas-hero').innerHTML = heroHtml;
    document.getElementById('hc-byas-grid').innerHTML = gridHtml;
    document.getElementById('hc-byas-desc').innerHTML = descHtml;

    document.getElementById('hc-byas-result').classList.add('visible');
    document.getElementById('hc-byas-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

