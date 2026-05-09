function hcCinBurcuHesapla() {
    const dateStr = document.getElementById('hc-cin-date').value;
    if (!dateStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    
    const date = new Date(dateStr);
    let year = date.getFullYear();
    
    // Simplified Lunar Year check (approx Feb 4-5 is often the boundary)
    const month = date.getMonth() + 1;
    const day = date.getDate();
    if (month < 2 || (month === 2 && day < 5)) {
        year -= 1;
    }

    const burclar = [
        { name: "Maymun", desc: "Çin burcu Maymun olanlar, inanılmaz derecede zeki, kıvrak fikirli ve esprilidirler. Problem çözme yetenekleri çok gelişmiştir ve her türlü karmaşık durumdan kolayca sıyrılabilirler. Sosyal ortamlarda parlamayı severler ve meraklı yapıları onları sürekli yeni şeyler öğrenmeye iter. Ancak bazen sabırsız olabilirler. Hayata karşı neşeli ve oyunbaz bir yaklaşımları vardır." },
        { name: "Horoz", desc: "Horoz burcu bireyleri, dürüst, çalışkan ve kendinden emin kişilikleriyle tanınırlar. Detaylara çok önem verirler ve genellikle oldukça şık, düzenli olmayı severler. Girdikleri her ortamda dikkat çekmek ve takdir edilmek isterler. Dobra bir tavırları vardır ve ne düşünüyorlarsa doğrudan söylerler. Sorumluluk duyguları çok yüksektir ve verdikleri sözü mutlaka tutarlar." },
        { name: "Köpek", desc: "Çin burcu Köpek olanlar, Zodyak'ın en sadık, dürüst ve güvenilir kişileridir. Adalet duyguları çok gelişmiştir ve sevdiklerini korumak için her şeyi yapabilirler. Biraz endişeli bir yapıları olsa da, inandıkları değerler uğruna sonuna kadar savaşırlar. Arkadaşlıkları ömür boyu sürer. Mütevazı bir yaşam tarzını tercih ederler ve samimiyete her şeyden çok önem verirler." },
        { name: "Domuz", desc: "Domuz burcu bireyleri, hoşgörülü, nazik ve cömert ruhlu insanlardır. Hayatın tadını çıkarmayı bilirler ve çevrelerindeki insanlara huzur verirler. Çok dürüsttürler ve kimseden kötülük beklemezler, bu da bazen safça davranmalarına neden olabilir. Ancak sabırları ve içsel güçleri çok yüksektir. Maddi ve manevi bolluğu hayatlarına çekme konusunda doğal bir yetenekleri vardır." },
        { name: "Fare", desc: "Fare burcu olanlar, son derece zeki, becerikli ve uyum sağlama yeteneği yüksek bireylerdir. Fırsatları önceden sezerler ve kaynaklarını çok iyi yönetirler. Sosyal becerileri sayesinde çevrelerinde her zaman bir destek ağı oluştururlar. Tutumlu bir yapıları vardır ve ailelerine çok düşkündürler. Çalışkanlıkları sayesinde her zaman istedikleri başarıya ulaşırlar." },
        { name: "Öküz", desc: "Öküz burcu bireyleri, sabır, dayanıklılık ve dürüstlüğün simgesidirler. Sessiz ama derinden ilerleyen, sarsılmaz bir kararlılığa sahiptirler. Disiplinli çalışma tarzları sayesinde en büyük zorlukların üstesinden gelirler. Muhafazakar bir yapıları olabilir ve geleneklere önem verirler. Sözlerine her zaman güvenilir; onlar için sadakat ve istikrar hayatın temel taşıdır." },
        { name: "Kaplan", desc: "Kaplan burcu olanlar, cesur, tutkulu ve bağımsız bir ruha sahiptirler. Risk almaktan çekinmezler ve haksızlıklara karşı çok güçlü bir tepki gösterirler. Karizmatik yapıları sayesinde çevrelerini kolayca etkileyebilirler. Biraz dürtüsel olabilirler ancak macera dolu bir hayat sürmek onların asıl motivasyonudur. Liderlik vasıfları doğuştan gelir ve kısıtlanmaya gelemezler." },
        { name: "Tavşan", desc: "Tavşan burcu bireyleri, nazik, zarif ve barışçıl bir yapıya sahiptirler. Çatışmalardan kaçınırlar ve her zaman uyumlu bir ortam yaratmaya çalışırlar. Sanatsal yönleri ve estetik zevkleri çok gelişmiştir. Hassas bir ruhları vardır ve çevrelerindeki insanların duygularını hemen sezerler. Çok iyi bir dinleyici ve dürüst bir dostturlar. Huzurlu bir yaşam sürmek onların en büyük önceliğidir." },
        { name: "Ejderha", desc: "Ejderha burcu, Çin Zodyak'ının en güçlü ve görkemli burcudur. Bu burçta doğanlar, özgüvenli, enerjik ve vizyoner bireylerdir. Büyük hayalleri vardır ve bu hayalleri gerçeğe dönüştürmek için gereken cesarete sahiptirler. Şanslı bir yapıları vardır ve girdikleri her ortamda doğal bir lider olarak kabul görürler. Bazen otoriter olabilirler ancak cömert kalpleriyle çevrelerini büyülerler." },
        { name: "Yılan", desc: "Yılan burcu bireyleri, derin düşünen, gizemli ve bilge kişilerdir. Sessizce gözlemler ve en doğru zamanda harekete geçerler. Sezgileri inanılmaz güçlüdür; insanların niyetlerini anında sezebilirler. Maddi konularda şanslıdırlar ve lüksü, kaliteyi severler. Konuşmaktan ziyade düşünmeyi tercih ederler. Karizmatik ve çekici bir enerjileri vardır, ancak özel hayatlarını gizli tutarlar." },
        { name: "At", desc: "At burcu olanlar, özgür ruhlu, enerjik ve bağımsızlıklarına düşkün bireylerdir. Sosyal ortamlarda çok hareketlidirler ve yeni yerler keşfetmekten büyük keyif alırlar. Zihinleri de bedenleri kadar hızlı çalışır. Bazen sabırsız ve inatçı olabilirler ancak dürüstlükleri ve neşeli yapılarıyla herkesin sevgisini kazanırlar. Hayatı dolu dolu yaşamak ve kısıtlanmamak onların ana rotasıdır." },
        { name: "Keçi", desc: "Keçi burcu bireyleri, sanatçı ruhlu, merhametli ve nazik insanlardır. Yaratıcı yetenekleri çok gelişmiştir ve güzelliğe, huzura aşıktırlar. Yardımlaşma duyguları çok yüksektir ve başkalarının acılarını dindirmek isterler. Biraz kararsız ve içe dönük olabilirler ancak bir grubun içinde uyumu sağlayan en önemli unsurdur. Onlar için şefkat ve sevgi, hayatın asıl anlamıdır." }
    ];

    const index = (year - 4) % 12;
    const res = burclar[index < 0 ? index + 12 : index];

    document.getElementById('hc-cin-val').innerText = res.name;
    document.getElementById('hc-cin-desc').innerText = res.desc;
    document.getElementById('hc-cin-result').classList.add('visible');
}
