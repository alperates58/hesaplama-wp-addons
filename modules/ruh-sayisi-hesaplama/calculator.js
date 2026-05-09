function hcRuhHesapla() {
    const name = document.getElementById('hc-ruh-name').value.trim().toUpperCase();
    if (!name) { alert('Lütfen tam adınızı girin.'); return; }

    const map = {
        'A': 1, 'E': 5, 'I': 9, 'İ': 9, 'O': 6, 'Ö': 6, 'U': 3, 'Ü': 3
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
        1: "Ruh sayısı 1 olan bireylerin en derin arzusu, kendi ayakları üzerinde durmak, bağımsız olmak ve özgün işler başarmaktır. Ruhunuz her zaman en önde olma ve kendi yeteneklerinizi kanıtlama isteğiyle doludur. Takdir edilmekten ziyade, kendi kendinize başardığınızı bilmek sizi tatmin eder. İçsel bir liderlik enerjisine sahipsiniz ve kısıtlanmak ruhunuzu huzursuz eder. En derin arzunuz, dünyada eşi benzeri olmayan bir iz bırakmaktır.",
        2: "Ruh sayısı 2 olanların en büyük içsel ihtiyacı, sevilmek, onaylanmak ve huzurlu bir ortamda yaşamaktır. Ruhunuz her zaman uyum, iş birliği ve duygusal yakınlık arayışı içindedir. Yalnızlık sizin için zorlayıcı olabilir; bir eşle veya yakın dostlarla hayatı paylaşmak ruhunuzu besleyen en büyük kaynaktır. Çatışmalardan nefret edersiniz ve en derin arzunuz, tüm insanların barış içinde yaşadığı bir dünyada, sevdiğiniz kişiyle el ele yürümektir.",
        3: "Ruh sayısı 3 olan bireylerin ruhu yaratıcılık, neşe ve kendini ifade etme aşkıyla yanıp tutuşur. En derin arzunuz, içinizdeki ışığı ve yaratıcı enerjiyi sanat, müzik, yazı veya sosyal ilişkiler yoluyla dışarıya yansıtmaktır. Hayatı bir kutlama gibi yaşamak istersiniz ve somurtkan ortamlardan hızla uzaklaşırsınız. Ruhunuz her zaman ilham almak ve başkalarına ilham vermek ister. Sizin için asıl mutluluk, yaratıcılığınızı özgürce sergileyebildiğiniz anlarda gizlidir.",
        4: "Ruh sayısı 4 olanlar için en büyük içsel ihtiyaç güven, düzen ve kalıcılıktır. Ruhunuz her zaman sağlam bir temel üzerine kurulu, kuralları olan ve tahmin edilebilir bir hayat arzular. Kaos ve belirsizlik sizi derinden huzursuz eder. Ailenize ve sevdiklerinize güvenli bir gelecek sunmak en büyük motivasyon kaynağınızdır. En derin arzunuz, emek vererek inşa ettiğiniz kalıcı ve sağlam bir yapının (bu bir aile, iş veya eser olabilir) huzuru içinde yaşamaktır.",
        5: "Ruh sayısı 5 olan bireylerin en derin arzusu sınırsız özgürlük, değişim ve yeni deneyimler yaşamaktır. Ruhunuz kısıtlanmaya, monotonluğa ve dar bakış açılarına tahammül edemez. Sürekli hareket halinde olmak, dünyayı keşfetmek ve hayatın tüm renklerini tatmak istersiniz. Risk almaktan çekinmezsiniz ve merakınız sizi her zaman bilinmeyene doğru sürükler. Sizin için asıl mutluluk, kuşlar kadar özgür olduğunuzu hissettiğiniz o anlarda gelir.",
        6: "Ruh sayısı 6 olanların ruhu sevgi, şefkat ve sorumluluk üzerine kuruludur. En büyük içsel ihtiyacınız, bir aileye sahip olmak, sevdiklerinizi korumak ve başkalarına faydalı olmaktır. Ruhunuz her zaman uyumlu ve estetik bir çevre arayışı içindedir. Birilerini iyileştirmek, onlara rehberlik etmek ve şefkat göstermek sizi ruhsal olarak en çok tatmin eden şeydir. En derin arzunuz, sevdiklerinizle birlikte kurduğunuz o huzurlu ve sevgi dolu yuvada yaşlanmaktır.",
        7: "Ruh sayısı 7 olan bireylerin en derin arzusu hakikati bulmak, gizemleri çözmek ve ruhsal bir derinlik kazanmaktır. Ruhunuz maddi dünyanın yüzeyselliğinden hoşlanmaz; her zaman daha derin anlamların, bilimsel gerçeklerin veya manevi bilgeliğin peşindedir. Yalnızlık ve sessizlik sizin için bir kaçış değil, bir ihtiyaçtır; ancak bu sayede ruhunuzu dinleyebilir ve gerçeğe ulaşabilirsiniz. Sizin için asıl mutluluk, zihninizin ve ruhunuzun aydınlandığı o anlarda saklıdır.",
        8: "Ruh sayısı 8 olanlar için en büyük içsel ihtiyaç güç, otorite ve maddi başarıdır. Ruhunuz her zaman büyük hedeflere ulaşmak, yönetmek ve dünyada bir otorite sahibi olmak ister. Maddi bolluğu yakalamak sizin için sadece lüks değil, bir güvenlik ve başarı kanıtıdır. Ancak ruhunuzun asıl huzuru, elde ettiğiniz bu gücü adaletle ve cömertlikle birleştirdiğinizde gelecektir. En derin arzunuz, emeğinizle kazandığınız o görkemli zirvede, adil bir lider olarak yer almaktır.",
        9: "Ruh sayısı 9 olan bireylerin ruhu evrensel sevgi, merhamet ve insanlığa hizmet arzusuyla doludur. En derin ihtiyacınız, dünyada bir fark yaratmak ve hiçbir ayrım gözetmeksizin tüm canlılara şefkat göstermektir. Ruhunuz her zaman yüksek ideallerin ve fedakarlığın peşindedir. Maddi kazançlar sizi tatmin etmez; asıl mutluluğu bir çocuğun gülümsemesinde veya bir insanın hayatına dokunduğunuzda bulursunuz. Sizin için asıl huzur, sevginin dünyayı kurtaracağına olan inancınızdır.",
        11: "Ruh sayısı 11 olanlar 'Aydınlanmış Ruhlar' olarak bilinirler. En derin arzunuz, çok yüksek bir sezgisel güçle evrenin sırlarını kavramak ve insanlığa ilham vermektir. Ruhunuz her zaman ruhsal bir uyanış ve farkındalık arayışı içindedir. Sıradan bir hayat sizi tatmin etmez; her zaman bir misyonunuz olduğunu hissedersiniz. En derin ihtiyacınız, sezgilerinize güvenerek başkalarına rehberlik etmek ve dünyadaki ruhsal ışığı artırmaktır. Siz bir vizyonersiniz ve ruhunuz bu vizyonu paylaşmak istiyor.",
        22: "Ruh sayısı 22 olan bireylerin en büyük içsel ihtiyacı, büyük hayalleri maddi dünyada devasa ve kalıcı yapılara dönüştürmektir. Ruhunuz hem 11'in vizyonerliğini hem de 4'ün disiplinini taşır. Sadece hayal etmekle yetinmezsiniz; o hayali somutlaştırmak için gereken her şeyi yapma arzusu duyarsınız. En derin arzunuz, topluma faydalı olacak, yüzyıllar boyu hatırlanacak sistemler ve yapılar inşa etmektir. Siz dünyayı fiziksel olarak iyileştiren usta bir ruhsunuz.",
        33: "Ruh sayısı 33 olanlar en yüksek sevgi ve şifa enerjisinin temsilcileridir. Ruhunuzun en derin arzusu, koşulsuz sevgiyle tüm dünyayı kucaklamak ve insanların acılarını dindirmektir. Kendinizi başkalarına adamak, onlara ruhsal bir rehberlik yapmak ve sevgiyi öğretmek sizin için bir yaşam biçimidir. Ruhunuz her zaman uyum ve merhamet arar. En derin mutluluğunuz, sevginin iyileştirici gücünün bir kalbe dokunduğunu ve onu dönüştürdüğünü görmektir. Siz bir evrensel sevgi elçisisiniz."
    };

    document.getElementById('hc-ruh-val').innerText = num;
    document.getElementById('hc-ruh-desc').innerText = yorumlar[num] || "Ruh analizi tamamlandı.";
    document.getElementById('hc-ruh-result').classList.add('visible');
}
