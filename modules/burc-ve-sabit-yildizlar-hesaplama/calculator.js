function hcSabitYildizHesapla() {
    const sign = document.getElementById('hc-sy-sign').value;
    const deg = parseInt(document.getElementById('hc-sy-deg').value || 0);

    const stars = [
        { name: "Regulus (Kuzeyin Gözcüsü)", sign: "aslan", deg: 29, theme: "Kraliyet ve Başarı", desc: "Büyük bir güç ve liderlik vadi. Ancak intikam duygusundan kaçınmalısınız." },
        { name: "Regulus (Kuzeyin Gözcüsü)", sign: "basak", deg: 0, theme: "Kraliyet ve Başarı", desc: "Büyük bir güç ve liderlik vadi. Ancak intikam duygusundan kaçınmalısınız." },
        { name: "Aldebaran (Doğunun Gözcüsü)", sign: "ikizler", deg: 9, theme: "Dürüstlük ve Şan", desc: "Büyük başarılar getirir ama dürüstlükten ödün verilirse kayıp yaşatır." },
        { name: "Antares (Batının Gözcüsü)", sign: "yay", deg: 9, theme: "Tutku ve Dönüşüm", desc: "Yüksek bir enerji ve savaşçı ruh. Aşırılıklardan kaçınmak dengeyi getirir." },
        { name: "Fomalhaut (Güneyin Gözcüsü)", sign: "balik", deg: 3, theme: "İdealizm ve Ruhsallık", desc: "Hayallerin gerçeğe dönüşmesi. Saf niyetlerle yapılan işlerde büyük başarı." },
        { name: "Sirius (Göklerin Köpeği)", sign: "yengec", deg: 14, theme: "Parlaklık ve Koruma", desc: "Sıradan olanı olağanüstüye çevirme gücü. Büyük bir koruma ve onur simgesi." },
        { name: "Algol (Medusa'nın Başı)", sign: "boga", deg: 26, theme: "Yoğunluk ve Güç", desc: "Zorlayıcı ama çok güçlü bir enerji. Duygusal kontrol ve dönüşüm gerektirir." },
        { name: "Spica (Buğday Başşağı)", sign: "terazi", deg: 24, theme: "Bolluk ve Zarafet", desc: "Astrolojinin en şanslı yıldızlarından biri. Yeteneklerin ödüllendirilmesini sağlar." }
    ];

    let foundStar = null;
    stars.forEach(star => {
        if (star.sign === sign && Math.abs(star.deg - deg) <= 1) {
            foundStar = star;
        }
    });

    let detailedContent = "";
    if (foundStar) {
        detailedContent = `
            <p><strong>Yıldız Etkisi Analizi:</strong> Seçtiğiniz konumda <strong>${foundStar.name}</strong> sabit yıldızı ile temas bulunuyor!</p>
            <p><strong>Yıldızın Teması:</strong> ${foundStar.theme}</p>
            <p><strong>Kadersel Mesaj:</strong> ${foundStar.desc}</p>
            <p><strong>2026 Yıldız Gündemi:</strong> 2026 yılında ${foundStar.name} ile kavuşum yapan ağır hareket eden gezegenler, hayatınızda 'kadersel' olarak adlandırabileceğimiz büyük olayları tetikleyebilir. Bu yıldızın erdemlerine (dürüstlük, cesaret vb.) sadık kalmak size ömür boyu sürecek bir onur kazandıracaktır.</p>
            <p><strong>Not:</strong> Sabit yıldızlar, gezegenlerin etkisini 'yıldızlaştırır'. Eğer bir gezegeniniz bu noktadaysa, o gezegenin temsil ettiği konularda sıradan bir hayatınız olmayacaktır.</p>
        `;
        document.getElementById('hc-sy-value').innerText = foundStar.name;
    } else {
        detailedContent = `
            <p><strong>Analiz Sonucu:</strong> Seçtiğiniz derecede majör bir sabit yıldız teması bulunamadı. Ancak haritanızda 1000'den fazla sabit yıldız mevcuttur. Daha detaylı bir analiz için diğer derecelerinizi kontrol edebilirsiniz.</p>
        `;
        document.getElementById('hc-sy-value').innerText = "Temas Yok";
    }

    document.getElementById('hc-sy-desc').innerHTML = detailedContent;
    document.getElementById('hc-sy-result').classList.add('visible');
}
