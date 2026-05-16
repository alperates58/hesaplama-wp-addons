function hcAskTarotHesapla() {
    const d1 = document.getElementById('hc-atc-date1').value;
    const d2 = document.getElementById('hc-atc-date2').value;
    if (!d1 || !d2) {
        alert('Lütfen her iki doğum tarihini de seçin.');
        return;
    }

    const getSum = (str) => {
        const d = new Date(str);
        return d.getDate() + (d.getMonth() + 1) + d.getFullYear();
    };

    let finalSum = getSum(d1) + getSum(d2);
    while (finalSum > 22) {
        let t = 0;
        finalSum.toString().split('').forEach(v => t += parseInt(v));
        finalSum = t;
    }
    if (finalSum === 0) finalSum = 22;

    const loveCards = {
        1: { name: "Büyücü", desc: "İlişkinizde her şeyi mümkün kılan bir yaratıcılık var. Beraber yeni dünyalar kurabilirsiniz." },
        2: { name: "Azize", desc: "Sessiz, derin ve sezgisel bir bağ. Birbirinizi kelimeler olmadan anlayabiliyorsunuz." },
        3: { name: "İmparatoriçe", desc: "Besleyici, şefkatli ve bereketli bir aşk. İlişkiniz büyümeye ve güzelleşmeye çok açık." },
        4: { name: "İmparator", desc: "Güven ve istikrar üzerine kurulu bir ilişki. Birbirinize sağlam bir liman oluyorsunuz." },
        5: { name: "Aziz", desc: "Geleneksel, saygı dolu ve öğretici bir bağ. Birbirinizden çok şey öğreniyorsunuz." },
        6: { name: "Aşıklar", desc: "Tutkulu, romantik ve uyumlu bir aşk. Gerçek ruh eşi enerjisini taşıyorsunuz." },
        7: { name: "Araba", desc: "Aksiyon dolu ve kararlı bir ilişki. Beraber aşamayacağınız engel yok." },
        8: { name: "Güç", desc: "Nezaket ve sabırla güçlenen bir bağ. Birbirinizin en yumuşak yanlarını bile seviyorsunuz." },
        9: { name: "Ermiş", desc: "Olgun ve bilgece bir aşk. Beraber ruhsal olarak büyüyeceğiniz bir yolculuktasınız." },
        10: { name: "Kader Çarkı", desc: "Kadersel bir karşılaşma. Hayatın sürprizleriyle güçlenen dinamik bir ilişki." },
        11: { name: "Adalet", desc: "Dürüstlük ve denge üzerine kurulu bir bağ. Birbirinize karşı her zaman adil ve netsiniz." },
        12: { name: "Asılan Adam", desc: "Farklılıklara saygı duyan, fedakar bir aşk. Bazen durup olaylara beraber başka gözle bakmalısınız." },
        13: { name: "Ölüm", desc: "Dönüştürücü bir ilişki. Beraberken ikiniz de çok değişecek ve yenileneceksiniz." },
        14: { name: "Denge", desc: "Huzurlu, sakin ve dengeli bir bağ. Birbirinizi tamamlayan muhteşem bir kimyanız var." },
        15: { name: "Şeytan", desc: "Çok güçlü bir çekim ve tutku. Bağımlılıklara dikkat ederek bu enerjiyi yaratıcılığa dökebilirsiniz." },
        16: { name: "Yıkılan Kule", desc: "Sarsıcı ama gerçeğe dayalı bir ilişki. Her yıkım sonrası daha sağlam bir bağ kuruyorsunuz." },
        17: { name: "Yıldız", desc: "Umut verici ve iyileştirici bir aşk. Birbirinize ilham kaynağı oluyorsunuz." },
        18: { name: "Ay", desc: "Derin duygular ve hayallerle dolu bir bağ. Bazen belirsizlikler olsa da sezgileriniz sizi birleştiriyor." },
        19: { name: "Güneş", desc: "Neşeli, aydınlık ve her anı mutluluk dolu bir ilişki. Beraberken ışık saçıyorsunuz." },
        20: { name: "Mahkeme", desc: "Ciddi kararların ve uyanışların olduğu bir bağ. İlişkinizde her zaman bir amaç var." },
        21: { name: "Dünya", desc: "Bütünleşmiş, tam ve başarılı bir aşk. Beraber huzurlu bir dünya kurmuşsunuz." },
        22: { name: "Joker", desc: "Özgür, macera dolu ve heyecanlı bir ilişki. Her gününüz yeni bir keşif gibi." }
    };

    const myLoveCard = loveCards[finalSum];

    document.getElementById('hc-atc-value').innerText = myLoveCard.name;
    document.getElementById('hc-atc-desc').innerHTML = `<p>${myLoveCard.desc}</p>`;
    document.getElementById('hc-ask-tarot-karti-result').classList.add('visible');
}
