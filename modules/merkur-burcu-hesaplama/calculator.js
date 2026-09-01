function hcMerkurBurcuHesapla() {
    const tarihStr = document.getElementById('hc-merkur-tarih').value;
    const saatStr = document.getElementById('hc-merkur-saat').value;

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

    function calcMercury(jdVal) {
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

        // Mercury Helio
        const N_m = norm(48.3313 + 3.24587e-5 * dVal);
        const i_m = 7.0047 + 5.00e-8 * dVal;
        const w_m = norm(29.1241 + 1.01444e-5 * dVal);
        const a_m = 0.387098;
        const e_m = 0.205635 + 5.59e-10 * dVal;
        const M_m = norm(168.6562 + 4.0923344368 * dVal);

        let E_m = M_m;
        for (let k = 0; k < 5; k++) {
            E_m = E_m - (E_m - e_m * (180 / Math.PI) * Math.sin(E_m * rad) - M_m) / (1 - e_m * Math.cos(E_m * rad));
        }

        const xv_m = a_m * (Math.cos(E_m * rad) - e_m);
        const yv_m = a_m * (Math.sqrt(1 - e_m * e_m) * Math.sin(E_m * rad));
        const v_m = norm(Math.atan2(yv_m, xv_m) / rad);
        const r_m = Math.sqrt(xv_m * xv_m + yv_m * yv_m);

        const xh = r_m * (Math.cos(N_m * rad) * Math.cos((v_m + w_m) * rad) - Math.sin(N_m * rad) * Math.sin((v_m + w_m) * rad) * Math.cos(i_m * rad));
        const yh = r_m * (Math.sin(N_m * rad) * Math.cos((v_m + w_m) * rad) + Math.cos(N_m * rad) * Math.sin((v_m + w_m) * rad) * Math.cos(i_m * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcMercury(JD);
    const lon2 = calcMercury(JD + 1);
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

    const merkurYorumlari = {
        "Koç": `
            <p><strong>Zihinsel Profil:</strong> Hızlı, doğrudan, cesur ve tartışmacı bir zeka. Düşüncelerinizi filtrelemeden hemen ifade edersiniz. Yeni fikirleri ilk başlatan siz olursunuz ancak detaylarda sıkılabilirsiniz.</p>
            <p><strong>İletişim Tarzı:</strong> Net, açık sözlü ve rekabetçi. Pasif-agresiflikten hoşlanmaz, doğrudan sonuca odaklanırsınız.</p>
        `,
        "Boğa": `
            <p><strong>Zihinsel Profil:</strong> Sakin, metodik, pratik ve somut düşünen bir zeka. Bir konuyu iyice sindirmeden karar vermezsiniz; öğrendiğiniz bilgiyi asla unutmazsınız.</p>
            <p><strong>İletişim Tarzı:</strong> Güven verici, ağırbaşlı ve gerçekçi. Boş tartışmalardan kaçınır, somut çözümlere odaklanırsınız.</p>
        `,
        "İkizler": `
            <p><strong>Zihinsel Profil (Merkür Kendi Evinde):</strong> Üstün kıvrak zeka, çok yönlü düşünme, hızlı öğrenme ve sınırsız merak. Bilgiyi işleme hızınız rakipsizdir.</p>
            <p><strong>İletişim Tarzı:</strong> Esprili, akıcı, ikna edici ve konuşkan. Sosyal ortamlarda bilgi köprüsü kurarsınız.</p>
        `,
        "Yengeç": `
            <p><strong>Zihinsel Profil:</strong> Sezgisel, fotografik hafızaya sahip ve duygularla düşünen bir zeka. Olayları kelimelerden ziyade yarattığı hislerle hatırlarsınız.</p>
            <p><strong>İletişim Tarzı:</strong> Şefkatli, dinleyici, empati dolu ve korumacı. Karşınızdakinin duygularını anında sezersiniz.</p>
        `,
        "Aslan": `
            <p><strong>Zihinsel Profil:</strong> Yaratıcı, vizyoner, dramatik ve lider odaklı zeka. Fikirlerinizi büyük bir özgüven ve sahne ışığıyla sunarsınız.</p>
            <p><strong>İletişim Tarzı:</strong> Etkileyici, ilham verici, karizmatik ve cömert. İnsanları konuşmalarınızla peşinizden sürüklersiniz.</p>
        `,
        "Başak": `
            <p><strong>Zihinsel Profil (Merkür Kendi Evinde & Yücelimde):</strong> Kusursuz analitik zeka, detay ustalığı, eleştirel düşünce ve problem çözme dehası. Kaosu anında organize edersiniz.</p>
            <p><strong>İletişim Tarzı:</strong> Net, organize, fayda odaklı ve mantıklı. Aksaklıkları hemen tespit edip çözüm sunarsınız.</p>
        `,
        "Terazi": `
            <p><strong>Zihinsel Profil:</strong> Diplomatik, adil, karşıt görüşleri tartan ve estetik düşünen bir zeka. Her konunun iki tarafını da anlamaya çalışırsınız.</p>
            <p><strong>İletişim Tarzı:</strong> Nazik, uzlaşmacı, zarif ve barışçıl. Çatışmaları zarafetle çözme yeteneğiniz vardır.</p>
        `,
        "Akrep": `
            <p><strong>Zihinsel Profil:</strong> Derin araştırmacı, psikanalitik ve dedektif zekası. Yalanı ve samimiyetsizliği anında fark eder, yüzeyin altındaki hakikati araştırırsınız.</p>
            <p><strong>İletişim Tarzı:</strong> Ketum, özlü, delici ve dönüştürücü. Çok konuşmaz ama tam 12'den vurursunuz.</p>
        `,
        "Yay": `
            <p><strong>Zihinsel Profil:</strong> Felsefi, geniş vizyonlu, iyimser ve büyük resmi gören zeka. Ayrıntılar yerine hayatın evrensel yasalarıyla ilgilenirsiniz.</p>
            <p><strong>İletişim Tarzı:</strong> Açık sözlü, esprili, motive edici ve dürüst. Farklı kültürleri ve dilleri öğrenmeye yatkınsınızdır.</p>
        `,
        "Oğlak": `
            <p><strong>Zihinsel Profil:</strong> Stratejik, disiplinli, kurumsal ve gerçekçi zeka. Zamanı ve kaynakları yönetme konusunda ustasınızdır.</p>
            <p><strong>İletişim Tarzı:</strong> Ciddi, öz, profesyonel ve otoriter. Sözlerinizin arkasında her zaman somut bir ağırlık vardır.</p>
        `,
        "Kova": `
            <p><strong>Zihinsel Profil:</strong> Orijinal, dahi zeka, teknolojik vizyon ve kolektif düşünce. Geleceğin fikirlerini bugünden üretirsiniz.</p>
            <p><strong>İletişim Tarzı:</strong> Özgürlükçü, mantıklı, hümanist ve sıradışı. Dogmaları ve kalıpları sorgulatırsınız.</p>
        `,
        "Balık": `
            <p><strong>Zihinsel Profil:</strong> Hayal gücü sınırsız, sanatsal, telepatik ve sembolik düşünen zeka. Mantığın ötesindeki ilham kanallarından beslenirsiniz.</p>
            <p><strong>İletişim Tarzı:</strong> Şiirsel, sezgisel, merhametli ve büyüleyici. Kelimelerin ötesinde ruhsal bir temas kurarsınız.</p>
        `
    };

    const retroText = isRetro ? "☿ Retro (İçe Dönük Derin Zeka)" : "☿ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-merkur-retro-box"><strong>Doğum Anında Merkür Retro:</strong> Doğumunuz sırasında Merkür gerilemedeydi. Bu durum, olayları toplumun standart kalıplarından farklı olarak içselleştirip derinlemesine sorgulayan, sezgisel ve felsefi bir zihinsel yapı kazandırır. Zihniniz dışarıya hemen tepki vermek yerine önce kendi iç dünyasında filtreleme yapar.</div>`;
    }

    document.getElementById('hc-merkur-deg-badge').innerText = `☿ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-merkur-motion-badge').innerText = retroText;
    document.getElementById('hc-merkur-value').innerText = `${signObj.symbol} Merkür Burcunuz: ${signObj.name}`;
    document.getElementById('hc-merkur-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-merkur-desc').innerHTML = merkurYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-merkur-burcu-result').classList.add('visible');
    document.getElementById('hc-merkur-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
