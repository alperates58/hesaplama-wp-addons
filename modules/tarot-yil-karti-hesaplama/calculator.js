function hcTarotYilHesapla() {
    const dStr = document.getElementById('hc-tyc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = new Date(dStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const currentYear = 2026; // Setting to 2026 as per project standards

    let sum = day + month + currentYear;
    while (sum > 22) {
        let t = 0;
        sum.toString().split('').forEach(v => t += parseInt(v));
        sum = t;
    }

    const yearCards = {
        1: { name: "Büyücü", desc: "Bu yıl sizin için yeni projeler başlatma ve yeteneklerinizi sergileme yılı. İnisiyatif almaktan korkmayın." },
        2: { name: "Azize", desc: "2026 sizin için içsel büyüme ve sezgilerinizin sesini dinleme yılı olacak. Acele etmeyin, beklemeyi öğrenin." },
        3: { name: "İmparatoriçe", desc: "Bolluk, bereket ve yaratıcılığın zirve yapacağı bir yıl. Yeni fikirler meyvelerini verecek." },
        4: { name: "İmparator", desc: "Disiplin ve düzen yılı. Hayatınızı rayına oturtmak ve kalıcı yapılar kurmak için ideal bir dönem." },
        5: { name: "Aziz", desc: "Eğitim, gelenekler ve ruhsal rehberlik yılı. Bir mürşitten ders alabilir veya kendiniz birilerine yol gösterebilirsiniz." },
        6: { name: "Aşıklar", desc: "İlişkiler ve önemli seçimler yılı. Kalbinizi ilgilendiren konularda kritik kararlar verebilirsiniz." },
        7: { name: "Araba", desc: "Hız ve zafer yılı. Hedeflerinize doğru kararlılıkla ilerleyecek ve engelleri aşacaksınız." },
        8: { name: "Güç", desc: "İçsel gücünüzü keşfedeceğiniz bir yıl. Zorlukları sabır ve sevgiyle aşma yeteneğiniz test edilecek." },
        9: { name: "Ermiş", desc: "İçe dönme ve tefekkür yılı. Yalnızlık size bilgelik getirecek, ruhsal derinliğiniz artacak." },
        10: { name: "Kader Çarkı", desc: "Kaderin dönüm noktası. Beklenmedik şanslı gelişmeler ve hayatınızda yeni bir döngünün başlangıcı." },
        11: { name: "Adalet", desc: "Denge ve hakikat yılı. Geçmişteki eylemlerinizin sonuçlarıyla karşılaşacak ve hayatınızı dengeleyeceksiniz." },
        12: { name: "Asılan Adam", desc: "Perspektif değiştirme yılı. Bazı konularda beklemek ve fedakarlık yapmak size yeni kapılar açacak." },
        13: { name: "Ölüm", desc: "Büyük dönüşüm yılı. Eskimiş olan her şeyi geride bırakıp yepyeni bir hayata adım atacaksınız." },
        14: { name: "Denge", desc: "Uyum ve şifa yılı. Zıtlıkları birleştirecek ve hayatınızda huzurlu bir akış yakalayacaksınız." },
        15: { name: "Şeytan", desc: "Tutkularınızla yüzleşme yılı. Sizi kısıtlayan bağları fark edip özgürleşmek için fırsatlar bulacaksınız." },
        16: { name: "Yıkılan Kule", desc: "Ani ve sarsıcı değişimler yılı. Gerçek olmayan yapılar yıkılacak, yerine daha sağlamları gelecek." },
        17: { name: "Yıldız", desc: "Umut ve ilham yılı. Hayallerinizin gerçekleşmeye başladığını görecek ve ruhsal olarak şifalanacaksınız." },
        18: { name: "Ay", desc: "Bilinçaltı ve rüyalar yılı. Belirsizliklerin içindeki sezgilerinize güvenmeli, yanılgılara dikkat etmelisiniz." },
        19: { name: "Güneş", desc: "Mutluluk, başarı ve aydınlanma yılı. Her şeyin netleştiği ve parladığınız muhteşem bir dönem." },
        20: { name: "Mahkeme", desc: "Yeniden doğuş ve çağrı yılı. Hayatınızın anlamını kavrayacak ve yeni bir bilinç seviyesine geçeceksiniz." },
        21: { name: "Dünya", desc: "Başarı ve tamamlanma yılı. Uzun süredir üzerinde çalıştığınız konuların meyvelerini toplayacaksınız." },
        22: { name: "Joker", desc: "Macera ve inanç yılı. Hiç bilmediğiniz yollara korkusuzca sapacak, hayatı bir çocuk gibi keşfedeceksiniz." }
    };

    const myYearCard = yearCards[sum];

    document.getElementById('hc-tyc-value').innerText = myYearCard.name;
    document.getElementById('hc-tyc-desc').innerHTML = `<p>${myYearCard.desc}</p>`;
    document.getElementById('hc-tarot-yil-karti-result').classList.add('visible');
}
