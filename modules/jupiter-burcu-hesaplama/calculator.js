function hcJupiterBurcuHesapla() {
    const tarihStr = document.getElementById('hc-jupiter-tarih').value;

    if (!tarihStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const parts = tarihStr.split('-').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = 12; // 12:00 UT

    let yCalc = Y, mCalc = M;
    if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
    const A = Math.floor(yCalc / 100);
    const B = 2 - A + Math.floor(A / 4);
    const JD = Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (hour / 24);

    const rad = Math.PI / 180;
    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    function calcJupiter(jdVal) {
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;

        // Earth Helio
        const L0_e = norm(280.46646 + 36000.76983 * TVal);
        const M_e = norm(357.52911 + 35999.05029 * TVal);
        const C_e = (1.914602 - 0.004817 * TVal) * Math.sin(M_e * rad) + (0.019993 - 0.000101 * TVal) * Math.sin(2 * M_e * rad);
        const sunLon = norm(L0_e + C_e);
        const e_e = 0.016708634 - 0.000042037 * TVal;
        const R_e = 1.000001018 * (1 - e_e * e_e) / (1 + e_e * Math.cos((M_e + C_e) * rad));
        const Xe = R_e * Math.cos(sunLon * rad);
        const Ye = R_e * Math.sin(sunLon * rad);

        // Jupiter Helio
        const N_j = norm(100.4542 + 2.76854e-5 * dVal);
        const i_j = 1.3030 - 1.557e-7 * dVal;
        const w_j = norm(273.8777 + 1.64505e-5 * dVal);
        const a_j = 5.202561;
        const e_j = 0.048498 + 4.469e-9 * dVal;
        const M_j = norm(19.8950 + 0.0830853001 * dVal);

        let E_j = M_j;
        for (let k = 0; k < 5; k++) {
            E_j = E_j - (E_j - e_j * (180 / Math.PI) * Math.sin(E_j * rad) - M_j) / (1 - e_j * Math.cos(E_j * rad));
        }

        const xv_j = a_j * (Math.cos(E_j * rad) - e_j);
        const yv_j = a_j * (Math.sqrt(1 - e_j * e_j) * Math.sin(E_j * rad));
        const v_j = norm(Math.atan2(yv_j, xv_j) / rad);
        const r_j = Math.sqrt(xv_j * xv_j + yv_j * yv_j);

        const xh = r_j * (Math.cos(N_j * rad) * Math.cos((v_j + w_j) * rad) - Math.sin(N_j * rad) * Math.sin((v_j + w_j) * rad) * Math.cos(i_j * rad));
        const yh = r_j * (Math.sin(N_j * rad) * Math.cos((v_j + w_j) * rad) + Math.cos(N_j * rad) * Math.sin((v_j + w_j) * rad) * Math.cos(i_j * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcJupiter(JD);
    const lon2 = calcJupiter(JD + 1);
    let delta = lon2 - lon1;
    if (delta < -180) delta += 360;
    if (delta > 180) delta -= 360;
    const isRetro = delta < 0;

    const burclar = [
        { name: "Koç", element: "Ateş", modality: "Öncü", symbol: "♈" },
        { name: "Boğa", element: "Toprak", modality: "Sabit", symbol: "♉" },
        { name: "İkizler", element: "Hava", modality: "Değişken", symbol: "♊" },
        { name: "Yengeç", element: "Su", modality: "Öncü", symbol: "♋" },
        { name: "Aslan", element: "Ateş", modality: "Sabit", symbol: "♌" },
        { name: "Başak", element: "Toprak", modality: "Değişken", symbol: "♍" },
        { name: "Terazi", element: "Hava", modality: "Öncü", symbol: "♎" },
        { name: "Akrep", element: "Su", modality: "Sabit", symbol: "♏" },
        { name: "Yay", element: "Ateş", modality: "Değişken", symbol: "♐" },
        { name: "Oğlak", element: "Toprak", modality: "Öncü", symbol: "♑" },
        { name: "Kova", element: "Hava", modality: "Sabit", symbol: "♒" },
        { name: "Balık", element: "Su", modality: "Değişken", symbol: "♓" }
    ];

    const signIdx = Math.floor(lon1 / 30) % 12;
    const signObj = burclar[signIdx];
    const degInSign = Math.floor(lon1 % 30);
    const minInSign = Math.floor((lon1 % 1) * 60);

    const jupiterYorumlari = {
        "Koç": `
            <p><strong>Şans & Büyüme Alanı:</strong> Cesaret, inisiyatif alma ve yeni yollar açma. İlk adımı attığınızda, risk aldığınızda ve liderlik sergilediğinizde evren sizi büyük fırsatlarla ödüllendirir.</p>
            <p><strong>Bolluk Felsefesi:</strong> Kendi gücünüze inanmak ve bağımsız hareket etmek en büyük zenginlik kaynağınızdır.</p>
        `,
        "Boğa": `
            <p><strong>Şans & Büyüme Alanı:</strong> Maddi yatırımlar, gayrimenkul, üretim ve sabırla değer inşa etme. Somut kaynakları doğru yönettiğinizde bereketiniz katlanarak artar.</p>
            <p><strong>Bolluk Felsefesi:</strong> Doğayla uyum içinde yaşamak, huzurlu ve sağlam temelli projelere odaklanmak.</p>
        `,
        "İkizler": `
            <p><strong>Şans & Büyüme Alanı:</strong> İletişim, ticaret, yayıncılık, yazarlık ve bilgi ağları. Çok yönlü projeler, yeni diller ve sosyal köprüler size beklenmedik kapılar açar.</p>
            <p><strong>Bolluk Felsefesi:</strong> Bilgiyi paylaşmak ve sürekli öğrenmeye açık olmak.</p>
        `,
        "Yengeç": `
            <p><strong>Şans & Büyüme Alanı (Jüpiter Yücelimde):</strong> Aile, ev/yerleşim, şefkat, besleme ve insanlara güvenli alan sağlama. Kalbinizi açtığınızda ve başkalarına koruyucu olduğunuzda hayat size en cömert hediyelerini sunar.</p>
            <p><strong>Bolluk Felsefesi:</strong> Duygusal cömertlik ve güçlü aidiyet bağı kurmak.</p>
        `,
        "Aslan": `
            <p><strong>Şans & Büyüme Alanı:</strong> Yaratıcılık, sahne sanatları, liderlik ve cömertlik. Işığınızı sergilemekten çekinmediğinizde ve insanlara ilham verdiğinizde krallara layık fırsatlar bulursunuz.</p>
            <p><strong>Bolluk Felsefesi:</strong> Kalpten gelen cömertlik ve yaşama sevinci aşılamak.</p>
        `,
        "Başak": `
            <p><strong>Şans & Büyüme Alanı:</strong> Sağlık, hizmet sektörü, detaylı analiz, organizasyon ve sistem kurma. İşinizi kusursuz ve faydalı yaptığınızda başarı kendiliğinden gelir.</p>
            <p><strong>Bolluk Felsefesi:</strong> Pratik çözümler üretmek ve başkalarının hayatını kolaylaştırmak.</p>
        `,
        "Terazi": `
            <p><strong>Şans & Büyüme Alanı:</strong> Ortaklıklar, diplomasi, adalet, halkla ilişkiler ve estetik/sanat. Doğru insanlarla iş birliği kurduğunuzda servet ve itibar kazanırsınız.</p>
            <p><strong>Bolluk Felsefesi:</strong> Eşitlik, zarafet ve adil kazan-kazan modelleri yaratmak.</p>
        `,
        "Akrep": `
            <p><strong>Şans & Büyüme Alanı:</strong> Derin araştırmalar, ortak finansal kaynaklar, psikoloji, kriz yönetimi ve dönüşüm. Zorlu krizleri fırsata çevirme yeteneğiniz rakipsizdir.</p>
            <p><strong>Bolluk Felsefesi:</strong> Yüzeyin altına inmek ve tabuları zenginliğe dönüştürmek.</p>
        `,
        "Yay": `
            <p><strong>Şans & Büyüme Alanı (Jüpiter Kendi Evinde):</strong> Uluslararası ilişkiler, yabancı ülkeler, akademi, yüksek felsefe ve yayıncılık. En yüksek şans aurasına sahipsinizdir; vizyonunuzu geniş tuttukça dünya önünüze serilir.</p>
            <p><strong>Bolluk Felsefesi:</strong> Sınırsız iyimserlik, hakikati aramak ve sınırları aşmak.</p>
        `,
        "Oğlak": `
            <p><strong>Şans & Büyüme Alanı:</strong> Kurumsal yapılar, uzun vadeli kariyer projeleri, gayrimenkul ve stratejik yönetim. Disiplinli ve sabırlı adımlarla zirveye ulaşırsınız.</p>
            <p><strong>Bolluk Felsefesi:</strong> Sorumluluk almak ve zamanın sınavına dayanan eserler inşa etmek.</p>
        `,
        "Kova": `
            <p><strong>Şans & Büyüme Alanı:</strong> Teknoloji, yapay zeka, inovasyon, dernekler ve toplumsal projeler. Sıradışı ve vizyoner fikirleriniz sizi zenginleştirir.</p>
            <p><strong>Bolluk Felsefesi:</strong> Kolektife fayda sağlamak ve özgürlüğü savunmak.</p>
        `,
        "Balık": `
            <p><strong>Şans & Büyüme Alanı (Jüpiter Kendi Evinde):</strong> Sanat, sinema, müzik, maneviyat, şifacılık ve evrensel şefkat. Sezgilerinize ve evrensel akışa güvendiğinizde mucizeler yaşarsınız.</p>
            <p><strong>Bolluk Felsefesi:</strong> İlahi akışa güvenmek ve koşulsuz sevgi yaymak.</p>
        `
    };

    const retroText = isRetro ? "♃ Retro (İçselleştirilmiş Ruhsal Şans)" : "♃ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-jupiter-retro-box"><strong>Doğum Anında Jüpiter Retro:</strong> Jüpiter doğum haritanızda gerilemedeydi. Bu konum, şansı dış dünyadaki tesadüflerden ziyade, kendi içsel bilgeliğiniz, ruhsal inancınız ve öz değeriniz üzerinden çekmenizi sağlar. Kendi felsefenizi oluşturduğunuzda en büyük büyüme gerçekleşir.</div>`;
    }

    document.getElementById('hc-jupiter-deg-badge').innerText = `♃ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-jupiter-motion-badge').innerText = retroText;
    document.getElementById('hc-jupiter-value').innerText = `${signObj.symbol} Jüpiter Burcunuz: ${signObj.name}`;
    document.getElementById('hc-jupiter-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-jupiter-desc').innerHTML = jupiterYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-jupiter-burcu-result').classList.add('visible');
    document.getElementById('hc-jupiter-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
