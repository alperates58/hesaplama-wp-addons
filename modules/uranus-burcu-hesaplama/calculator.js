function hcUranusBurcuHesapla() {
    const birthdate = document.getElementById('hc-ub-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const time = date.getTime();

    const uranusDates = [
        { start: new Date('1897-12-20').getTime(), sign: "Yay", desc: "Uranüs Yay nesli, dini ve felsefi inançlarda devrim yapan, özgürlükçü ve vizyoner bir nesildir." },
        { start: new Date('1904-12-20').getTime(), sign: "Oğlak", desc: "Uranüs Oğlak nesli, toplumsal yapıları, hükümetleri ve iş dünyasını kökten değiştiren, disiplinli bir değişim neslidir." },
        { start: new Date('1912-01-31').getTime(), sign: "Kova", desc: "Uranüs Kova nesli (kendi burcunda), teknolojik dehaların, toplumsal devrimlerin ve insani ideallerin zirve yaptığı bir nesildir." },
        { start: new Date('1919-12-01').getTime(), sign: "Balık", desc: "Uranüs Balık nesli, sanatta, spiritüellikte ve kolektif bilinçaltında yenilikçi yaklaşımlar getiren duyarlı bir nesildir." },
        { start: new Date('1927-04-18').getTime(), sign: "Koç", desc: "Uranüs Koç nesli, bireysel özgürlükler, cesur girişimler ve 'ben' bilincinde devrim yapan, savaşçı bir ruh taşır." },
        { start: new Date('1934-06-06').getTime(), sign: "Boğa", desc: "Uranüs Boğa nesli, ekonomi, tarım ve maddi değerler konusunda radikal değişiklikler yaşayan ve yaratan bir nesildir." },
        { start: new Date('1941-08-07').getTime(), sign: "İkizler", desc: "Uranüs İkizler nesli, iletişim teknolojilerinde, eğitim sistemlerinde ve bilgi akışında devrim yapan, meraklı bir nesildir." },
        { start: new Date('1948-08-30').getTime(), sign: "Yengeç", desc: "Uranüs Yengeç nesli, aile kavramı, ev yaşamı ve vatanseverlik anlayışında yenilikçi ve bazen aykırı yaklaşımlar sergiler." },
        { start: new Date('1955-08-24').getTime(), sign: "Aslan", desc: "Uranüs Aslan nesli, yaratıcılık, sanat, eğlence ve bireysel ifade biçimlerinde 'şok edici' ve parlatıcı değişimler getirir." },
        { start: new Date('1961-11-01').getTime(), sign: "Virgo", desc: "Uranüs Başak nesli, iş dünyası, sağlık, teknoloji ve hizmet sektöründe büyük verimlilik devrimleri yapan bir nesildir." },
        { start: new Date('1968-09-28').getTime(), sign: "Terazi", desc: "Uranüs Terazi nesli, evlilik, ortaklıklar, adalet ve sosyal dengeler konusunda köklü değişimleri ve özgürlük arayışını temsil eder." },
        { start: new Date('1974-11-21').getTime(), sign: "Akrep", desc: "Uranüs Akrep nesli, cinsellik, ölüm, metafizik ve ortak kaynaklar konusunda tabuları yıkan, çok güçlü bir dönüşüm neslidir." },
        { start: new Date('1981-02-17').getTime(), sign: "Yay", desc: "Uranüs Yay nesli (tekrar), küreselleşme, yüksek öğrenim ve farklı kültürlerin entegrasyonu konusunda devrimci bir bakış açısına sahiptir." },
        { start: new Date('1988-02-15').getTime(), sign: "Oğlak", desc: "Uranüs Oğlak nesli (tekrar), dijital sistemlerin iş dünyasına entegrasyonu ve geleneksel yapıların teknolojiyle dönüşümünü simgeler." },
        { start: new Date('1995-04-01').getTime(), sign: "Kova", desc: "Uranüs Kova nesli (tekrar), internet çağı çocuklarıdır. Sosyal medya, yapay zeka ve küresel ağlar onların doğal alanıdır." },
        { start: new Date('2003-03-10').getTime(), sign: "Balık", desc: "Uranüs Balık nesli (tekrar), ruhsal uyanış, dijital sanatlar ve evrensel empati konusunda yeni bir çağın habercisidir." },
        { start: new Date('2010-05-28').getTime(), sign: "Koç", desc: "Uranüs Koç nesli (tekrar), girişimcilik, kişisel markalaşma ve teknolojik hızı bireysel güçle birleştiren bir nesildir." },
        { start: new Date('2018-05-15').getTime(), sign: "Boğa", desc: "Uranüs Boğa nesli (tekrar), kripto paralar, sürdürülebilir enerji ve doğayla olan ilişkimizde köklü devrimler yapan bir nesildir." },
        { start: new Date('2025-07-07').getTime(), sign: "İkizler", desc: "Uranüs İkizler nesli (tekrar), kuantum iletişim, hologram teknolojileri ve bilginin ışık hızında işlendiği bir çağı temsil edecektir." }
    ];

    let result = null;
    for (let i = uranusDates.length - 1; i >= 0; i--) {
        if (time >= uranusDates[i].start) {
            result = uranusDates[i];
            break;
        }
    }

    if (!result) {
        alert('Girdiğiniz tarih sistemimizdeki Uranüs tabloları için çok eski.');
        return;
    }

    const signDetails = {
        "Koç": "Uranüs Koç burcundayken doğanlar, tam bir 'isyankar' ruh taşırlar. Kendi yollarını çizmek, kimseye bağlı kalmamak ve her zaman en önde olmak isterler. Onlar için özgürlük, fiziksel bir hürriyetten ziyade zihinsel ve ruhsal bir bağımsızlıktır.",
        "Boğa": "Uranüs Boğa nesli, güvenliğin tanımını değiştirir. Onlar için para ve mülkiyet sadece birer araçtır; asıl amaç bu kaynakları kullanarak dünyayı daha sürdürülebilir ve estetik bir yer haline getirmektir.",
        "İkizler": "Zihinsel olarak çok hızlı, meraklı ve her türlü teknolojik yeniliğe anında adapte olabilen bir yapınız var. Geleneksel eğitim sistemleri size dar gelebilir. Siz, bilginin serbestçe aktığı bir dünyanın çocuklarısınız.",
        "Yengeç": "Aile ve ev kavramına bakış açınız çok farklı olabilir. Belki de 'dijital göçebe' yaşam tarzı tam size göredir. Duygusal güvenliğinizi, sabit bir mekandan ziyade yanınızda taşıdığınız değerlerle sağlarsınız.",
        "Aslan": "Yaratıcılığınızda kimsenin cesaret edemediği yöntemleri kullanırsınız. Sanat ve eğlence anlayışınızda her zaman bir 'aykırılık' vardır. Kendi sahnenizi kendiniz kurar ve kuralları siz koyarsınız.",
        "Başak": "Sağlık, beslenme ve çalışma hayatında teknoloji kullanımında bir devrimcisiniz. En karmaşık sistemleri bile kolayca analiz edebilir ve daha verimli hale getirebilirsiniz. Sizin için mükemmeliyet, teknolojiyle mümkündür.",
        "Terazi": "İlişkilerde ve evlilikte geleneksel kalıpları yıkma eğilimindesiniz. Ortaklıklarınızda her şeyden önce entelektüel özgürlük ve bireysel alan istersiniz. Adalet anlayışınız evrensel ve tarafsızdır.",
        "Akrep": "Gizemli, araştırmacı ve kriz anlarında inanılmaz bir soğukkanlılıkla çözüm üreten birisiniz. Metafizik konulara ve psikolojiye olan ilginiz, Uranüs'ün bu burçtaki delici gücüyle birleşir.",
        "Yay": "Uranüs Yay'da seyahat ederken, inançlar ve felsefeler sarsılır. Siz, dogmalara meydan okuyan, dünyayı bir bütün olarak gören ve sınırların anlamsızlığını savunan bir nesildensiniz.",
        "Oğlak": "Disiplin ve teknoloji sizin ellerinizde birleşir. Eski ve köhneleşmiş kurumları yıkıp yerine daha modern, şeffaf ve hızlı çalışan yapılar inşa etmek sizin en büyük yeteneğinizdir.",
        "Kova": "Uranüs burada 'tahtındadır'. Siz, insanlık için büyük bir adım atacak olan, kolektif bilinci uyandıran dâhilersiniz. Arkadaş gruplarınız ve sosyal ağlarınız hayatınızın en önemli parçasıdır.",
        "Balık": "Ruhsal konularda, şifacılıkta ve sanatta sınırları zorlayan bir hayal gücünüz var. Duygularınızı teknolojiyle birleştirip evrensel bir dil oluşturma potansiyeline sahipsiniz."
    };

    let detailedDesc = `
        <p><strong>Genel Nesil Etkisi:</strong> ${result.desc}</p>
        <p><strong>Karakteristik Analiz:</strong> ${signDetails[result.sign]}</p>
        <p><strong>Uranüs'ün Hayatınızdaki Rolü:</strong> Uranüs sizin haritanızda 'uyandırıcı' gezegendir. Hayatınızın hangi alanında olursa olsun, orada rutinlere hapsolmayı reddedersiniz. Sizin için en büyük tehlike monotonluktur. 2026 yılı projeksiyonlarına göre, Uranüs'ün İkizler burcuna geçişi (veya retro dönemleri), sizin zihinsel dünyanızda ve iletişim ağınızda yepyeni sayfalar açacaktır.</p>
        <p>Siz, değişimin kendisi olan bir neslin ferdisiniz. Teknolojiye olan yatkınlığınız veya toplumsal olaylara karşı duyarlılığınız, bu gezegenin konumundan kaynaklanır. Kendi özgünlüğünüzü kucaklamaktan asla korkmayın.</p>
    `;

    document.getElementById('hc-ub-sign-name').innerText = result.sign;
    document.getElementById('hc-ub-sign-desc').innerHTML = detailedDesc;
    document.getElementById('hc-ub-result').classList.add('visible');
}
