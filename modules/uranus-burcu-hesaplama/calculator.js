function hcUranusBurcuHesapla() {
    const tarihStr = document.getElementById('hc-uranus-tarih').value;

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

    function calcUranus(jdVal) {
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

        // Uranus Helio
        const N_u = norm(74.0005 + 1.3978e-5 * dVal);
        const i_u = 0.7733 + 1.9e-8 * dVal;
        const w_u = norm(96.6612 + 3.0565e-5 * dVal);
        const a_u = 19.18171 - 1.55e-8 * dVal;
        const e_u = 0.047318 + 7.45e-9 * dVal;
        const M_u = norm(142.5905 + 0.011725806 * dVal);

        let E_u = M_u;
        for (let k = 0; k < 5; k++) {
            E_u = E_u - (E_u - e_u * (180 / Math.PI) * Math.sin(E_u * rad) - M_u) / (1 - e_u * Math.cos(E_u * rad));
        }

        const xv_u = a_u * (Math.cos(E_u * rad) - e_u);
        const yv_u = a_u * (Math.sqrt(1 - e_u * e_u) * Math.sin(E_u * rad));
        const v_u = norm(Math.atan2(yv_u, xv_u) / rad);
        const r_u = Math.sqrt(xv_u * xv_u + yv_u * yv_u);

        const xh = r_u * (Math.cos(N_u * rad) * Math.cos((v_u + w_u) * rad) - Math.sin(N_u * rad) * Math.sin((v_u + w_u) * rad) * Math.cos(i_u * rad));
        const yh = r_u * (Math.sin(N_u * rad) * Math.cos((v_u + w_u) * rad) + Math.cos(N_u * rad) * Math.sin((v_u + w_u) * rad) * Math.cos(i_u * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcUranus(JD);
    const lon2 = calcUranus(JD + 1);
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

    const uranusYorumlari = {
        "Koç": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Bireysel girişimcilik, bağımsızlık ve teknolojik öncülük nesli. Kalıplaşmış tabuları anında yıkıp kendi kurallarınızı koyma cesaretiniz vardır.</p>
            <p><strong>Özgürleşme Alanı:</strong> Kimseye hesap vermeden kendi yolunda ilk adımı atan özgün liderlik.</p>
        `,
        "Boğa": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Dijital ekonomi, kripto varlıklar, tarım teknolojileri ve yeni nesil maddi değerler devrimi. Maddi dünyayı ve güvenliği yeniden tanımlarsınız.</p>
            <p><strong>Özgürleşme Alanı:</strong> Geleneksel mülkiyet kalıplarını kırıp sürdürülebilir yeni değer sistemleri kurmak.</p>
        `,
        "İkizler": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Kuantum iletişim, yapay zeka, nöro-bağlantılar ve bilginin ışık hızında paylaşımı. Zihniniz sıradışı bağlantılar kurma dehasına sahiptir.</p>
            <p><strong>Özgürleşme Alanı:</strong> Sansürsüz, sınır tanımayan fikir ve bilgi akışı.</p>
        `,
        "Yengeç": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Aile ve yuva kavramının yeniden keşfi, dijital göçebelik, kolektif yaşam alanları ve psikolojik farkındalık devrimi.</p>
            <p><strong>Özgürleşme Alanı:</strong> Geleneksel kabilevi baskılardan sıyrılıp kendi seçtiğin ruhtaşlarıyla bağ kurmak.</p>
        `,
        "Aslan": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Bireysel sanat, eğlence sektörü devrimi, yaratıcı deha ve sıradışı sahne performansları. Kendi benzersizliğinizi tüm cesaretinizle haykırırsınız.</p>
            <p><strong>Özgürleşme Alanı:</strong> Standart beğenileri yıkıp kendi özgün yaratıcılığını sergilemek.</p>
        `,
        "Başak": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Biyoteknoloji, sağlık devrimi, çalışma hayatının otomasyonu ve yapay zekalı analiz sistemleri. Kusursuz verimlilik üretirsiniz.</p>
            <p><strong>Özgürleşme Alanı:</strong> Rutin iş yükünden teknoloji sayesinde özgürleşmek.</p>
        `,
        "Terazi": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> İlişkilerde ve evlilikte geleneksel kalıpların yıkılması, insan hakları, eşitlik ve küresel barış adaleti arayışı.</p>
            <p><strong>Özgürleşme Alanı:</strong> Bağımlı ilişki modellerinden çıkıp iki özgür bireyin denk ortaklığına geçmek.</p>
        `,
        "Akrep": `
            <p><strong>Devrim ve İnovasyon Arketipi (Uranüs Yücelimde):</strong> Derin psikolojik şifa, cinsellik tabularının yıkılması, yenilenebilir enerji ve kriz simyası. En derin karanlıkları aydınlatan sezgisel bir dehanız vardır.</p>
            <p><strong>Özgürleşme Alanı:</strong> Korkuları ve tabuları aşarak sınırsız bir içsel güce ulaşmak.</p>
        `,
        "Yay": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Küresel seyahat, inanç ve felsefe devrimleri, dijital eğitim ve sınırların kaldırılması. Vizyonunuz tüm dünyayı kucaklar.</p>
            <p><strong>Özgürleşme Alanı:</strong> Dogmatik düşüncelerden arınıp evrensel bilince uyanmak.</p>
        `,
        "Oğlak": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Devlet yapılarının dijitalleşmesi, yeni nesil iş modelleri ve eski köhneleşmiş hiyerarşilerin yıkılarak liyakatli sistemlere dönüşmesi.</p>
            <p><strong>Özgürleşme Alanı:</strong> Bürokratik prangalardan kurtulup somut, modern eserler inşa etmek.</p>
        `,
        "Kova": `
            <p><strong>Devrim ve İnovasyon Arketipi (Uranüs Kendi Evinde):</strong> İnternet, kolektif insanlık ağı, uzay çağı teknolojileri ve insani özgürlüklerin doruk noktası. Tam bir vizyoner dâhisinizdir.</p>
            <p><strong>Özgürleşme Alanı:</strong> Mutlak zihinsel özgürlük ve insanlığa hizmet eden devrimci buluşlar.</p>
        `,
        "Balık": `
            <p><strong>Devrim ve İnovasyon Arketipi:</strong> Spiritüel uyanış, bilinçaltı sanatı, sanal gerçeklik ve evrensel empati devrimi. Hayallerle gerçeği teknoloji ve ilhamla birleştirirsiniz.</p>
            <p><strong>Özgürleşme Alanı:</strong> Maddi sınırları aşan ruhsal birlik ve yaratıcı deha.</p>
        `
    };

    const retroText = isRetro ? "♅ Retro (İçsel İsyankar & Özgün Zeka)" : "♅ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-uranus-retro-box"><strong>Doğum Anında Uranüs Retro:</strong> Uranüs doğum anınızda geri hareketteydi. Bu durum dış dünyada isyan çıkarmak yerine, kendi zihinsel özgürlüğünüzü ve sıradışı yaratıcılığınızı içeride çok özgün ve bağımsız bir şekilde inşa ettiğinizi gösterir. Kalıplara uymayan düşünce yapınız en büyük zenginliğinizdir.</div>`;
    }

    document.getElementById('hc-uranus-deg-badge').innerText = `♅ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-uranus-motion-badge').innerText = retroText;
    document.getElementById('hc-uranus-value').innerText = `${signObj.symbol} Uranüs Burcunuz: ${signObj.name}`;
    document.getElementById('hc-uranus-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-uranus-desc').innerHTML = uranusYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-uranus-burcu-result').classList.add('visible');
    document.getElementById('hc-uranus-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

