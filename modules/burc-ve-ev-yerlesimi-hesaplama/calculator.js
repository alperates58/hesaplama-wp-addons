let hcBeActiveMode = 'auto';

function hcBeSetMode(mode) {
    hcBeActiveMode = mode;
    document.getElementById('hc-be-btn-auto').classList.toggle('active', mode === 'auto');
    document.getElementById('hc-be-btn-manual').classList.toggle('active', mode === 'manual');
    document.getElementById('hc-be-auto-section').style.display = mode === 'auto' ? 'block' : 'none';
    document.getElementById('hc-be-manual-section').style.display = mode === 'manual' ? 'block' : 'none';
}

function hcBurcEvHesapla() {
    const signs = [
        { key: "koc", name: "Koç", icon: "♈", traits: "Cesur, öncü, hızlı ve doğrudan" },
        { key: "boga", name: "Boğa", icon: "♉", traits: "Sağlam, güvenli, huzurlu ve estetik" },
        { key: "ikizler", name: "İkizler", icon: "♊", traits: "Meraklı, konuşkan, hızlı ve çok yönlü" },
        { key: "yengec", name: "Yengeç", icon: "♋", traits: "Duygusal, korumacı, sezgisel ve anaç" },
        { key: "aslan", name: "Aslan", icon: "♌", traits: "Yaratıcı, lider, gururlu ve parlayan" },
        { key: "basak", name: "Başak", icon: "♍", traits: "Analitik, titiz, çalışkan ve hizmet odaklı" },
        { key: "terazi", name: "Terazi", icon: "♎", traits: "Zarif, diplomatik, adil ve uyumlu" },
        { key: "akrep", name: "Akrep", icon: "♏", traits: "Derin, tutkulu, stratejik ve dönüştürücü" },
        { key: "yay", name: "Yay", icon: "♐", traits: "İyimser, bilge, maceracı ve genişleyen" },
        { key: "oglak", name: "Oğlak", icon: "♑", traits: "Disiplinli, sabırlı, hırslı ve saygın" },
        { key: "kova", name: "Kova", icon: "♒", traits: "Özgün, hümanist, yenilikçi ve bağımsız" },
        { key: "balik", name: "Balık", icon: "♓", traits: "Sezgisel, merhametli, sanatsal ve mistik" }
    ];

    const houseThemes = [
        { num: 1, name: "1. Ev", title: "Kişilik, Benlik & Dış Görünüş", desc: "Dış dünyaya verdiğiniz ilk izlenim, fiziksel enerji ve hayata başlangıç tavrınız." },
        { num: 2, name: "2. Ev", title: "Para, Gelir & Öz Değer", desc: "Maddi kazanç yollarınız, bütçe yönetimi, sahip olunan yetenekler ve öz saygınız." },
        { num: 3, name: "3. Ev", title: "İletişim, Zihin & Yakın Çevre", desc: "Kardeşler, komşular, kısa seyahatler, ticaret, yazma ve düşünce tarzınız." },
        { num: 4, name: "4. Ev", title: "Yuva, Aile & Kökler (IC)", desc: "İç huzur, ebeveynler, gayrimenkul, özel yaşam ve bilinçaltı temelleriniz." },
        { num: 5, name: "5. Ev", title: "Aşk, Yaratıcılık & Hobiler", desc: "Romantik ilişkiler, çocuklar, sahne sanatları, eğlence ve spekülatif kazançlar." },
        { num: 6, name: "6. Ev", title: "İş Ortamı, Rutinler & Sağlık", desc: "Günlük çalışma temposu, beslenme, evcil hayvanlar ve hizmet anlayışınız." },
        { num: 7, name: "7. Ev", title: "Evlilik & Ortaklıklar (DSC)", desc: "Eş seçimi, uzun vadeli taahhütler, davalar ve açık ikili ilişkiler." },
        { num: 8, name: "8. Ev", title: "Dönüşüm, Ortak Paralar & Miras", desc: "Krediler, yatırımlar, gizemli konular, ameliyatlar ve kriz yönetimi." },
        { num: 9, name: "9. Ev", title: "Yüksek Eğitim, Yurt Dışı & Vizyon", desc: "Akademi, inançlar, yabancı diller, felsefe ve uzun yolculuklar." },
        { num: 10, name: "10. Ev", title: "Kariyer, Başarı & Statü (MC)", desc: "Toplumsal itibar, mesleki zirve, otorite figürleri ve yaşam amacı." },
        { num: 11, name: "11. Ev", title: "Sosyal Gruplar & Hayaller", desc: "Dostluklar, dernekler, kolektif projeler ve geleceğe dair büyük umutlar." },
        { num: 12, name: "12. Ev", title: "Bilinçaltı, Gizli Güçler & Şifa", desc: "Ruhsal arınma, meditasyon, gizli sırlar, inziva ve kolektif bilinçaltı." }
    ];

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    if (hcBeActiveMode === 'auto') {
        const bdate = document.getElementById('hc-be-bdate').value;
        const btime = document.getElementById('hc-be-btime').value || '12:00';
        const cityVal = document.getElementById('hc-be-bcity').value.split(',').map(Number);
        const lat = cityVal[0], lon = cityVal[1];

        if (!bdate) { alert('Lütfen doğum tarihinizi giriniz.'); return; }

        const date = new Date(bdate + 'T' + btime);
        const jd = (date.getTime() / 86400000) + 2440587.5;
        const d = jd - 2451545.0;
        const rad = Math.PI / 180;

        const timeParts = btime.split(':').map(Number);
        const utHours = timeParts[0] + timeParts[1] / 60 - 3;
        let GMST0 = norm(100.4606184 + 0.9856473662862 * d);
        let GMST = norm(GMST0 + utHours * 15);
        let RAMC = norm(GMST + lon);
        let eps = 23.4392911 - 0.0000004 * d;
        let ascRad = Math.atan2(Math.cos(RAMC * rad), -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(lat * rad) * Math.sin(eps * rad));
        let ascLong = norm(ascRad / rad);
        let ascSignIdx = Math.floor(ascLong / 30);

        const heroHtml = `
            <div class="hc-be-hero-card">
                <div class="hc-be-hero-badge">🏛️ Yükselen (1. Ev): ${signs[ascSignIdx].icon} ${signs[ascSignIdx].name} (${(ascLong % 30).toFixed(1)}°)</div>
                <div class="hc-be-hero-title">12 Yaşam Evi ve Burç Yöneticileri</div>
                <p class="hc-be-hero-sub">Whole Sign sistemine göre haritanızdaki 12 evin yaşam sahneleri çıkarılmıştır.</p>
            </div>
        `;

        let gridHtml = "";
        houseThemes.forEach((h, idx) => {
            const signIdx = (ascSignIdx + idx) % 12;
            const s = signs[signIdx];
            gridHtml += `
                <div class="hc-be-card">
                    <div class="hc-be-card-head">
                        <div class="hc-be-badge">${h.name}</div>
                        <strong>${h.title}</strong>
                        <span class="hc-be-sign-tag">${s.icon} ${s.name}</span>
                    </div>
                    <p class="hc-be-card-desc"><strong>${s.name} Etkisi:</strong> ${s.traits} tavrıyla bu alanda başarı ve doyum sağlarsınız. (${h.desc})</p>
                </div>
            `;
        });

        document.getElementById('hc-be-hero').innerHTML = heroHtml;
        document.getElementById('hc-be-grid').innerHTML = gridHtml;
    } else {
        const signKey = document.getElementById('hc-be-sign').value;
        const houseNum = parseInt(document.getElementById('hc-be-house').value);
        const s = signs.find(x => x.key === signKey) || signs[0];
        const h = houseThemes[houseNum - 1];

        const heroHtml = `
            <div class="hc-be-hero-card">
                <div class="hc-be-hero-badge">🔍 Özel Yerleşim Analizi</div>
                <div class="hc-be-hero-title">${h.name}: ${s.icon} ${s.name} Burcunda</div>
                <p class="hc-be-hero-sub">${h.title} | ${s.traits}</p>
            </div>
        `;

        const cardHtml = `
            <div class="hc-be-card">
                <div class="hc-be-card-head">
                    <div class="hc-be-badge">${h.name}</div>
                    <strong>${h.title}</strong>
                    <span class="hc-be-sign-tag">${s.icon} ${s.name}</span>
                </div>
                <p class="hc-be-card-desc">Haritanızda ${h.name}'nin ${s.name} burcunda olması; hayatınızın <strong>${h.title}</strong> sahnesinde ${s.traits} enerjisini sergilediğinizi gösterir. ${h.desc}</p>
            </div>
        `;

        document.getElementById('hc-be-hero').innerHTML = heroHtml;
        document.getElementById('hc-be-grid').innerHTML = cardHtml;
    }

    const descHtml = `
        <p><strong>Astrolojik Evler Neden Önemlidir?</strong> Burçlar psikolojinizi tanımlarken, evler bu psikolojinin 'nerede' (kariyer, aile, aşk, finans...) somutlaşacağını gösterir. Evinizin burç yöneticisini onurlandırmak hayatınızdaki tıkanıklıkları açar.</p>
    `;

    document.getElementById('hc-be-desc').innerHTML = descHtml;
    document.getElementById('hc-be-result').classList.add('visible');
    document.getElementById('hc-be-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

