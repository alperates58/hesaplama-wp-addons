function hcPlutonBurcuHesapla() {
    const tarihStr = document.getElementById('hc-pluton-tarih').value;

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

    function calcPluto(jdVal) {
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

        // Pluto Helio
        const N_p = norm(110.3034 + 3.79e-5 * dVal);
        const i_p = 17.14175 + 3.0e-8 * dVal;
        const w_p = norm(113.7632 + 2.0e-5 * dVal);
        const a_p = 39.4816867;
        const e_p = 0.24880766;
        const M_p = norm(14.868 + 0.00396 * dVal);

        let E_p = M_p;
        for (let k = 0; k < 6; k++) {
            E_p = E_p - (E_p - e_p * (180 / Math.PI) * Math.sin(E_p * rad) - M_p) / (1 - e_p * Math.cos(E_p * rad));
        }

        const xv_p = a_p * (Math.cos(E_p * rad) - e_p);
        const yv_p = a_p * (Math.sqrt(1 - e_p * e_p) * Math.sin(E_p * rad));
        const v_p = norm(Math.atan2(yv_p, xv_p) / rad);
        const r_p = Math.sqrt(xv_p * xv_p + yv_p * yv_p);

        const xh = r_p * (Math.cos(N_p * rad) * Math.cos((v_p + w_p) * rad) - Math.sin(N_p * rad) * Math.sin((v_p + w_p) * rad) * Math.cos(i_p * rad));
        const yh = r_p * (Math.sin(N_p * rad) * Math.cos((v_p + w_p) * rad) + Math.cos(N_p * rad) * Math.sin((v_p + w_p) * rad) * Math.cos(i_p * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcPluto(JD);
    const lon2 = calcPluto(JD + 1);
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

    const plutonYorumlari = {
        "Koç": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Bireysel irade devrimi, cesur öncülük ve küresel liderlik dönüşümü. Zorluklar karşısında asla boyun eğmez, her engeli bir basamağa çevirirsiniz.</p>
            <p><strong>Ruhsal Güç:</strong> Korkusuzca sıfırdan başlama ve kendi kaderini tayin etme iradesi.</p>
        `,
        "Boğa": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Finansal sistemlerin, toprak/maden kaynaklarının ve mülkiyet kavramının köklü dönüşümü. Krizlerden muazzam bir maddi ve bedensel dayanıklılıkla çıkarsınız.</p>
            <p><strong>Ruhsal Güç:</strong> Yıkılmaz sabır ve kalıcı güç inşa etme ustalığı.</p>
        `,
        "İkizler": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Bilginin, medyanın, dilin ve zihinsel yapıların güç savaşına dönüştüğü nesil. Sözlerinizle kitleleri dönüştürme kudretiniz vardır.</p>
            <p><strong>Ruhsal Güç:</strong> Zihinsel derinlik ve görünmeyen gerçekleri açığa çıkarma.</p>
        `,
        "Yengeç": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Aile, vatan, kökler ve duygusal güvenlik yapılarının krizlerle yeniden doğuşu. Sevdiklerinizi korumak için dağları yerinden oynatabilirsiniz.</p>
            <p><strong>Ruhsal Güç:</strong> Sarsılmaz duygusal direnç ve koruyucu güç.</p>
        `,
        "Aslan": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Bireysel karizma, atom enerjisi ve krallık gücünün dönüşümü. Kendi özgünlüğünüzü ortaya koyarak çevrenize güçlü bir manyetizma yayarsınız.</p>
            <p><strong>Ruhsal Güç:</strong> Yenilmez liderlik ateşi ve küllerinden doğan yaratıcılık.</p>
        `,
        "Başak": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Sağlık sistemleri, iş gücü, teknolojik verimlilik ve detayların kökten dönüşümü. Kaotik krizleri cerrahi bir hassasiyetle temizlersiniz.</p>
            <p><strong>Ruhsal Güç:</strong> Pratik kriz çözücülük ve kusursuz arınma disiplini.</p>
        `,
        "Terazi": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Evlilik, ortaklıklar, adalet ve hukuk sistemlerinde güç dengelerinin yeniden yazılması. İlişkilerdeki güç savaşlarını çözerek derin bir denge kurarsınız.</p>
            <p><strong>Ruhsal Güç:</strong> Diplomatik güç ve adaleti ne pahasına olursa olsun sağlama iradesi.</p>
        `,
        "Akrep": `
            <p><strong>Güç & Dönüşüm Simyası (Plüton Kendi Evinde):</strong> Saf ruhsal simya, psikolojik deha, metafizik güç ve küllerinden doğuşun zirvesi. En karanlık fırtınaları aşarak insanlara şifa olursunuz.</p>
            <p><strong>Ruhsal Güç:</strong> Mutlak dönüşüm, sezgisel delici bakış ve ölümcül krizleri zafere çevirme.</p>
        `,
        "Yay": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Küreselleşme, inanç devrimleri, dijital seyahat ve felsefi dogmaların yıkılması. Hakikati ararken tüm sınırları yerle bir edersiniz.</p>
            <p><strong>Ruhsal Güç:</strong> İnancın dönüştürücü gücü ve sınırsız vizyonerlik.</p>
        `,
        "Oğlak": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Küresel finans, devlet kurumları ve hiyerarşik yapıların kökten dönüşümü. Eski sistemleri yıkıp yerine liyakatli, sağlam kurumlar inşa edersiniz.</p>
            <p><strong>Ruhsal Güç:</strong> Stratejik güç, sabır ve kalıcı imparatorluk inşa etme.</p>
        `,
        "Kova": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Yapay zeka, kolektif insanlık gücü, uzay çağı ve toplumların dijital uyanışı. Gücü tek bir merkezden alıp kolektife devreden devrimci ruhtasınızdır.</p>
            <p><strong>Ruhsal Güç:</strong> Geleceği inşa eden kolektif zeka ve mutlak özgürlük iradesi.</p>
        `,
        "Balık": `
            <p><strong>Güç & Dönüşüm Simyası:</strong> Kolektif bilinçaltı arınması, evrensel şifa ve spiritüel krizlerin ilahi aşka dönüşümü. Ruhsal dünyayı kökten dönüştürme gücüne sahipsinizdir.</p>
            <p><strong>Ruhsal Güç:</strong> Evrensel sevgi simyası ve sınırsız teslimiyet gücü.</p>
        `
    };

    const retroText = isRetro ? "♇ Retro (Derin İçsel Güç & Gölge Simyası)" : "♇ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-pluton-retro-box"><strong>Doğum Anında Plüton Retro:</strong> Plüton doğum haritanızda geri hareketteydi. Bu konum, güç savaşlarını dış dünyada yürütmek yerine, kendi bilinçaltınızdaki gölgelerle yüzleşerek içeride olağanüstü bir psikolojik simya ve dayanıklılık geliştirmenizi sağlar. Kendi gücünüze güvenmeyi öğrendiğinizde yenilmez olursunuz.</div>`;
    }

    document.getElementById('hc-pluton-deg-badge').innerText = `♇ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-pluton-badge-motion').innerText = retroText;
    document.getElementById('hc-pluton-value').innerText = `${signObj.symbol} Plüton Burcunuz: ${signObj.name}`;
    document.getElementById('hc-pluton-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-pluton-desc').innerHTML = plutonYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-pluton-burcu-result').classList.add('visible');
    document.getElementById('hc-pluton-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

