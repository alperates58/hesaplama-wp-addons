function hcJupiterBurcuHesapla() {
    const tarihStr = document.getElementById('hc-jupiter-tarih').value;
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
    const jupiter = { N: 100.4542 + 0.0000276854 * d, i: 1.3030 - 0.0000000155 * d, w: 273.8777 + 0.0000164505 * d, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 };

    const pE = getHeliocentric(earth, d);
    const pJ = getHeliocentric(jupiter, d);

    const xG = pJ.x - pE.x;
    const yG = pJ.y - pE.y;
    const lonG = norm(Math.atan2(yG, xG) / rad);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const burc = burclar[Math.floor(lonG / 30)];

    const yorumlar = {
        "Koç": "Jüpiter'i Koç burcunda olan bireyler için şans ve büyüme, cesur adımlar atmak ve yeni yollar açmakla gelir. Hayata karşı oldukça iyimser, enerjik ve öncü bir yaklaşımları vardır. Kendilerine olan güvenleri, başkalarının imkansız gördüğü kapıları açmalarını sağlar. En büyük gelişimlerini bireysel özgürlüklerini savunurken ve liderlik vasıflarını sergilerken yaşarlar. Maceracı ruhları sayesinde hayatın sunduğu fırsatları anında yakalarlar. Şansları, harekete geçme hızlarıyla doğru orantılıdır.",
        "Boğa": "Jüpiter Boğa kişileri için bolluk ve bereket, maddi dünyayı güzelleştirmek, üretmek ve korumakla gelir. Sabırlı, güvenilir ve pratik yaklaşımları sayesinde kalıcı başarılar elde ederler. Doğa ile iç içe olmak, estetiğe önem vermek ve konforlu bir yaşam alanı yaratmak ruhlarını büyütür. Şans onlara genellikle toprakla ilgili işlerde, sanatta veya finansal konularda güler. Değer yargıları oldukça sağlamdır ve sahip olduklarını paylaşarak daha da büyürler. Onlar için şans, huzurlu ve bereketli bir yaşamın meyveleridir.",
        "İkizler": "Jüpiter'i İkizler burcunda olanlar için büyüme ve bilgelik, bilgi toplamak, öğrenmek ve iletişim kurmakla gelir. Zihinleri her zaman yeni merakların peşindedir ve çok yönlü düşünme yetenekleri sayesinde her türlü fırsatı değerlendirebilirler. Şans onlara genellikle yazma, konuşma, eğitim veya medya gibi alanlarda güler. Sosyal çevreleri çok geniştir ve kurdukları bağlantılar hayatlarında kapılar açar. Zihinsel esneklikleri, en karmaşık sorunlara bile kolayca çözüm bulmalarını sağlar. Onlar için şans, bilginin gücüyle genişlemektir.",
        "Yengeç": "Jüpiter'in yüceldiği Yengeç burcunda olması, bolluk ve bereketin şefkat, aile ve duygusal bağlar yoluyla gelmesini temsil eder. Bu kişiler başkalarını besledikçe, korudukça ve yuvalarını güzelleştirdikçe ruhsal olarak büyürler. Sezgileri çok güçlüdür ve şanslarını genellikle doğru zamanda doğru yerde hissederek bulurlar. Geçmişe ve köklere olan bağlılıkları onlara bir tür koruma sağlar. Şans onlara emlak, gıda veya insanlara bakım verme gibi alanlarda güler. Onlar için şans, sevdikleriyle birlikte huzurlu ve güvenli bir limanda olmaktır.",
        "Aslan": "Jüpiter Aslan kişileri için büyüme ve şans, yaratıcılıklarını sergilemek, neşeli olmak ve cömertlik yapmakla gelir. Hayata bir oyun alanı gibi bakarlar ve her anı kutlamaya değer görürler. Özgüvenli ve karizmatik yapıları sayesinde çevrelerine ışık saçarlar. Şans onlara sahne sanatları, liderlik gerektiren pozisyonlar veya eğlence sektörü gibi alanlarda güler. Cömertlikleri arttıkça hayatlarındaki bolluk da artar. İnsanlara ilham vermek ve onları korumak ruhlarını en çok büyüten şeydir. Onlar için şans, kalplerinin sesini takip ederek parlamaktır.",
        "Başak": "Jüpiter'i Başak burcunda olanlar için şans ve gelişim, mükemmeliyetçilik, hizmet etme ve teknik detaylara odaklanma yoluyla gelir. İşlerini en iyi şekilde yaptıklarında ve başkalarının hayatını kolaylaştırdıklarında bolluk bereketle karşılaşırlar. Pratik zekaları ve analiz yetenekleri sayesinde en karmaşık süreçleri bile verimli hale getirirler. Şans onlara genellikle sağlık, organizasyon, yazılım veya teknik uzmanlık gerektiren alanlarda güler. Mütevazı ama çok çalışkan bir bilgelik yapıları vardır. Onlar için şans, faydalı ve düzenli bir hayat inşa etmektir.",
        "Terazi": "Jüpiter Terazi kişileri için şans ve büyüme, ilişkiler, adalet ve sosyal uyum yoluyla gelir. Başkalarıyla iş birliği yaptıklarında ve ortaklıklarda dengeyi kurduklarında hayatları genişler. Diplomatik yetenekleri ve zarif duruşları sayesinde kapalı kapıları kolayca açarlar. Şans onlara hukuk, sanat, halkla ilişkiler veya diplomasi gibi alanlarda güler. Estetik anlayışları ve güzellik arayışları ruhlarını besler. İnsanları bir araya getiren ve arabuluculuk yapan rolleri onlara büyük bir bilgelik kazandırır. Onlar için şans, paylaşılan huzurlu bir hayattır.",
        "Akrep": "Jüpiter'i Akrep burcunda olan bireyler için şans ve gelişim, derinleşmek, gizemleri çözmek ve ruhsal bir dönüşüm yaşamakla gelir. Yüzeysel olanla yetinmezler, hayatın en karanlık ve en derin noktalarındaki bilgeliği ararlar. Şans onlara araştırma, psikoloji, finans veya metafizik gibi alanlarda güler. Sezgileri inanılmaz güçlüdür ve krizleri birer fırsata dönüştürme konusunda ustadırlar. Küllerinden yeniden doğma güçleri, onları hayatın zorlukları karşısında büyütür. Onlar için şans, bilinmeyenin ardındaki gücü keşfetmektir.",
        "Yay": "Jüpiter'in kendi burcu Yay'da olması, şansın ve bilgeliğin en saf halini temsil eder. Bu kişiler için büyüme, keşfetmek, yeni kültürler tanımak ve felsefi bir bakış açısı geliştirmekle gelir. İyimserlikleri onların en büyük şans mıknatısıdır. Şans onlara yüksek öğrenim, uluslararası ilişkiler, yayıncılık veya spor gibi alanlarda güler. Hayatı bir keşif yolculuğu olarak görürler ve kısıtlanmaya gelemezler. Dürüstlükleri ve geniş vizyonları sayesinde her zaman doğru zamanda doğru yerde olurlar. Onlar için şans, özgür bir ruhla hakikati aramaktır.",
        "Oğlak": "Jüpiter Oğlak kişileri için şans ve büyüme, disiplin, hırs ve toplumsal statü kazanma yoluyla gelir. Hayallerini somutlaştırmak ve kalıcı eserler bırakmak için sabırla çalışırlar. Şans onlara yönetici pozisyonlarında, devlet işlerinde veya inşaat gibi uzun vadeli projelerde güler. Otoriteye ve geleneklere olan saygılı yaklaşımları onlara kapılar açar. Sorumluluk aldıkça ve bir yapıyı yönettikçe ruhsal olarak genişlerler. Başarıları genellikle geç yaşlarda ama kalıcı bir şekilde gelir. Onlar için şans, zirveye giden yolda gösterilen sabır ve emektir.",
        "Kova": "Jüpiter'i Kova burcunda olanlar için şans ve büyüme, yenilikçilik, bağımsızlık ve toplumsal idealler peşinde koşmakla gelir. Geleneksel olanın dışına çıktıklarında ve özgün fikirlerini hayata geçirdiklerinde hayatları bereketlenir. Şans onlara teknoloji, bilim, insan hakları veya kolektif çalışmalar gibi alanlarda güler. Arkadaş çevreleri ve dahil oldukları topluluklar onlara büyük fırsatlar sunar. Zihinsel olarak kısıtlanmaya gelemezler ve geleceğin vizyonunu bugünden görürler. Onlar için şans, insanlığı ileriye taşıyacak bir devrimin parçası olmaktır.",
        "Balık": "Jüpiter'in klasik yöneticisi olduğu Balık burcunda olması, bolluk ve bereketin sınırsız bir şefkat, hayal gücü ve maneviyat yoluyla gelmesini temsil eder. Bu kişiler evrenle bir olduklarını hissettiklerinde ve fedakarlık yaptıklarında ruhsal olarak devleşirler. Şans onlara sanat, şifa, müzik veya ruhsal çalışmalar gibi alanlarda güler. Sezgileri onlara görünmez bir rehberlik sağlar. Koşulsuz sevgi kapasiteleri onlara mucizeleri çeker. Akışta yaşama yetenekleri sayesinde hayatın sunduğu lütufları kolayca kabul ederler. Onlar için şans, ruhun derinliklerindeki huzuru bulmaktır."
    };

    document.getElementById('hc-jupiter-value').innerText = burc;
    document.getElementById('hc-jupiter-desc').innerText = yorumlar[burc];
    document.getElementById('hc-jupiter-burcu-result').classList.add('visible');
}
