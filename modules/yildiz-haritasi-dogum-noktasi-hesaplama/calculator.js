let hcSnActiveMode = 'auto';

function hcSnSetMode(mode) {
    hcSnActiveMode = mode;
    document.getElementById('hc-sn-btn-auto').classList.toggle('active', mode === 'auto');
    document.getElementById('hc-sn-btn-manual').classList.toggle('active', mode === 'manual');
    document.getElementById('hc-sn-auto-section').style.display = mode === 'auto' ? 'block' : 'none';
    document.getElementById('hc-sn-manual-section').style.display = mode === 'manual' ? 'block' : 'none';
}

function hcSansNoktasiHesapla() {
    let sunLong, moonLong, ascLong, isDay;

    const signs = [
        { name: "Koç", icon: "♈", element: "Ateş", fortuneDesc: "Kendi yolunuzu cesurca çizdiğinizde, bağımsız girişimlerde ve liderlik rollerinde en büyük kadersel bereketi bulursunuz.", spiritDesc: "Ruhsal amacınız inisiyatif almak, korkusuzca öncülük etmek ve yeni ufuklar açmaktır." },
        { name: "Boğa", icon: "♉", element: "Toprak", fortuneDesc: "Kalıcı maddi yapılar kurduğunuzda, sabırla biriktirdiğinizde, doğada ve sanatta huzur bulduğunuzda zenginleşirsiniz.", spiritDesc: "Ruhsal amacınız güven inşa etmek, değer yaratmak ve içsel dinginliği korumaktır." },
        { name: "İkizler", icon: "♊", element: "Hava", fortuneDesc: "Bilgi paylaştığınızda, iletişim ağları kurduğunuzda, yazarak ve öğreterek kadersel kapıları ardına kadar aralarsınız.", spiritDesc: "Ruhsal amacınız merakı canlı tutmak, köprüler kurmak ve zihinsel ışık saçmaktır." },
        { name: "Yengeç", icon: "♋", element: "Su", fortuneDesc: "Duygusal bağları beslediğinizde, sevdiklerinizi koruduğunuzda ve sezgilerinize güvendiğinizde mucizeler başlar.", spiritDesc: "Ruhsal amacınız şefkat vermek, köklere sahip çıkmak ve derin empati geliştirmektir." },
        { name: "Aslan", icon: "♌", element: "Ateş", fortuneDesc: "Yaratıcılığınızı sergilediğinizde, sahnede parladığınızda ve cömertçe liderlik ettiğinizde evren sizi ödüllendirir.", spiritDesc: "Ruhsal amacınız otantik kalbinizi açmak, neşe yaymak ve asaletle rehberlik etmektir." },
        { name: "Başak", icon: "♍", element: "Toprak", fortuneDesc: "Detaylarda ustalaştığınızda, şifa ve hizmet sunduğunuzda, verimli sistemler kurduğunuzda başarı kaçınılmazdır.", spiritDesc: "Ruhsal amacınız düzen getirmek, arındırmak ve mükemmel bir zanaatkâr olmaktır." },
        { name: "Terazi", icon: "♎", element: "Hava", fortuneDesc: "Uyumlu ortaklıklar kurduğunuzda, diplomasi ve adalet getirdiğinizde, estetik değerleri koruduğunuzda şans akar.", spiritDesc: "Ruhsal amacınız barış inşa etmek, dengede kalmak ve hakkaniyeti gözetmektir." },
        { name: "Akrep", icon: "♏", element: "Su", fortuneDesc: "Krizleri güce dönüştürdüğünüzde, derin araştırmalar yaptığınızda ve sezgisel stratejilerle küllerinizden doğduğunuzda zenginleşirsiniz.", spiritDesc: "Ruhsal amacınız karanlığı ışığa dönüştürmek ve ruhsal simyayı gerçekleştirmektir." },
        { name: "Yay", icon: "♐", element: "Ateş", fortuneDesc: "Yurt dışına açıldığınızda, felsefi ve akademik derinlik kazandığınızda ve sınırsız iyimserlikle keşfettiğinizde şansınız parlar.", spiritDesc: "Ruhsal amacınız yüksek hakikati aramak, ilham vermek ve sınırları aşmaktır." },
        { name: "Oğlak", icon: "♑", element: "Toprak", fortuneDesc: "Disiplinle zirveye tırmandığınızda, kalıcı bir miras inşa ettiğinizde ve sorumluluk aldığınızda büyük saygınlık kazanırsınız.", spiritDesc: "Ruhsal amacınız sabırla ustalaşmak, adanmışlık ve sarsılmaz bir temel kurmaktır." },
        { name: "Kova", icon: "♒", element: "Hava", fortuneDesc: "Toplumsal projelere öncülük ettiğinizde, özgün ve aykırı fikirlerinize sahip çıktığınızda kadersel fırsatlar yağar.", spiritDesc: "Ruhsal amacınız geleceği tasarlamak, insanlığa hizmet etmek ve özgürlüğü yaymaktır." },
        { name: "Balık", icon: "♓", element: "Su", fortuneDesc: "Evrensel akışa teslim olduğunuzda, sanatsal ilhamla yarattığınızda ve koşulsuz şefkat sunduğunuzda ilahi bolluk kapıdadır.", spiritDesc: "Ruhsal amacınız birlik bilincine ulaşmak, affetmek ve ilahi aşkı yansıtmaktır." }
    ];

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    if (hcSnActiveMode === 'auto') {
        const bdate = document.getElementById('hc-sn-bdate').value;
        const btime = document.getElementById('hc-sn-btime').value || '12:00';
        const cityVal = document.getElementById('hc-sn-bcity').value.split(',').map(Number);
        const lat = cityVal[0], lon = cityVal[1];

        if (!bdate) { alert('Lütfen doğum tarihinizi giriniz.'); return; }

        const date = new Date(bdate + 'T' + btime);
        const jd = (date.getTime() / 86400000) + 2440587.5;
        const d = jd - 2451545.0;
        const rad = Math.PI / 180;

        // Güneş
        const w = 102.9404 + 0.0000470935 * d, a = 1.00000011, e = 0.01671022 - 0.0000000012 * d, M0 = 357.5291, M1 = 0.98560028;
        let M = norm(M0 + M1 * d);
        let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
        for (let j = 0; j < 3; j++) E = E - (E - (180 / Math.PI) * e * Math.sin(E * rad) - M) / (1 - e * Math.cos(E * rad));
        let xv = a * (Math.cos(E * rad) - e);
        let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        sunLong = norm(v + w);

        // Ay
        const L = norm(218.316 + 13.176396 * d);
        const Mm = norm(134.963 + 13.064993 * d);
        moonLong = norm(L + 6.289 * Math.sin(Mm * rad));

        // Yükselen (ASC)
        const timeParts = btime.split(':').map(Number);
        const utHours = timeParts[0] + timeParts[1] / 60 - 3; // TR UTC+3
        let GMST0 = norm(100.4606184 + 0.9856473662862 * d);
        let GMST = norm(GMST0 + utHours * 15);
        let RAMC = norm(GMST + lon);
        let eps = 23.4392911 - 0.0000004 * d;
        let ascRad = Math.atan2(Math.cos(RAMC * rad), -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(lat * rad) * Math.sin(eps * rad));
        ascLong = norm(ascRad / rad);

        // Gündüz / Gece kontrolü: Güneş ufuk üstünde mi?
        // Ufuk ekseni: ASC ile ASC + 180° arası
        let sunDiff = norm(sunLong - ascLong);
        isDay = (sunDiff > 180 && sunDiff < 360);
    } else {
        sunLong = parseInt(document.getElementById('hc-sn-sun-sign').value) + parseFloat(document.getElementById('hc-sn-sun-deg').value || 0);
        moonLong = parseInt(document.getElementById('hc-sn-moon-sign').value) + parseFloat(document.getElementById('hc-sn-moon-deg').value || 0);
        ascLong = parseInt(document.getElementById('hc-sn-asc-sign').value) + parseFloat(document.getElementById('hc-sn-asc-deg').value || 0);
        isDay = document.getElementById('hc-sn-time').value === 'day';
    }

    // Klasik Helenistik Arap Noktaları Formülü:
    // Şans Noktası (Pars Fortunae): Gündüz = ASC + Ay - Güneş | Gece = ASC + Güneş - Ay
    // Ruh Noktası (Pars Spiritus): Gündüz = ASC + Güneş - Ay | Gece = ASC + Ay - Güneş
    let fortuneLong, spiritLong;
    if (isDay) {
        fortuneLong = norm(ascLong + moonLong - sunLong);
        spiritLong = norm(ascLong + sunLong - moonLong);
    } else {
        fortuneLong = norm(ascLong + sunLong - moonLong);
        spiritLong = norm(ascLong + moonLong - sunLong);
    }

    const fSignIdx = Math.floor(fortuneLong / 30);
    const fSign = signs[fSignIdx];
    const fDeg = (fortuneLong % 30).toFixed(1);

    const sSignIdx = Math.floor(spiritLong / 30);
    const sSign = signs[sSignIdx];
    const sDeg = (spiritLong % 30).toFixed(1);

    const heroHtml = `
        <div class="hc-sn-hero-card">
            <div class="hc-sn-hero-badge">🌟 ${isDay ? '☀️ Gündüz Doğumu (Güneş Ufuk Üstünde)' : '🌙 Gece Doğumu (Güneş Ufuk Altında)'}</div>
            <div class="hc-sn-hero-title">Şans Noktanız: ${fSign.icon} ${fSign.name} (${fDeg}°)</div>
            <p class="hc-sn-hero-sub">Maddi & Kadersel Bolluk Kapınız: <strong>${fSign.name}</strong> burcunun titreşimiyle açılır.</p>
        </div>
    `;

    const pointsHtml = `
        <div class="hc-sn-card">
            <div class="hc-sn-card-head">
                <span class="hc-sn-icon">🏺</span>
                <div class="hc-sn-card-title">
                    <strong>Pars Fortunae (Şans & Bolluk Noktası)</strong>
                    <div class="hc-sn-card-sub">${fSign.icon} ${fSign.name} (${fDeg}°)</div>
                </div>
            </div>
            <p class="hc-sn-card-p">${fSign.fortuneDesc}</p>
        </div>

        <div class="hc-sn-card">
            <div class="hc-sn-card-head">
                <span class="hc-sn-icon">🕊️</span>
                <div class="hc-sn-card-title">
                    <strong>Pars Spiritus (Ruh & Niyet Noktası)</strong>
                    <div class="hc-sn-card-sub">${sSign.icon} ${sSign.name} (${sDeg}°)</div>
                </div>
            </div>
            <p class="hc-sn-card-p">${sSign.spiritDesc}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Arap Noktaları (Hermetik Noktalar) Nedir?</strong> Antik astrolojide Şans Noktası (Pars Fortunae), Güneş (ruh), Ay (beden/duygu) ve Yükselen (fiziksel dünya) arasındaki kutsal üçgenin matematiksel yansımasıdır.</p>
        <p><strong>Nasıl Aktif Edilir?</strong> Şans Noktanız <strong>${fSign.name}</strong> burcundadır. Hayatta bu burcun erdemlerine uygun davrandığınızda, evren en az eforla en yüksek maddi ve manevi bereketi hayatınıza akıtır.</p>
        <p><strong>2026 Önerisi:</strong> Şans Noktanızın yönetici gezegeninin gökyüzündeki transitlerini takip edin; özellikle o gezegenin iyi açılar aldığı dönemlerde büyük finansal veya kariyer adımları atın.</p>
    `;

    document.getElementById('hc-sn-hero').innerHTML = heroHtml;
    document.getElementById('hc-sn-points').innerHTML = pointsHtml;
    document.getElementById('hc-sn-desc').innerHTML = descHtml;

    document.getElementById('hc-sn-result').classList.add('visible');
    document.getElementById('hc-sn-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

