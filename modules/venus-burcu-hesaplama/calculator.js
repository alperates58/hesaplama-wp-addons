function hcVenusBurcuHesapla() {
    const tarihStr = document.getElementById('hc-venus-tarih').value;
    if (!tarihStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    const date = new Date(tarihStr);
    
    function getJD(d) { return (d.getTime() / 86400000) + 2440587.5; }
    const jd = getJD(date);
    const d = jd - 2451543.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    function getHeliocentric(planet, d) {
        let { N, i, w, a, e, M0, M1 } = planet;
        let M = norm(M0 + M1 * d);
        let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
        for(let j=0; j<3; j++) E = E - (E - (180/Math.PI)*e*Math.sin(E*rad) - M) / (1 - e*Math.cos(E*rad));
        let xv = a * (Math.cos(E * rad) - e);
        let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        let r = Math.sqrt(xv * xv + yv * yv);
        let lonecl = norm(v + w);
        let x = r * (Math.cos(N * rad) * Math.cos(lonecl * rad) - Math.sin(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let y = r * (Math.sin(N * rad) * Math.cos(lonecl * rad) + Math.cos(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let z = r * Math.sin(lonecl * rad) * Math.sin(i * rad);
        return { x, y, z };
    }

    const earth = { N: 0, i: 0, w: 102.9404 + 0.0000470935 * d, a: 1.00000011, e: 0.01671022 - 0.0000000012 * d, M0: 357.5291, M1: 0.98560028 };
    const venus = { N: 76.6799 + 0.000024659 * d, i: 3.3946 + 0.0000000275 * d, w: 131.5721 + 0.000004085 * d, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 };

    const pE = getHeliocentric(earth, d);
    const pV = getHeliocentric(venus, d);

    const xG = pV.x - pE.x;
    const yG = pV.y - pE.y;
    const lonG = norm(Math.atan2(yG, xG) / rad);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const burc = burclar[Math.floor(lonG / 30)];

    const yorumlar = {
        "Koç": "Venüs'ü Koç burcunda olanlar, aşkta ve ilişkilerde oldukça doğrudan, tutkulu ve heyecan odaklıdırlar. Birinden hoşlandıklarında bunu gizlemezler ve ilk adımı atmaktan çekinmezler. Aşkı bir fetih veya yeni bir macera gibi görebilirler; bu da onların ilişkilerinde hızlı başlangıçlar yapmalarına neden olur. Bağımsızlıklarına düşkündürler ve partnerlerinden de aynı cesareti beklerler. Estetik anlayışları modern, çarpıcı ve enerjiktir. Sevgi dilleri, birlikte aksiyon almak ve cesurca duygularını ifade etmek üzerine kuruludur.",
        "Boğa": "Venüs'ün kendi yöneticisi olduğu Boğa burcunda bulunması, aşkta ve değer yargılarında huzur, sadakat ve duyusallığı ön plana çıkarır. Bu kişiler için fiziksel temas, konfor ve güven ilişkilerin temel taşıdır. Oldukça sabırlı ve sadık partnerlerdir; bir kez bağlandıklarında bunu koparmak zordur. Estetik zevkleri çok gelişmiştir; kaliteli yemekler, güzel kokular ve lüks dokunuşlar ruhlarını besler. İlişkilerinde istikrar ararlar ve partnerlerine karşı oldukça sahiplenici olabilirler. Sevgi dilleri dokunmak ve somut hediyeler vermektir.",
        "İkizler": "Venüs İkizler kişileri için aşk, zihinsel bir flört ve sürekli bir iletişim sürecidir. Partnerlerinde her şeyden önce entelektüel bir derinlik ve konuşulacak çok şey ararlar. İlişkilerinde merak duygusu ve çeşitlilik çok önemlidir; monotonluktan hızla sıkılabilirler. Sosyal ve dışadönük yapıları sayesinde kolayca yeni insanlarla tanışabilirler. Estetik anlayışları değişken, modern ve renklidir. Sevgi dilleri kelimeler, mesajlar ve paylaşılan ilginç bilgilerdir. Birine aşık olmaları için önce onun zekasına hayran kalmaları gerekir.",
        "Yengeç": "Venüs'ü Yengeç burcunda olan bireyler, aşkta son derece hassas, korumacı ve anaç bir yapı sergilerler. İlişkilerinde duygusal güvenliğe her şeyden çok önem verirler ve partnerlerini adeta bir aile üyesi gibi kucaklarlar. Geçmişe ve anılara olan bağlılıkları, romantik ilişkilerinde de kendini gösterir. Sevdiklerini beslemek, korumak ve onlara güvenli bir liman olmak en büyük arzularıdır. Estetik anlayışları yumuşak, nostaljik ve sıcak dokunuşlara sahiptir. Sevgi dilleri şefkat göstermek ve partnerinin ihtiyaçlarını o söylemeden hissetmektir.",
        "Aslan": "Venüs Aslan kişileri aşkı büyük bir dram, neşe ve cömertlik olarak yaşarlar. İlişkilerinde takdir edilmek, hayranlık duyulmak ve gurur duymak isterler. Partnerlerine karşı son derece sadık ve korumacıdırlar, onlara hayatın en lüks ve en güzel yanlarını sunmak için çaba gösterirler. Aşklarını herkesin önünde, gururla sergilemekten çekinmezler. Estetik zevkleri gösterişli, parlak ve dikkat çekicidir. Sevgi dilleri övgü dolu sözler söylemek ve büyük jestler yapmaktır. Kalpleri çok büyüktür ve sevdikleri zaman tam bir sadakatle bağlanırlar.",
        "Başak": "Venüs'ü Başak burcunda olanlar için aşk, partnerine faydalı olmak ve hayatı onun için kolaylaştırmak demektir. İlişkilerinde oldukça mütevazı, titiz ve analizci bir yaklaşım sergilerler. Sevgilerini büyük sözlerle değil, küçük ama anlamlı hizmetlerle gösterirler. Partnerlerinde temizlik, düzen ve dürüstlük ararlar. Estetik anlayışları sade, doğal ve işlevseldir. Zaman zaman fazla eleştirel olabilirler, ancak bu tamamen partnerinin ve ilişkinin mükemmel olması isteğinden kaynaklanır. Sevgi dilleri hizmet etmek ve partnerinin hayatındaki pürüzleri gidermektir.",
        "Terazi": "Venüs'ün kendi burcu Terazi'de olması, aşkta tam bir denge, uyum ve zarafet arayışını getirir. Bu kişiler için romantizm bir sanat formudur; her şeyin şık, nazik ve adil olmasını isterler. İlişkilerinde çatışmadan kaçınırlar ve her zaman ortak bir paydada buluşmaya çalışırlar. Partnerlerinde güzellik, zerafet ve diplomatik yetenekler ararlar. Estetik anlayışları çok rafine ve dengelidir. Yalnız kalmaktan hoşlanmazlar ve hayatı bir partnerle paylaşmak onlar için ruhsal bir ihtiyaçtır. Sevgi dilleri romantik ortamlar yaratmak ve nazik davranışlardır.",
        "Akrep": "Venüs Akrep kişileri için aşk ya hep ya hiçtir; sığ duygulara yer yoktur. İlişkilerinde inanılmaz bir derinlik, tutku ve ruhsal bir birleşme ararlar. Sezgileri o kadar güçlüdür ki partnerinin gizlediği her şeyi hissedebilirler. Sadakat ve güven onlar için en hayati unsurdur; ihaneti asla unutmazlar. Estetik anlayışları gizemli, karanlık ama etkileyici ve seksidir. İlişkilerinde dönüştürücü bir güçleri vardır ve partnerleriyle en derin sırlarını paylaşmak isterler. Sevgi dilleri tam bir teslimiyet ve duygusal yoğunluktur.",
        "Yay": "Venüs'ü Yay burcunda olan bireyler aşkta özgürlük, macera ve dürüstlük ararlar. Partnerleriyle birlikte yeni yerler keşfetmek, felsefi tartışmalar yapmak ve gülmek onlar için en büyük keyiftir. İlişkilerinde kısıtlanmaya ve aşırı sahiplenilmeye gelemezler. Oldukça iyimser ve açık fikirli partnerlerdir. Estetik anlayışları etnik, bohem ve rahat dokunuşlara sahiptir. Aşkı hayatın anlamını keşfetme yolculuğunda bir eşlikçilik olarak görürler. Sevgi dilleri birlikte seyahat etmek ve yeni deneyimler paylaşmaktır.",
        "Oğlak": "Venüs Oğlak kişileri aşkta oldukça ciddi, mesafeli ve geleneksel bir tutum sergilerler. Duygusal dünyalarını hemen açmazlar; önce partnerinin güvenilirliğini ve statüsünü test ederler. İlişkilerinde ciddiyet, sadakat ve uzun vadeli planlar önemlidir. Sevgilerini somut başarılarla ve partnerlerine sağladıkları güvenli gelecekle gösterirler. Estetik anlayışları klasik, kaliteli ve zamanın ötesindedir. Zaman zaman soğuk görünseler de aslında içlerinde çok derin ve sarsılmaz bir sadakat taşırlar. Sevgi dilleri sorumluluk almak ve partnerine destek olmaktır.",
        "Kova": "Venüs'ü Kova burcunda olanlar için aşk, her şeyden önce güçlü bir arkadaşlık ve zihinsel uyumdur. İlişkilerinde bağımsızlıklarına çok önem verirler ve partnerlerine de aynı alanı tanırlar. Geleneksel ilişki modellerinden ziyade, kendi özgün kurallarıyla yaşamayı tercih ederler. Partnerlerinde sıradışılık, entelektüel derinlik ve insancıl değerler ararlar. Estetik anlayışları modern, teknolojik ve aykırıdır. Sevgi dilleri partnerinin bireyselliğine saygı duymak ve birlikte toplumsal idealler peşinde koşmaktır.",
        "Balık": "Venüs'ün yüceldiği Balık burcunda olması, aşkta sınırsız bir şefkat, fedakarlık ve romantizm getirir. Bu kişiler aşkı adeta bir rüya veya ruhsal bir ayin gibi yaşarlar. Partnerlerini idealize edebilir ve onlar için her türlü fedakarlığı yapabilirler. Sınırları çok incedir; partnerinin acısını kendi acıları gibi hissederler. Estetik anlayışları hayalperest, akışkan ve sanatsaldır. Koşulsuz sevgi kapasiteleri çok yüksektir ve aşkta mutlak bir ruh birliği ararlar. Sevgi dilleri fedakarlık yapmak ve partnerine şifa vermektir."
    };

    document.getElementById('hc-venus-value').innerText = burc;
    document.getElementById('hc-venus-desc').innerText = yorumlar[burc];
    document.getElementById('hc-venus-burcu-result').classList.add('visible');
}
