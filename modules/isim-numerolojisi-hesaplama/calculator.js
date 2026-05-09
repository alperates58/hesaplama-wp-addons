function hcNameNumHesapla() {
    const name = document.getElementById('hc-name-input').value.trim().toUpperCase();
    if (!name) { alert('Lütfen adınızı girin.'); return; }

    const map = {
        'A': 1, 'J': 1, 'S': 1, 'Ş': 1,
        'B': 2, 'K': 2, 'T': 2,
        'C': 3, 'Ç': 3, 'L': 3, 'U': 3, 'Ü': 3,
        'D': 4, 'M': 4, 'V': 4,
        'E': 5, 'N': 5,
        'F': 6, 'O': 6, 'Ö': 6,
        'G': 7, 'Ğ': 7, 'P': 7,
        'H': 8, 'Z': 8,
        'I': 9, 'İ': 9, 'R': 9
    };

    let total = 0;
    for (let char of name) {
        if (map[char]) total += map[char];
    }

    function reduce(num) {
        if (num === 11 || num === 22 || num === 33) return num;
        if (num < 10) return num;
        const sum = num.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        return reduce(sum);
    }

    const num = reduce(total);

    const yorumlar = {
        1: "İsim sayısı 1 olan kişiler, hayata karşı bağımsız, kararlı ve öncü bir tavır sergilerler. Kendi kararlarını kendileri vermek isterler ve başkalarının yönetimi altında kalmaktan hoşlanmazlar. Liderlik vasıfları çok gelişmiştir ve çevrelerine güven verirler. İsimlerinin enerjisi onlara her zaman yeni başlangıçlar yapma ve zorlukları aşma gücü verir. Ancak bu güçlü enerji, zaman zaman inatçılığa veya aşırı bencilliğe dönüşebilir; dengeyi korumak önemlidir.",
        2: "İsim sayısı 2 olan bireyler, çevrelerine uyum, nezaket ve huzur yayan kişilerdir. İletişim tarzları çok yumuşaktır ve arabuluculuk yapma konusunda doğal bir yetenekleri vardır. Sevdiklerine karşı son derece sadık ve destekleyicidirler. İsimlerinin enerjisi onlara derin bir sezgi ve empati gücü katar. Yalnız kalmaktan ziyade ortaklıklar içinde çalışmayı ve paylaşmayı severler. Sabırları ve hassasiyetleri, onları sosyal çevrelerinde vazgeçilmez birer denge unsuru haline getirir.",
        3: "İsim sayısı 3 olanlar, neşeli, yaratıcı ve sosyal enerjisi çok yüksek bireylerdir. Kendilerini ifade etmek, konuşmak, yazmak veya sanatla ilgilenmek isimlerinin getirdiği doğal bir eğilimdir. Hayata pozitif bir pencereden bakarlar ve girdikleri her ortamda dikkat çekmeyi başarırlar. İsimlerinin enerjisi onlara şans ve popülerlik getirir. Ancak odaklanmakta güçlük çekebilir ve enerjilerini gereksiz yere tüketebilirler. Yaratıcılıklarını somut bir işe yönlendirdiklerinde büyük başarılar elde ederler.",
        4: "İsim sayısı 4 olan kişiler, güvenilirliğin, dürüstlüğün ve çalışkanlığın sembolüdürler. Hayatlarını bir düzen üzerine kurmayı ve her şeyi planlı yapmayı severler. Sabırları ve dayanıklılıkları sayesinde en zorlu süreçleri bile başarıyla yönetirler. İsimlerinin enerjisi onlara sarsılmaz bir temel ve disiplin katar. Geleneklere ve kurallara önem verirler, ancak bu durum bazen esnekliklerini azaltabilir. Sevdikleri için her zaman güvenli bir liman olma görevini üstlenirler.",
        5: "İsim sayısı 5 olan bireylerin enerjisi sürekli hareket, değişim ve özgürlük üzerinedir. Meraklı yapıları onları her zaman yeni deneyimlere ve maceralara iter. Çok yönlüdürler ve her türlü duruma hızla adapte olabilirler. İsimlerinin enerjisi onlara zihinsel bir kıvraklık ve iletişim gücü katar. Monotonluktan nefret ederler ve kısıtlanmaya gelemezler. Hayatları boyunca birçok farklı alanda deneyim sahibi olma potansiyelleri vardır; bu da onlara zengin bir bakış açısı kazandırır.",
        6: "İsim sayısı 6 olanlar, sevginin, ailenin ve toplumsal sorumluluğun temsilcileridir. Koruyucu ve besleyici bir yapıları vardır; çevrelerindeki her şeyin uyumlu ve güzel olmasını isterler. İsimlerinin enerjisi onlara doğal bir şifacılık ve hizmet etme arzusu katar. Adalet duyguları çok gelişmiştir ve haksızlıklara karşı sessiz kalmazlar. Evleri ve aileleri onlar için kutsaldır. Ancak bazen başkalarının hayatına aşırı müdahale edebilirler; bu dengeyi korumak ruhsal huzurları için önemlidir.",
        7: "İsim sayısı 7 olan bireyler, derin düşünürler, araştırmacılar ve ruhsal arayış içindeki bilgelerdir. Yüzeysel olanla yetinmezler; her zaman hayatın gizemli ve derin anlamlarını keşfetmek isterler. Yalnızlık onlar için bir ihtiyaçtır; kendi iç dünyalarına çekilip düşünmek ruhlarını besler. İsimlerinin enerjisi onlara analitik bir zeka ve güçlü sezgiler katar. Maddi dünyadan ziyade maneviyat ve bilimle ilgilenirler. Sessiz ve vakur duruşları, çevrelerinde büyük bir saygı uyandırır.",
        8: "İsim sayısı 8 olan kişiler, güç, otorite ve maddi başarı enerjisi taşırlar. İş dünyasında ve yönetim kademelerinde çok başarılı olma potansiyelleri vardır. Stratejik düşünme yetenekleri ve hırsları sayesinde büyük hedeflere ulaşırlar. İsimlerinin enerjisi onlara dayanıklılık ve liderlik gücü katar. Ancak bu gücü adaletli ve cömert bir şekilde kullanmayı öğrenmeleri gerekir. Maddi bolluğu yakaladıklarında, bunu toplumsal faydaya dönüştürerek ruhsal olarak da tatmin olurlar.",
        9: "İsim sayısı 9 olanlar, evrensel sevgi, merhamet ve yardımseverlik enerjisiyle doludurlar. Hiçbir ayrım yapmadan tüm insanlığa hizmet etme arzusu taşırlar. Hoşgörülü ve bilge yapıları sayesinde çevrelerine ışık tutarlar. İsimlerinin enerjisi onlara sanatsal bir duyarlılık ve yüksek bir idealizm katar. Hayatları boyunca birçok insana rehberlik edebilirler. Tamamlanma enerjisini temsil ettikleri için bir döngüyü bitirme ve yeni bir bilince geçme konusunda ustadırlar.",
        11: "İsim sayısı 11 olanlar, çok yüksek bir sezgisel güç ve ilham yeteneğine sahiptirler. 'Üstad Sayı' olarak bilinen 11, bu kişilere ruhsal bir liderlik vasfı katar. İnsanlığın bilincini yükseltecek fikirler üretir ve birer ışık işçisi gibi çalışırlar. İsimlerinin enerjisi onları bazen aşırı hassas yapabilir, ancak bu hassasiyet onların en büyük gücüdür. Sezgilerine güvenerek hareket ettiklerinde, çevrelerinde mucizeler yaratabilir ve başkalarına rehberlik edebilirler.",
        22: "İsim sayısı 22 olan bireyler, 'Usta Mimar' enerjisi taşırlar. Büyük hayalleri gerçeğe dönüştürme ve dünyada kalıcı, topluma faydalı devasa yapılar veya sistemler inşa etme gücüne sahiptirler. Hem 4'ün disiplinini hem de 11'in vizyonunu bünyelerinde barındırırlar. Sorumlulukları çok büyüktür ve isimlerinin enerjisi onlara sarsılmaz bir sabır ve güç katar. İmkansız görünen projeleri hayata geçirme konusunda doğuştan yeteneklidirler.",
        33: "İsim sayısı 33 olanlar, en yüksek sevgi ve şifa enerjisini temsil eden 'Usta Öğreticilerdir'. Hayatlarını başkalarına rehberlik etmeye, onları iyileştirmeye ve evrensel sevgiyi öğretmeye adarlar. Koşulsuz sevgi ve merhamet onların en belirgin özelliğidir. İsimlerinin enerjisi onlara sanatsal bir yaratıcılık ve ruhsal bir derinlik katar. Başkalarının acısını hissederek onlara derman olmaya çalışırlar. Onlar için asıl başarı, sevginin iyileştirici gücünü dünyaya yaymaktır."
    };

    document.getElementById('hc-name-val').innerText = num;
    document.getElementById('hc-name-desc').innerText = yorumlar[num] || "İsim analizi tamamlandı.";
    document.getElementById('hc-isim-num-result').classList.add('visible');
}
