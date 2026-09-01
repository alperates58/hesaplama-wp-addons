function hcVenusBurcuHesapla() {
    const tarihStr = document.getElementById('hc-venus-tarih').value;
    const saatStr = document.getElementById('hc-venus-saat').value;

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

    function calcVenus(jdVal) {
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

        // Venus Helio
        const N_v = norm(76.6799 + 2.46590e-5 * dVal);
        const i_v = 3.3946 + 2.75e-8 * dVal;
        const w_v = norm(54.8910 + 1.38374e-5 * dVal);
        const a_v = 0.723332;
        const e_v = 0.006773 - 1.302e-9 * dVal;
        const M_v = norm(48.0052 + 1.6021302244 * dVal);

        let E_v = M_v;
        for (let k = 0; k < 5; k++) {
            E_v = E_v - (E_v - e_v * (180 / Math.PI) * Math.sin(E_v * rad) - M_v) / (1 - e_v * Math.cos(E_v * rad));
        }

        const xv_v = a_v * (Math.cos(E_v * rad) - e_v);
        const yv_v = a_v * (Math.sqrt(1 - e_v * e_v) * Math.sin(E_v * rad));
        const v_v = norm(Math.atan2(yv_v, xv_v) / rad);
        const r_v = Math.sqrt(xv_v * xv_v + yv_v * yv_v);

        const xh = r_v * (Math.cos(N_v * rad) * Math.cos((v_v + w_v) * rad) - Math.sin(N_v * rad) * Math.sin((v_v + w_v) * rad) * Math.cos(i_v * rad));
        const yh = r_v * (Math.sin(N_v * rad) * Math.cos((v_v + w_v) * rad) + Math.cos(N_v * rad) * Math.sin((v_v + w_v) * rad) * Math.cos(i_v * rad));

        const xg = xh - Xe;
        const yg = yh - Ye;
        return norm(Math.atan2(yg, xg) / rad);
    }

    const lon1 = calcVenus(JD);
    const lon2 = calcVenus(JD + 1);
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

    const venusYorumlari = {
        "Koç": `
            <p><strong>Aşk & Flört Tarzı:</strong> Tutkulu, cesur, doğrudan ve avcı ruhlu bir aşık. Birinden hoşlandığınızda bekleyemez, ilk adımı siz atarsınız. İlişkide heyecan, fetih ve dinamizm ararsınız.</p>
            <p><strong>Değer ve Estetik:</strong> Canlı renkler, spor ve iddialı parçalar. Maddi konularda cesurca harcama eğilimi.</p>
        `,
        "Boğa": `
            <p><strong>Aşk & Flört Tarzı (Venüs Kendi Evinde):</strong> Sadık, tensel, güven arayan ve romantik. Dokunmak, sarılmak ve huzurlu bir ilişki yaşamak temel arzunuzdur. Kolay vazgeçmezsiniz.</p>
            <p><strong>Değer ve Estetik:</strong> Kalite, lüks, sanat, lezzetli sofralar ve doğallık. Maddi güvenceyi ve birikimi çok seversiniz.</p>
        `,
        "İkizler": `
            <p><strong>Aşk & Flört Tarzı:</strong> Zihinsel flört ustası, esprili, konuşkan ve özgürlükçü. Sizi kalbinizden önce zihninizden etkileyen, derin sohbetler edebildiğiniz kişilere çekilirsiniz.</p>
            <p><strong>Değer ve Estetik:</strong> Modern, değişken, eğlenceli ve trend parçalar. Deneyimlere ve kitaplara para harcamayı seversiniz.</p>
        `,
        "Yengeç": `
            <p><strong>Aşk & Flört Tarzı:</strong> Şefkatli, koruyucu, duygusal ve ait olmak isteyen bir aşık. Sevdiklerinizi bir aile sıcaklığıyla sarar, koşulsuz sadakat ve derin bir güven bağı ararsınız.</p>
            <p><strong>Değer ve Estetik:</strong> Nostaljik, zarif, konforlu ve sıcak ev ortamı. Değerli anılara ve hatıralara çok önem verirsiniz.</p>
        `,
        "Aslan": `
            <p><strong>Aşk & Flört Tarzı:</strong> Görkemli, cömert, gururlu ve dramatik bir romantizm. Partnerinizi şımartır, büyük jestler yaparsınız. Sevgilinizle gurur duymak ve el üstünde tutulmak istersiniz.</p>
            <p><strong>Değer ve Estetik:</strong> Parlak, altın tonları, lüks tasarımlar ve gösterişli şıklık. Cömertçe harcamalar yaparsınız.</p>
        `,
        "Başak": `
            <p><strong>Aşk & Flört Tarzı:</strong> Hizmet ederek seven, sadık, düşünceli ve özenli. Sevginizi büyük laflarla değil, partnerinizin hayatını kolaylaştırarak ve ona destek olarak gösterirsiniz.</p>
            <p><strong>Değer ve Estetik:</strong> Sade, temiz, minimalist ve fonksiyonel şıklık. Bütçenizi dikkatli ve hesaplı yönetirsiniz.</p>
        `,
        "Terazi": `
            <p><strong>Aşk & Flört Tarzı (Venüs Kendi Evinde):</strong> Kusursuz zarafet, romantizm, eşitlik ve diplomasi. İlişki içinde çiçek açarsınız. Karşılıklı saygı ve incelik sizin için vazgeçilmezdir.</p>
            <p><strong>Değer ve Estetik:</strong> Üst düzey sanat zevki, moda, simetri ve pastel tonlar. Güzelliğe para harcamaktan çekinmezsiniz.</p>
        `,
        "Akrep": `
            <p><strong>Aşk & Flört Tarzı:</strong> Yoğun, tutkulu, manyetik ve ruhsal birleşme arayan aşık. Yüzeysel aşklara tahammül edemezsiniz; ya hep ya hiç felsefesiyle seversiniz. Mutlak sadakat beklersiniz.</p>
            <p><strong>Değer ve Estetik:</strong> Gizemli, derin renkler, çekici ve karizmatik tarz. Stratejik finansal yatırımlarda başarılısınızdır.</p>
        `,
        "Yay": `
            <p><strong>Aşk & Flört Tarzı:</strong> Özgür ruhlu, maceracı, neşeli ve felsefi ortaklık arayan aşık. Birlikte dünyayı keşfedebileceğiniz, size sınır koymayan partnerlerle mutlu olursunuz.</p>
            <p><strong>Değer ve Estetik:</strong> Etnik, bohem, rahat ve küresel tarz. Seyahatlere ve yeni deneyimlere yatırım yapmayı seversiniz.</p>
        `,
        "Oğlak": `
            <p><strong>Aşk & Flört Tarzı:</strong> Ciddi, güvenilir, olgun ve uzun vadeli taahhütler veren aşık. Sevginizi somut adımlarla kanıtlarsınız; zamanla güçlenen kalıcı bir bağ kurarsınız.</p>
            <p><strong>Değer ve Estetik:</strong> Klasik, zamansız, kaliteli ve prestijli parçalar. Akıllı ve kalıcı finansal birikimler yaparsınız.</p>
        `,
        "Kova": `
            <p><strong>Aşk & Flört Tarzı:</strong> Sıradışı, bağımsız, arkadaşlık temelli ve özgün aşık. Kalıplara sığmayan, entelektüel vizyon birliği kurabildiğiniz kişilere çekilirsiniz.</p>
            <p><strong>Değer ve Estetik:</strong> Aykırı, fütüristik, vintage ve orijinal kombinler. Yenilikçi projelere değer verirsiniz.</p>
        `,
        "Balık": `
            <p><strong>Aşk & Flört Tarzı (Venüs Yücelimde):</strong> Koşulsuz sevgi, masalsı romantizm, ruhsal adanmışlık ve evrensel şefkat. Karşınızdakini kusurlarıyla sever, büyüleyici bir aşk dünyası yaratırsınız.</p>
            <p><strong>Değer ve Estetik:</strong> Şiirsel, akışkan, deniz tonları ve sanatsal zarafet. Maddiyatı aşan ruhsal değerlere önem verirsiniz.</p>
        `
    };

    const retroText = isRetro ? "♀ Retro (Karmik Aşk ve İçsel Değer)" : "♀ Direkt Hareket";
    let retroDesc = "";
    if (isRetro) {
        retroDesc = `<div class="hc-venus-retro-box"><strong>Doğum Anında Venüs Retro:</strong> Venüs doğum haritanızda geri hareketteydi. Bu konum, aşka ve ilişkilere dair standart toplumsal beklentilerin ötesinde, çok derin ve karmik bir içsel değer anlayışı verir. Sevgiyi yüzeysel değil, ruhsal bir olgunlukla deneyimlersiniz.</div>`;
    }

    document.getElementById('hc-venus-deg-badge').innerText = `♀ ${degInSign}° ${minInSign}' ${signObj.name}`;
    document.getElementById('hc-venus-motion-badge').innerText = retroText;
    document.getElementById('hc-venus-value').innerText = `${signObj.symbol} Venüs Burcunuz: ${signObj.name}`;
    document.getElementById('hc-venus-meta').innerText = `${signObj.element} Elementi • ${signObj.modality} Nitelik`;
    document.getElementById('hc-venus-desc').innerHTML = venusYorumlari[signObj.name] + retroDesc;

    document.getElementById('hc-venus-burcu-result').classList.add('visible');
    document.getElementById('hc-venus-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

