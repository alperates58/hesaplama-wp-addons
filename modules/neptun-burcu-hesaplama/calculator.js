function hcNeptunBurcuHesapla() {
    const tarihStr = document.getElementById('hc-neptun-tarih').value;

    if (!tarihStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const parts = tarihStr.split('-').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = 12;

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

    function calcNeptune(jdVal) {
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

        // Neptune Helio
        const N_ne = norm(131.7806 + 3.0173e-5 * dVal);
        const i_ne = 1.7700 - 2.55e-7 * dVal;
        const w_ne = norm(272.8461 - 6.027e-6 * dVal);
        const a_ne = 30.05826 + 3.313e-8 * dVal;
        const e_ne = 0.008606 + 2.15e-9 * dVal;
        const M_ne = norm(260.2471 + 0.005995147 * dVal);

        let E_ne = M_ne;
        for (let k = 0; k < 5; k++) {
            E_ne = E_ne - (E_ne - e_ne * (180 / Math.PI) * Math.sin(E_ne * rad) - M_ne) / (1 - e_ne * Math.cos(E_ne * rad));
        }

        const xv_ne = a_ne * (Math.cos(E_ne * rad) - e_ne);
        const yv_ne = a_ne * (Math.sqrt(1 - e_ne * e_ne) * Math.sin(E_ne * rad));
        const v_ne = norm(Math.atan2(yv_ne, xv_ne) / rad);
        const r_ne = Math.sqrt(xv_ne * xv_ne + yv_ne * yv_ne);

        const xh = r_ne * (Math.cos(N_ne * rad) * Math.cos((v_ne + w_ne) * rad) - Math.sin(N_ne * rad) * Math.sin((v_ne + w_ne) * rad) * Math.cos(i_ne * rad));
        const yh = r_ne * (Math.sin(N_ne * rad) * Math.cos((v_ne + w_ne) * rad) + Math.cos(N_ne * rad) * Math.sin((v_ne + w_ne) * rad) * Math.cos(i_ne * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcNeptune(JD);
    const lon2 = calcNeptune(JD + 1);
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

    const neptunYorumlari = {
        "Koç": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Ruhsal öncülük, bireysel uyanış ve spiritüel cesaret nesli. Kendi inançlarını cesaretle savunur ve yeni ruhsal akımlara kapı açarsınız.</p>
            <p><strong>İlham Kaynağı:</strong> Kendi iç sesine güvenip cesurca harekete geçmek.</p>
        `,
        "Boğa": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Doğanın kutsallığı, yeryüzüyle derin mistik bağ ve estetik yaratılış sevgisi. Maddi dünyayı ilahi bir sanat eseri olarak görürsünüz.</p>
            <p><strong>İlham Kaynağı:</strong> Toprak, doğal dokular ve bedensel dinginlik.</p>
        `,
        "İkizler": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Telepatik iletişim, kelimelerle büyüleme, şiirsel deha ve bilginin ruhsal boyutu. Fikirlerinizi mistik bir zarafetle aktarırsınız.</p>
            <p><strong>İlham Kaynağı:</strong> Masallar, mitoloji ve rüyaları kelimelere dökmek.</p>
        `,
        "Yengeç": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Derin vatan/kök sevgisi, atalarla ruhsal bağ, şefkat ve koruyucu enerji. Duygusal dünyanız okyanuslar kadar derindir.</p>
            <p><strong>İlham Kaynağı:</strong> Ailevi hatıralar, su kenarları ve nostalji.</p>
        `,
        "Aslan": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Sinema, sahne büyüleyiciliği, sanatsal dram ve ilahi aşk ideali. Sanatınızla insanları büyüleme ve hayal dünyasına taşıma gücünüz vardır.</p>
            <p><strong>İlham Kaynağı:</strong> Büyük aşklar, yaratıcı ilham ve sahne ışıkları.</p>
        `,
        "Başak": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Şifacılık, doğal tıp, hizmet aşkı ve günlük rutinlerde kutsallığı bulma. Başkalarının acısını dindirmek ruhunuzu besler.</p>
            <p><strong>İlham Kaynağı:</strong> Şifalı bitkiler, sade yaşam ve fedakarca yardım etmek.</p>
        `,
        "Terazi": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> İdealize edilen kusursuz aşk, evrensel barış arzusu, müzik ve resimde eşsiz zarafet. Ruh eşi arayışınız çok derindir.</p>
            <p><strong>İlham Kaynağı:</strong> Klasik müzik, estetik sanatlar ve derin aşk ortaklığı.</p>
        `,
        "Akrep": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Metafizik, okült sırlar, ölüm ötesi merakı ve derin psikolojik arınma. Krizlerin içindeki ilahi anlamı ve dönüşümü hissedersiniz.</p>
            <p><strong>İlham Kaynağı:</strong> Gizemler, derin psikoloji ve ruhsal simya.</p>
        `,
        "Yay": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Evrensel dinler, ruhsal seyahatler, gurusallık ve sınırsız inanç. Farklı kültürlerin mistik öğretilerini birleştiren bir vizyonunuz vardır.</p>
            <p><strong>İlham Kaynağı:</strong> Uzak diyarlar, felsefe ve kutsal mekanlar.</p>
        `,
        "Oğlak": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Hayalleri somut kurumlara dönüştürme, mimari zarafet ve pratik maneviyat. Ruhsal disiplini dünyevi başarıyla taçlandırırsınız.</p>
            <p><strong>İlham Kaynağı:</strong> Zamana meydan okuyan eserler ve dağ zirveleri.</p>
        `,
        "Kova": `
            <p><strong>Ruhsal Vizyon & Sezgi:</strong> Kolektif bilinçaltı ağı, insani ütopyalar, bilimkurgu ve evrensel kardeşlik hayali. Geleceğin ruhsal dünyasını tasarlarsınız.</p>
            <p><strong>İlham Kaynağı:</strong> Kolektif projeler, yıldızlar ve insanlığın kurtuluş ideali.</p>
        `,
        "Balık": `
            <p><strong>Ruhsal Vizyon & Sezgi (Neptün Kendi Evinde):</strong> Saf ilahi aşk, sınır tanımayan evrensel empati, psişik hassasiyet ve sanatsal dâhilik. Evrenle aranızdaki perde çok incedir.</p>
            <p><strong>İlham Kaynağı:</strong> Meditasyon, müzik, okyanuslar ve ilahi teslimiyet.</p>
        `
    };

    const retroText = isRetro ? "♆ Retro (Derin İçsel Mistik Sezgi)" : "♆ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-neptun-retro-box"><strong>Doğum Anında Neptün Retro:</strong> Neptün doğum anınızda geri hareketteydi. Bu durum dış dünyadaki illüzyonlara ve hayal kırıklıklarına karşı içeride çok sağlam bir sezgisel radar geliştirmenizi sağlar. Ruhsal dünyanızı sessizce, kendi içinizde derinleştirirsiniz.</div>`;
    }

    document.getElementById('hc-neptun-deg-badge').innerText = `♆ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-neptun-badge-motion').innerText = retroText;
    document.getElementById('hc-neptun-value').innerText = `${signObj.symbol} Neptün Burcunuz: ${signObj.name}`;
    document.getElementById('hc-neptun-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-neptun-desc').innerHTML = neptunYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-neptun-burcu-result').classList.add('visible');
    document.getElementById('hc-neptun-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

