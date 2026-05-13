function hcBurcEvHesapla() {
    const sign = document.getElementById('hc-be-sign').value;
    const house = document.getElementById('hc-be-house').value;

    const signNames = {
        "koc": "Koç", "boga": "Boğa", "ikizler": "İkizler", "yengec": "Yengeç",
        "aslan": "Aslan", "basak": "Başak", "terazi": "Terazi", "akrep": "Akrep",
        "yay": "Yay", "oglak": "Oğlak", "kova": "Kova", "balik": "Balık"
    };

    const houseThemes = {
        "1": "Kimlik ve Başlangıçlar",
        "2": "Maddi Güvenlik",
        "3": "Yakın Bağlar",
        "4": "Kökler ve Yuva",
        "5": "Yaratıcılık ve Aşk",
        "6": "Hizmet ve Sağlık",
        "7": "İlişkiler",
        "8": "Kriz ve Dönüşüm",
        "9": "Ufuklar ve İnanç",
        "10": "Toplumsal Statü",
        "11": "Gelecek Planları",
        "12": "Ruhsal Derinlik"
    };

    let desc = `Haritanızda ${house}. evi ${signNames[sign]} burcunun yönetmesi, hayatınızın <strong>${houseThemes[house]}</strong> alanında ${signNames[sign]} enerjisini kullandığınızı gösterir. `;

    const houseInterpretations = {
        "1": "Dışarıya verdiğiniz imaj çok dinamik ve dikkat çekici. İnsanlar sizi ilk gördüklerinde bu burcun özelliklerini hissederler.",
        "2": "Para kazanma ve harcama alışkanlıklarınız bu burcun doğasına göre şekillenir. Maddi değerlere bakışınız çok spesifiktir.",
        "3": "Kardeşleriniz, yakın akrabalarınız ve temel eğitim hayatınız bu burcun enerjisiyle örülüdür. İletişim diliniz buna göre belirlenir.",
        "4": "Ailenizle olan bağlarınız ve ev hayatınızdaki huzur arayışınız bu burcun karakterini yansıtır. Köklerinize çok bağlısınız.",
        "5": "Aşk hayatınızda ve yaratıcı projelerinizde bu burcun coşkusunu taşıyorsunuz. Çocuklarla olan ilişkileriniz de bu temayla şekillenir.",
        "6": "Günlük iş rutinleriniz ve sağlık konularındaki yaklaşımınız bu burcun disiplinini veya esnekliğini taşır.",
        "7": "Partner seçimlerinizde ve uzun vadeli ortaklıklarınızda bu burcun özelliklerini arıyor veya bu enerjiyle dengeleniyorsunuz.",
        "8": "Maddi krizler, miras konuları veya ruhsal dönüşüm süreçleriniz bu burcun derinliğiyle yönetiliyor.",
        "9": "Yüksek öğrenim, yurt dışı konuları ve hayata bakış felsefeniz bu burcun vizyonuyla gelişiyor.",
        "10": "Kariyerinizdeki başarı kriterleriniz ve toplum önündeki duruşunuz bu burcun hedefleriyle paraleldir.",
        "11": "Arkadaşlık gruplarınız ve sosyal projelerdeki rolünüz bu burcun enerjisiyle parlar. Hayalleriniz bu temada şekillenir.",
        "12": "Bilinçaltınız, rüyalarınız ve gizli düşmanlıklar bu burcun gölge veya şifacı yanlarıyla ilgilidir."
    };

    let detailedContent = `
        <p>${desc}</p>
        <p><strong>Detaylı Analiz:</strong> ${houseInterpretations[house]}</p>
        <p><strong>2026 Transit Etkisi:</strong> 2026 yılında ${house}. evinizden geçecek olan büyük gezegenler, hayatınızın bu alanında önemli bir 'yenilenme' getirecek. Eğer bu evinizde ${signNames[sign]} burcu varsa, bu yıl ${sign === 'koc' || sign === 'aslan' ? 'cesur kararlar' : 'stratejik adımlar'} atmanız gerekebilir.</p>
        <p><strong>Tavsiye:</strong> Bu yerleşimin gücünü kullanmak için, o evin temsil ettiği hayat alanında burcunuzun en iyi özelliklerini (örn: ${signNames[sign]}'ın dürüstlüğü veya sabrı) sergileyin.</p>
    `;

    document.getElementById('hc-be-value').innerText = houseThemes[house];
    document.getElementById('hc-be-desc').innerHTML = detailedContent;
    document.getElementById('hc-be-result').classList.add('visible');
}
