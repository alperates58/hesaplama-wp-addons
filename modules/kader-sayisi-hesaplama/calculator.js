function hcKaderHesapla() {
    const name = document.getElementById('hc-kader-name').value.trim().toUpperCase();
    if (!name) { alert('Lütfen tam adınızı girin.'); return; }

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
        1: "Kader sayısı 1 olanlar için yaşamın amacı, kendi gücünü keşfetmek ve bağımsız bir lider olmaktır. Kaderiniz sizi her zaman en önde olmaya, yeni yollar açmaya ve başkalarına örnek teşkil etmeye iter. Karşılaştığınız zorluklar aslında sizin iradenizi güçlendirmek içindir. Kendi yeteneklerinize güvenmeyi öğrendiğinizde, imkansız gibi görünen kapıların önünüzde açıldığını göreceksiniz. Siz bir öncüsünüz ve kaderiniz dünyada yeni izler bırakmanızı istiyor.",
        2: "Kader sayısı 2 olan bireylerin hayattaki ana rotası, sevgi, uyum ve dengeyi sağlamaktır. Kaderiniz sizi her zaman ikili ilişkilerde, ortaklıklarda ve sosyal uzlaşmalarda önemli roller üstlenmeye yönlendirir. Barışın elçisi olarak, çevrenizdeki çatışmaları çözmek ve insanların bir araya gelmesini sağlamak en büyük başarınız olacaktır. Sabır ve diplomasi, kaderinizin size sunduğu en büyük hediyelerdir. Başkalarına verdiğiniz destek, aslında sizin ruhsal olarak büyümenizi sağlar.",
        3: "Kader sayısı 3 olanlar için yaşamın yolu yaratıcılıktan, neşeden ve kendini ifade etmekten geçer. Kaderiniz sizi her zaman sosyal ortamlarda, sanatın içinde veya iletişimin merkezinde tutacaktır. Dünyaya neşe katmak ve insanlara ilham vermek sizin asıl görevinizdir. Kelimelerin ve renklerin gücünü kullanarak kendinizi ifade ettiğinizde, hayatın size sunduğu fırsatların arttığını fark edeceksiniz. Siz bir hayat sanatçısısınız ve kaderiniz bu sanatı tüm dünyayla paylaşmanızı bekliyor.",
        4: "Kader sayısı 4 olan bireylerin hayattaki yolu disiplin, çalışma ve kalıcı bir temel inşa etmek üzerine kuruludur. Kaderiniz sizi her zaman sorumluluk almaya, düzen kurmaya ve güvenilir bir figür olmaya yönlendirir. Sabrınız ve metodik yaklaşımınız sayesinde, başkalarının pes ettiği noktalarda siz büyük bir dayanıklılık sergileyerek hedefinize ulaşırsınız. Dünyada somut ve faydalı eserler bırakmak sizin asıl misyonunuzdur. Kaderiniz, emeğinizin karşılığını size güvenli ve sağlam bir gelecek olarak sunacaktır.",
        5: "Kader sayısı 5 olanlar için hayat bir macera ve sürekli bir değişim sürecidir. Kaderiniz sizi her zaman yeni ufuklara, seyahatlere ve farklı kültürlere yönlendirir. Kısıtlanmaya gelmeyen ruhunuz, her türlü değişime hızla adapte olmanızı sağlar. Özgürlüğün ve deneyimin gerçek anlamını kavramak sizin yaşam amacınızdır. Çok yönlü yetenekleriniz sayesinde birçok farklı alanda başarı elde edebilirsiniz. Kaderiniz, size hayatın tüm renklerini ve heyecanlarını tatma fırsatı sunacaktır.",
        6: "Kader sayısı 6 olan bireylerin hayattaki ana rotası sevgi, sorumluluk ve toplumsal hizmettir. Kaderiniz sizi her zaman aile kurmaya, sevdiklerinizi korumaya ve başkalarının ihtiyaçlarını gidermeye yönlendirir. Bir şifacı ve koruyucu olarak, çevrenizdeki insanların hayatına huzur ve sevgi katmak en büyük başarınız olacaktır. Adalet ve dürüstlük, yolculuğunuzun en önemli rehberleridir. Sevdikleriniz için yaptığınız fedakarlıklar, aslında sizin ruhsal olarak en çok tatmin olduğunuz anlardır.",
        7: "Kader sayısı 7 olanlar için yaşamın yolu bilgi, analiz ve ruhsal derinlikten geçer. Kaderiniz sizi her zaman gizemli konuları araştırmaya, bilimsel çalışmalar yapmaya veya ruhsal bir rehber olmaya yönlendirir. Yalnızlık ve tefekkür, hakikati bulma yolunda en büyük yardımcılarınızdır. Yüzeysel olanla yetinmeyip her şeyin ardındaki gerçek nedeni sorguladığınızda, kaderinizin size sunduğu bilgeliğe ulaşırsınız. Siz bir hakikat arayıcısınız ve kaderiniz bu bilgeliği dünyaya taşımanızı istiyor.",
        8: "Kader sayısı 8 olan bireylerin hayattaki yolu güç, başarı ve finansal bolluk üzerinden şekillenir. Kaderiniz sizi her zaman yönetici pozisyonlarına, büyük organizasyonlara ve maddi dünyanın zirvesine yönlendirir. Stratejik zekanız ve kararlılığınız sayesinde imkansız görünen hedeflere ulaşırsınız. Ancak asıl başarınız, elde ettiğiniz bu gücü adaletle ve cömertlikle birleştirdiğinizde gelecektir. Siz bir güç yöneticisisiniz ve kaderiniz maddi olanı manevi bir faydaya dönüştürmenizi bekliyor.",
        9: "Kader sayısı 9 olanlar için yaşamın yolu evrensel sevgi, tamamlanma ve insanlığa hizmetten geçer. Kaderiniz sizi hiçbir ayrım yapmadan tüm dünyaya faydalı olmaya, eski kalıpları yıkıp yeniyi getirmeye yönlendirir. Bilge ve hoşgörülü yapınız sayesinde birçok insana ışık tutarsınız. Hayatınız boyunca yaşadığınız kayıplar aslında sizi daha büyük bir anlayışa ve şifacılığa hazırlar. Siz bir dünya vatandaşı ve ruhsal bir rehbersiniz. Kaderiniz, sevginin iyileştirici gücünü her yere yaymanızı istiyor.",
        11: "Kader sayısı 11 olanlar 'Aydınlanmış Elçilerdir'. Kaderiniz size çok yüksek bir sezgisel güç ve ruhsal bir vizyon yüklemiştir. İnsanlığın bilincini yükseltecek fikirler üretmek ve onlara ruhsal bir yol göstermek sizin asıl misyonunuzdur. Karşılaştığınız duygusal fırtınalar aslında sizin içsel gücünüzü uyandırmak içindir. Sezgilerinize güvenip bu ışığı başkalarıyla paylaştığınızda, kaderinizin mucizelerine tanık olursunuz. Siz bir vizyonersiniz ve kaderiniz dünyayı ruhsal bir seviyeye taşımanızı bekliyor.",
        22: "Kader sayısı 22 'Usta Mimar' enerjisidir. Kaderiniz size büyük hayalleri maddi dünyada devasa, kalıcı ve faydalı yapılara dönüştürme gücü vermiştir. Hem 4'ün disiplini hem de 11'in vizyonuyla, dünyada büyük bir dönüşüm yaratma potansiyeline sahipsiniz. Sorumluluklarınız çok büyüktür ve sabrınız en büyük sınavınızdır. İmkansız projeleri hayata geçirmek için gereken iradeye ve güce doğuştan sahipsiniz. Siz dünyayı fiziksel olarak yeniden inşa eden bir güçsünüz.",
        33: "Kader sayısı 33 olanlar 'Usta Öğretici' ve 'Evrensel Şifacı' enerjisi taşırlar. Kaderiniz sizi koşulsuz sevgiyi dünyaya yaymaya, acıları dindirmeye ve insanlığa ruhsal bir rehberlik yapmaya yönlendirir. Merhametiniz ve fedakarlığınız en yüksek seviyededir. Başkalarının hayatında fark yaratmak sizin asıl mutluluk kaynağınızdır. Çok güçlü bir yaratıcılık ve sevgi enerjisiyle donatılmışsınızdır. Siz sevginin yaşayan bir temsilcisisiniz ve kaderiniz bu iyileştirici enerjiyi tüm kalplere taşımanızı istiyor."
    };

    document.getElementById('hc-kader-val').innerText = num;
    document.getElementById('hc-kader-desc').innerText = yorumlar[num] || "Kader analizi tamamlandı.";
    document.getElementById('hc-kader-result').classList.add('visible');
}
