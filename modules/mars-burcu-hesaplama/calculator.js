function hcMarsBurcuHesapla() {
    const tarihStr = document.getElementById('hc-mars-tarih').value;
    const saatStr = document.getElementById('hc-mars-saat').value;

    if (!tarihStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const parts = tarihStr.split('-').map(Number);
    const timeParts = (saatStr || '12:00').split(':').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = timeParts[0] + (timeParts[1] || 0) / 60;

    let tzOffset = 3;
    if (Y < 2016 || (Y === 2016 && M < 9)) {
        if (M > 3 && M < 10) tzOffset = 3;
        else if (M === 3 && D >= 25) tzOffset = 3;
        else if (M === 10 && D < 25) tzOffset = 3;
        else tzOffset = 2;
    }

    let ut = hour - tzOffset;
    let yCalc = Y, mCalc = M;
    if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
    const A = Math.floor(yCalc / 100);
    const B = 2 - A + Math.floor(A / 4);
    const JD = Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (ut / 24);

    const rad = Math.PI / 180;
    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    function calcMars(jdVal) {
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

        // Mars Helio
        const N_ma = norm(49.5574 + 2.11081e-5 * dVal);
        const i_ma = 1.8497 - 1.78e-8 * dVal;
        const w_ma = norm(286.5016 + 2.92961e-5 * dVal);
        const a_ma = 1.523688;
        const e_ma = 0.093405 + 2.516e-9 * dVal;
        const M_ma = norm(18.6021 + 0.5240207766 * dVal);

        let E_ma = M_ma;
        for (let k = 0; k < 5; k++) {
            E_ma = E_ma - (E_ma - e_ma * (180 / Math.PI) * Math.sin(E_ma * rad) - M_ma) / (1 - e_ma * Math.cos(E_ma * rad));
        }

        const xv_ma = a_ma * (Math.cos(E_ma * rad) - e_ma);
        const yv_ma = a_ma * (Math.sqrt(1 - e_ma * e_ma) * Math.sin(E_ma * rad));
        const v_ma = norm(Math.atan2(yv_ma, xv_ma) / rad);
        const r_ma = Math.sqrt(xv_ma * xv_ma + yv_ma * yv_ma);

        const xh = r_ma * (Math.cos(N_ma * rad) * Math.cos((v_ma + w_ma) * rad) - Math.sin(N_ma * rad) * Math.sin((v_ma + w_ma) * rad) * Math.cos(i_ma * rad));
        const yh = r_ma * (Math.sin(N_ma * rad) * Math.cos((v_ma + w_ma) * rad) + Math.cos(N_ma * rad) * Math.sin((v_ma + w_ma) * rad) * Math.cos(i_ma * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcMars(JD);
    const lon2 = calcMars(JD + 1);
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

    const marsYorumlari = {
        "Koç": `
            <p><strong>Eylem & Mücadele Gücü (Mars Kendi Evinde):</strong> Saf savaşçı arketipi. Durdurulamaz bir cesaret, anında eyleme geçme gücü ve öncülük arzusu. Engeller sizi yavaşlatmaz, aksine ateşler.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Çabuk parlar, saman alevi gibi anında söner. Kin tutmaz, doğrudan yüzleşirsiniz.</p>
        `,
        "Boğa": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Sarsılmaz dayanıklılık, metodik ve kararlı ilerleyiş. Bir hedefe kilitlendiğinizde dağları delecek bir sabır ve inatla sonuca ulaşırsınız.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Kolay öfkelenmezsiniz; ancak sabrınız taştığında volkan gibi kalıcı bir tepki verirsiniz.</p>
        `,
        "İkizler": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Zihinsel hız, kelimelerle savaşma becerisi ve çok yönlü aksiyon. Tartışmalarda ve müzakerelerde kıvrak zekanızla galip gelirsiniz.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> İronik, esprili veya iğneleyici sözlerle tepki verirsiniz. Enerjinizi çeşitlilik besler.</p>
        `,
        "Yengeç": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Koruyucu, sezgisel ve duygusal motivasyon. Sevdiklerinizi ve yuvanızı savunurken olağanüstü bir güç sergilersiniz.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Dolaylı tepkiler, kabuğuna çekilme veya pasif-agresiflik. Güvende hissetmek enerjinizi yükseltir.</p>
        `,
        "Aslan": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Asil, karizmatik, gururlu ve lider odaklı eylem. Büyük projelere cesaretle atılır, ilham vererek yönetirsiniz.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Gururunuz kırıldığında kükrersiniz. Alkış ve takdir enerjinizi katlar.</p>
        `,
        "Başak": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Stratejik, detaycı, kusursuz iş bitirici ve pratik enerji. Kaotik krizleri adım adım çözme ustalığınız vardır.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Eleştirel sözler ve mükemmeliyetçi baskı. İşleri yoluna koymak en büyük rahatlamanızdır.</p>
        `,
        "Terazi": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Diplomatik, adaleti savunan, müzakereci ve stratejik denge ustası. Çatışmaları zarafetle ve mantıkla çözersiniz.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Açık çatışmadan kaçınma, nezaketi koruma. Haksızlık karşısında güçlü bir barış savaşçısı olursunuz.</p>
        `,
        "Akrep": `
            <p><strong>Eylem & Mücadele Gücü (Mars Kendi Evinde):</strong> Muazzam içsel güç, stratejik sabır, odaklanma ve kriz yönetimi dehası. Asla pes etmez, hedefinize sessizce ulaşırsınız.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Soğukkanlı, derin ve unutmayan bir hafıza. Krizlerden küllerinizden doğarak çıkarsınız.</p>
        `,
        "Yay": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Maceracı, vizyoner, idealleri uğruna savaşan ve sınırsız iyimser enerji. Büyük keşifler ve inançlar peşinde koşarsınız.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Doğrudan, açık sözlü ve patavatsız tepkiler. Özgürlük kısıtlandığında isyan edersiniz.</p>
        `,
        "Oğlak": `
            <p><strong>Eylem & Mücadele Gücü (Mars Yücelimde):</strong> Demir gibi disiplin, çelik irade, stratejik sabır ve zirveye ulaşma hırsı. Enerjinizi boşa harcamaz, kalıcı imparatorluklar kurarsınız.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Son derece kontrollü, profesyonel ve sonuç odaklı tepkiler.</p>
        `,
        "Kova": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Sıradışı, devrimci, bağımsız ve toplumsal idealler peşinde koşan enerji. Geleneksel otoriteye meydan okursunuz.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> Soğuk mantık, entelektüel isyan ve kural tanımazlık.</p>
        `,
        "Balık": `
            <p><strong>Eylem & Mücadele Gücü:</strong> Sezgisel, sanatsal ilhamla hareket eden, fedakar ve manevi savaşçı. Mantığın tıkandığı yerde sezgilerinizle yol açarsınız.</p>
            <p><strong>Öfke ve Enerji Yönetimi:</strong> İçselleştirme, pasif direnç ve sanatsal üretimle öfkeyi dönüştürme.</p>
        `
    };

    const retroText = isRetro ? "♂ Retro (İçselleştirilmiş Savaşçı Enerjisi)" : "♂ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-mars-retro-box"><strong>Doğum Anında Mars Retro:</strong> Mars doğum haritanızda geri hareketteydi. Bu konum, fiziksel ve eylemsel enerjiyi dışa kontrolsüzce patlatmak yerine, içeride derin bir stratejiye ve zihinsel/ruhsal dayanıklılığa dönüştürür. Pasif-agresif kalıplara düşmeden kendi gücünüzü doğrudan sahiplenmeyi öğrenmek sizin en büyük gücünüzdür.</div>`;
    }

    document.getElementById('hc-mars-deg-badge').innerText = `♂ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-mars-motion-badge').innerText = retroText;
    document.getElementById('hc-mars-value').innerText = `${signObj.symbol} Mars Burcunuz: ${signObj.name}`;
    document.getElementById('hc-mars-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-mars-desc').innerHTML = marsYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-mars-burcu-result').classList.add('visible');
    document.getElementById('hc-mars-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

