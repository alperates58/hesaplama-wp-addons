function hcDogumTarotHesapla() {
    const dStr = document.getElementById('hc-tbc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = new Date(dStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    let sum = day + month + year;
    
    // Reduce until <= 22
    while (sum > 22) {
        let tempSum = 0;
        sum.toString().split('').forEach(digit => tempSum += parseInt(digit));
        sum = tempSum;
    }

    const cards = {
        1: { name: "Büyücü (The Magician)", desc: "Yeteneklerinizi gerçeğe dönüştürme gücüne sahipsiniz. Yeni başlangıçlar ve sınırsız potansiyel sizi temsil eder." },
        2: { name: "Azize (The High Priestess)", desc: "Sezgileriniz ve içsel bilgeliğiniz en büyük rehberinizdir. Gizemli ve derin bir doğaya sahipsiniz." },
        3: { name: "İmparatoriçe (The Empress)", desc: "Yaratıcılık, bolluk ve şefkat sembolüsünüz. Doğayla ve yaşamın güzellikleriyle güçlü bir bağınız var." },
        4: { name: "İmparator (The Emperor)", desc: "Disiplin, otorite ve yapılandırma gücünüz ön planda. Liderlik ve koruyuculuk sizin doğanızda var." },
        5: { name: "Aziz (The Hierophant)", desc: "Gelenekler, ruhsal rehberlik ve öğrenme sizin için önemlidir. Bilgiyi aktaran ve yol gösteren birisiniz." },
        6: { name: "Aşıklar (The Lovers)", desc: "İlişkiler, seçimler ve uyum yaşamınızın merkezinde. Kalbinizin sesini dinleyerek dengeyi bulursunuz." },
        7: { name: "Araba (The Chariot)", desc: "Kararlılık ve zafer sembolüsünüz. İradenizle engelleri aşabilir ve hedeflerinize hızla ulaşabilirsiniz." },
        8: { name: "Güç (Strength)", desc: "İçsel cesaret, sabır ve şefkat gücünüzdür. Zorlukları nezaketle ve sarsılmaz bir inançla yenersiniz." },
        9: { name: "Ermiş (The Hermit)", desc: "İçsel bir yolculuk ve bilgelik arayışı içindesiniz. Yalnızlıkta bulduğunuz ışıkla başkalarına yol gösterirsiniz." },
        10: { name: "Kader Çarkı (Wheel of Fortune)", desc: "Değişim ve döngüler hayatınızda önemli rol oynar. Şansın döneceğine olan inancınızla her duruma uyum sağlarsınız." },
        11: { name: "Adalet (Justice)", desc: "Dürüstlük, denge ve hakikat sizin için her şeydir. Kararlarınızı her zaman adil bir şekilde vermeye çalışırsınız." },
        12: { name: "Asılan Adam (The Hanged Man)", desc: "Olaylara farklı açılardan bakabilme ve fedakarlık yapabilme yeteneğiniz var. Sabır sizin için bir güçtür." },
        13: { name: "Ölüm (Death)", desc: "Dönüşüm ve yenilenme sembolüsünüz. Eskiyi bırakıp yeniyi kucaklama gücüne sahipsiniz." },
        14: { name: "Denge (Temperance)", desc: "Uyum, sabır ve ölçülülük yaşam felsefenizdir. Farklı enerjileri bir araya getirerek denge kurarsınız." },
        15: { name: "Şeytan (The Devil)", desc: "Dünyevi tutkular ve bağlarla yüzleşme gücünüz var. Kendi gölge yanlarınızı tanıyarak özgürleşebilirsiniz." },
        16: { name: "Yıkılan Kule (The Tower)", desc: "Ani değişimler ve uyanışlar sizi güçlendirir. Eski yapıları yıkıp yerine daha sağlamlarını kurarsınız." },
        17: { name: "Yıldız (The Star)", desc: "Umut, ilham ve ruhsal şifa sembolüsünüz. En karanlık anlarda bile ışığınızı kaybetmezsiniz." },
        18: { name: "Ay (The Moon)", desc: "Hayal gücü, rüyalar ve bilinçaltı sizin dünyanızdır. Karmaşıklığın içindeki gerçeği sezebilirsiniz." },
        19: { name: "Güneş (The Sun)", desc: "Başarı, mutluluk ve canlılık sizi tanımlar. Çevrenize ışık ve neşe saçan bir enerjiniz var." },
        20: { name: "Mahkeme (Judgement)", desc: "Yeniden doğuş ve içsel çağrı. Geçmişi değerlendirip yeni bir farkındalıkla yola devam etme gücünüz var." },
        21: { name: "Dünya (The World)", desc: "Tamamlanma, bütünlük ve başarı. Yolculuğunuzun sonunda hak ettiğiniz huzur ve tatmine ulaşırsınız." },
        22: { name: "Joker (The Fool)", desc: "Masumiyet, yeni başlangıçlar ve inançla atılan adımlar. Hayata karşı cesur ve önyargısız bir yaklaşımınız var." }
    };

    const myCard = cards[sum];

    document.getElementById('hc-tbc-value').innerText = myCard.name;
    document.getElementById('hc-tbc-desc').innerHTML = `<p>${myCard.desc}</p>`;
    document.getElementById('hc-dogum-tarot-karti-result').classList.add('visible');
}
