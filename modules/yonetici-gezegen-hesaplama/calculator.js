function hcYoneticiHesapla() {
    const dStr = document.getElementById('hc-yon-date').value;
    const tStr = document.getElementById('hc-yon-time').value;
    const loc = document.getElementById('hc-yon-city').value.split(',').map(Number);

    if (!dStr || !tStr) { alert('Lütfen tarih ve saat girin.'); return; }

    const date = new Date(dStr + 'T' + tStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const d = jd - 2451543.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    const gmst = norm(280.46061837 + 360.98564736629 * d);
    const lst = norm(gmst + loc[1]);
    const obl = 23.439 - 0.0000004 * d;
    const asc = norm(Math.atan2(Math.cos(lst * rad), -Math.sin(lst * rad) * Math.cos(obl * rad) - Math.tan(loc[0] * rad) * Math.sin(obl * rad)) / rad + 90);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const ascBurc = burclar[Math.floor(asc / 30)];

    const yoneticiler = {
        "Koç": { planet: "Mars", desc: "Hayatınızın yöneticisi Mars, size bitmek bilmeyen bir enerji, cesaret ve öncülük vasfı verir. Siz harekete geçmek, mücadele etmek ve yeni yollar açmak için buradasınız. Kararlarınızda hızlı ve netsiniz." },
        "Boğa": { planet: "Venüs", desc: "Yönetici gezegeniniz Venüs, hayatınıza güzellik, huzur ve değer yargılarına bağlılık katar. Estetik olanı fark etmek, maddi dünyada güven inşa etmek ve sevgiyle köklenmek sizin ana rotanızdır." },
        "İkizler": { planet: "Merkür", desc: "Hayatınızın dümeninde Merkür var; bu da size kıvrak bir zeka, merak ve iletişim gücü verir. Sürekli öğrenmek, bilgiyi paylaşmak ve sosyal bağlantılar kurmak sizin için hayati önem taşır." },
        "Yengeç": { planet: "Ay", desc: "Yöneticiniz Ay, sizi son derece hassas, sezgisel ve korumacı yapar. Duygusal dünyanız hayatınızın merkezindedir; sevdiklerinizi beslemek ve güvenli bir yuva kurmak sizin asıl motivasyonunuzdur." },
        "Aslan": { planet: "Güneş", desc: "Hayatınızın yöneticisi Güneş'tir. Bu size parlamak, yaratıcılığınızı sergilemek ve liderlik etmek için büyük bir güç verir. Hayatı bir sahne gibi görür ve neşenizle çevreye ışık saçarsınız." },
        "Başak": { planet: "Merkür", desc: "Yönetici gezegeniniz Merkür, size analiz yeteneği, titizlik ve hizmet etme arzusu verir. Her şeyi mükemmelleştirmek, düzen kurmak ve pratik çözümler üretmek sizin hayat amacınızın parçasıdır." },
        "Terazi": { planet: "Venüs", desc: "Hayatınızın yöneticisi Venüs'tür. Bu size zarafet, diplomasi ve adalet arayışı verir. İlişkileriniz hayatınızın merkezindedir ve her zaman denge ile uyumu yakalamaya çalışırsınız." },
        "Akrep": { planet: "Mars / Plüton", desc: "Yönetici gezegenleriniz size inanılmaz bir derinlik, sezgi ve dönüşüm gücü verir. Gizemleri çözmek, krizleri yönetmek ve küllerinden yeniden doğmak sizin hayatınızın ana temasıdır." },
        "Yay": { planet: "Jüpiter", desc: "Hayatınızın yöneticisi Jüpiter, size iyimserlik, şans ve geniş ufuklar verir. Sürekli keşfetmek, yeni felsefeler öğrenmek ve özgürce yaşamak sizin ruhunuzu besleyen en büyük güçtür." },
        "Oğlak": { planet: "Satürn", desc: "Yönetici gezegeniniz Satürn, size disiplin, sorumluluk ve hırs verir. Hayatta zirveye ulaşmak için sabırla çalışır ve kalıcı eserler bırakmak istersiniz. Otorite ve düzen sizin için önemlidir." },
        "Kova": { planet: "Satürn / Uranüs", desc: "Yönetici gezegenleriniz size bağımsızlık, yenilikçilik ve toplumsal bir vizyon verir. Geleneklerin dışına çıkmak, özgün fikirler üretmek ve geleceği inşa etmek sizin yaşam rotanızdır." },
        "Balık": { planet: "Jüpiter / Neptün", desc: "Hayatınızın yöneticileri size sınırsız bir şefkat, hayal gücü ve maneviyat verir. Evrenle bir olmayı hissetmek, sanatla şifalanmak ve sezgilerinizle yol almak sizin ana amacınızdır." }
    };

    const result = yoneticiler[ascBurc];

    document.getElementById('hc-yon-val').innerText = result.planet;
    document.getElementById('hc-yon-asc').innerText = "Yükselen Burcunuz: " + ascBurc;
    document.getElementById('hc-yon-desc').innerText = result.desc;
    document.getElementById('hc-yonetici-result').classList.add('visible');
}
