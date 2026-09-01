function hcSaturnBurcuHesapla() {
    const tarihStr = document.getElementById('hc-saturn-tarih').value;

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

    function calcSaturn(jdVal) {
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

        // Saturn Helio
        const N_s = norm(113.6634 + 2.38980e-5 * dVal);
        const i_s = 2.4886 - 1.081e-7 * dVal;
        const w_s = norm(339.3939 + 2.97661e-5 * dVal);
        const a_s = 9.55475;
        const e_s = 0.055546 - 9.499e-9 * dVal;
        const M_s = norm(316.9670 + 0.0334442282 * dVal);

        let E_s = M_s;
        for (let k = 0; k < 5; k++) {
            E_s = E_s - (E_s - e_s * (180 / Math.PI) * Math.sin(E_s * rad) - M_s) / (1 - e_s * Math.cos(E_s * rad));
        }

        const xv_s = a_s * (Math.cos(E_s * rad) - e_s);
        const yv_s = a_s * (Math.sqrt(1 - e_s * e_s) * Math.sin(E_s * rad));
        const v_s = norm(Math.atan2(yv_s, xv_s) / rad);
        const r_s = Math.sqrt(xv_s * xv_s + yv_s * yv_s);

        const xh = r_s * (Math.cos(N_s * rad) * Math.cos((v_s + w_s) * rad) - Math.sin(N_s * rad) * Math.sin((v_s + w_s) * rad) * Math.cos(i_s * rad));
        const yh = r_s * (Math.sin(N_s * rad) * Math.cos((v_s + w_s) * rad) + Math.cos(N_s * rad) * Math.sin((v_s + w_s) * rad) * Math.cos(i_s * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcSaturn(JD);
    const lon2 = calcSaturn(JD + 1);
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

    const saturnYorumlari = {
        "Koç": `
            <p><strong>Karmik Yaşam Dersi:</strong> Özgüven, cesaret ve kendi gücünü başkalarına bağımlı olmadan inşa etme sınavı. Hayatınızın ilk yıllarında inisiyatif almakta çekingenlik yaşayabilir, olgunlaştıkça sarsılmaz bir öncü lidere dönüşürsünüz.</p>
            <p><strong>Ustalık Alanı:</strong> Disiplinli cesaret ve bağımsız projeleri başarıyla tamamlama gücü.</p>
        `,
        "Boğa": `
            <p><strong>Karmik Yaşam Dersi:</strong> Maddi güvenlik, öz değer ve kaynak yönetimi sınavı. Kendi emeğinizle kalıcı zenginlik üretmeyi ve yokluk korkusunu yenmeyi öğrenirsiniz.</p>
            <p><strong>Ustalık Alanı:</strong> Sarsılmaz finansal dayanıklılık ve kalıcı değer inşa etme dehası.</p>
        `,
        "İkizler": `
            <p><strong>Karmik Yaşam Dersi:</strong> Zihinsel odaklanma, derinleşme ve bilgiyi ciddiyetle yapılandırma sınavı. Yüzeysel gevezelikten uzaklaşıp alanınızda uzman bir yazar, hatip veya araştırmacı olursunuz.</p>
            <p><strong>Ustalık Alanı:</strong> Yapılandırılmış iletişim, akademik disiplin ve sistemli düşünce.</p>
        `,
        "Yengeç": `
            <p><strong>Karmik Yaşam Dersi:</strong> Duygusal olgunluk, ailevi sorumluluklar ve içsel güvenliği dış dünyadan değil kendi içinden sağlama sınavı. Kendi duygularınızın ebeveyni olmayı öğrenirsiniz.</p>
            <p><strong>Ustalık Alanı:</strong> Duygusal dayanıklılık ve sevdiklerine sarsılmaz bir kale olma ustalığı.</p>
        `,
        "Aslan": `
            <p><strong>Karmik Yaşam Dersi:</strong> Gerçek öz sevgi, yaratıcı otorite ve alkış beklemeden kalpten liderlik etme sınavı. Egoyu aşıp gerçek bir kraliyet asaletiyle parlamayı öğrenirsiniz.</p>
            <p><strong>Ustalık Alanı:</strong> Saygın liderlik, kalıcı sanatsal üretim ve cömert mentorluk.</p>
        `,
        "Başak": `
            <p><strong>Karmik Yaşam Dersi:</strong> Mükemmeliyetçilik kaygısını aşma, iş ahlakı ve beden sağlığını koruma sınavı. Kaosu kusursuz sistemlere dönüştürmeyi öğrenirsiniz.</p>
            <p><strong>Ustalık Alanı:</strong> Kusursuz süreç yönetimi, sağlık disiplini ve pratik problem çözme.</p>
        `,
        "Terazi": `
            <p><strong>Karmik Yaşam Dersi (Satürn Yücelimde):</strong> Evlilik, ortaklıklar, adalet ve etik sınırlar kurma sınavı. Gerçek eşitliğe ve vefaya dayalı uzun ömürlü ilişkiler inşa edersiniz.</p>
            <p><strong>Ustalık Alanı:</strong> Üst düzey diplomasi, adil yargı ve sarsılmaz ortaklık taahhütleri.</p>
        `,
        "Akrep": `
            <p><strong>Karmik Yaşam Dersi:</strong> Kriz yönetimi, güç savaşları, psikolojik derinlik ve kontrol arzusunu teslimiyete dönüştürme sınavı. En zorlu travmaları aşarak ruhsal bir simyacıya dönüşürsünüz.</p>
            <p><strong>Ustalık Alanı:</strong> Psikolojik güç, kriz çözücülük ve finansal yeniden doğuş.</p>
        `,
        "Yay": `
            <p><strong>Karmik Yaşam Dersi:</strong> Kendi inanç sistemini, felsefesini ve ahlak anlayışını inşa etme sınavı. Dogmalardan arınıp gerçek bir bilge ve öğretmen olursunuz.</p>
            <p><strong>Ustalık Alanı:</strong> Yüksek vizyon, uluslararası uzmanlık ve felsefi bilgelik.</p>
        `,
        "Oğlak": `
            <p><strong>Karmik Yaşam Dersi (Satürn Kendi Evinde):</strong> Saf otorite, stratejik sabır, kurumsal inşa ve zirve sınavı. Hayatınızın ikinci yarısında toplumun en saygın ve güçlü figürlerinden biri olursunuz.</p>
            <p><strong>Ustalık Alanı:</strong> Kurumsal liderlik, stratejik sabır ve zamana meydan okuyan başarı.</p>
        `,
        "Kova": `
            <p><strong>Karmik Yaşam Dersi (Satürn Kendi Evinde):</strong> Toplumsal sorumluluk, geleceği yapılandırma ve kolektif projelere liderlik etme sınavı. İdealist fikirleri somut kurumlara dönüştürürsünüz.</p>
            <p><strong>Ustalık Alanı:</strong> İnovatif sistemler, teknolojik ve toplumsal örgütlenme dehası.</p>
        `,
        "Balık": `
            <p><strong>Karmik Yaşam Dersi:</strong> Maneviyatı somutlaştırma, kurban psikolojisinden çıkıp sağlıklı sınırlar koyma sınavı. Sanatsal ve ruhsal ilhamları dünyada somut şifaya dönüştürürsünüz.</p>
            <p><strong>Ustalık Alanı:</strong> Ruhsal olgunluk, şifacılık ve sanatsal disiplin.</p>
        `
    };

    const retroText = isRetro ? "♄ Retro (Derin Karmik Hafıza)" : "♄ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-saturn-retro-box"><strong>Doğum Anında Satürn Retro:</strong> Satürn doğum anınızda geri hareketteydi. Bu durum geçmiş yaşam deneyimlerinden gelen güçlü bir sorumluluk ve içsel vicdan mekanizması verir. Kendinize karşı aşırı katı olmaktan kaçınarak, zamanın size getirdiği olgunluğa güvenmelisiniz.</div>`;
    }

    document.getElementById('hc-saturn-deg-badge').innerText = `♄ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-saturn-motion-badge').innerText = retroText;
    document.getElementById('hc-saturn-value').innerText = `${signObj.symbol} Satürn Burcunuz: ${signObj.name}`;
    document.getElementById('hc-saturn-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-saturn-desc').innerHTML = saturnYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-saturn-burcu-result').classList.add('visible');
    document.getElementById('hc-saturn-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

