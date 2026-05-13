function hcBurcSansliSayiHesapla() {
    const sign = document.getElementById('hc-ss-sign').value;
    
    const luckyData = {
        "koc": { numbers: "1, 9, 10, 19", desc: "Mars yönetimindeki Koç için 1 başlangıcı, 9 ise tamamlanmayı ve gücü simgeler. 2026'da 19 sayısı sizin için kadersel kapıları aralayabilir." },
        "boga": { numbers: "6, 4, 15, 24", desc: "Venüs yönetimindeki Boğa için 6 estetik ve huzuru, 4 ise sağlamlığı simgeler. 24 sayısı maddi konularda size şans getirebilir." },
        "ikizler": { numbers: "5, 9, 14, 23", desc: "Merkür yönetimindeki İkizler için 5 hız ve zekayı, 9 ise vizyonu simgeler. 23 sayısı iletişim odaklı işlerinizde yanınızda olacaktır." },
        "yengec": { numbers: "2, 7, 11, 20", desc: "Ay yönetimindeki Yengeç için 2 duygusal dengeyi, 7 ise sezgisel gücü simgeler. 11 sayısı ruhsal uyanışınızda önemli rol oynayabilir." },
        "aslan": { numbers: "1, 4, 10, 13", desc: "Güneş yönetimindeki Aslan için 1 liderliği, 4 ise kararlılığı simgeler. 13 sayısı sizin için dönüşüm ve yaratıcı gücü temsil eder." },
        "basak": { numbers: "5, 3, 12, 21", desc: "Merkür yönetimindeki Başak için 5 analiz gücünü, 3 ise ifade yeteneğini simgeler. 12 sayısı hizmet odaklı projelerinizde şans getirir." },
        "terazi": { numbers: "6, 9, 15, 24", desc: "Venüs yönetimindeki Terazi için 6 adaleti ve aşkı, 9 ise evrensel uyumu simgeler. 15 sayısı sosyal çevrenizde size parıltı katar." },
        "akrep": { numbers: "9, 4, 13, 22", desc: "Plüton yönetimindeki Akrep için 9 derin dönüşümü, 4 ise gizli gücü simgeler. 22 sayısı büyük hedeflerinize ulaşmada size rehberlik eder." },
        "yay": { numbers: "3, 9, 12, 21", desc: "Jüpiter yönetimindeki Yay için 3 neşe ve bolluğu, 9 ise felsefi derinliği simgeler. 21 sayısı uzak yolculuklarda ve eğitimde şansınızdır." },
        "oglak": { numbers: "8, 2, 17, 26", desc: "Satürn yönetimindeki Oğlak için 8 otorite ve parayı, 2 ise stratejik ortaklığı simgeler. 17 sayısı kariyerinizde kalıcı başarılar getirebilir." },
        "kova": { numbers: "4, 8, 13, 22", desc: "Uranüs yönetimindeki Kova için 4 yenilikçi aklı, 8 ise toplumsal gücü simgeler. 13 sayısı dâhice fikirlerinizde size destek olur." },
        "balik": { numbers: "3, 7, 12, 21", desc: "Neptün yönetimindeki Balık için 3 hayal gücünü, 7 ise mistik derinliği simgeler. 12 sayısı sanatsal çalışmalarınızda ilham kaynağınızdır." }
    };

    const data = luckyData[sign];
    let detailedDesc = `
        <p><strong>Neden Bu Sayılar?</strong> ${data.desc}</p>
        <p><strong>Numerolojik Analiz:</strong> Sayılar sadece birer rakam değil, evrensel birer titreşimdir. Burcunuzun bu sayılarla olan uyumu, hayatınızdaki önemli kararları alırken veya şansınızı denemek istediğinizde size bir yol haritası sunar. Özellikle 2026 yılında bu sayıların katlarını veya toplamlarını (örn: 2026'nın toplamı 10 -> 1) takip etmek, evrenle uyumunuzu artıracaktır.</p>
        <p><strong>Nasıl Kullanılır?</strong> Bu sayıları önemli randevu tarihlerinizde, kapı numaralarınızda veya hayatınızdaki küçük rastlantılarda birer 'işaret' olarak görebilirsiniz. Ancak unutmayın, en büyük şans sizin kendi çabanız ve niyetinizdir.</p>
    `;

    document.getElementById('hc-ss-value').innerText = data.numbers;
    document.getElementById('hc-ss-desc').innerHTML = detailedDesc;
    document.getElementById('hc-ss-result').classList.add('visible');
}
