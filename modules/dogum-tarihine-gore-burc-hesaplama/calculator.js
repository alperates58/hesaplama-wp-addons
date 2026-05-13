function hcDogumTarihiBurcHesapla() {
    const day = parseInt(document.getElementById('hc-dt-day').value);
    const month = parseInt(document.getElementById('hc-dt-month').value);

    if (!day || !month) {
        alert('Lütfen gün ve ay bilgilerini giriniz.');
        return;
    }

    let sign = "";
    let desc = "";

    const signsInfo = {
        "Koç": "Siz Zodyak'ın cesur şövalyesisiniz. Durdurulamaz bir enerjiniz ve her zaman yeniye olan merakınız var. Sizin için hayat bir macera alanıdır.",
        "Boğa": "Güven ve huzurun sembolüsünüz. Ayakları yere sağlam basan, değerlerine sahip çıkan ve güzellikleri kucaklayan bir doğanız var.",
        "İkizler": "Bilginin ve iletişimin efendisisiniz. Zekanızla ışık saçar, merakınızla dünyayı keşfeder ve her ortama neşe katarsınız.",
        "Yengeç": "Duyguların derin koruyucusunuz. Şefkatinizle sarıp sarmalar, sezgilerinizle yolu bulur ve sevdikleriniz için bir kale olursunuz.",
        "Aslan": "Siz Zodyak'ın parlayan yıldızısınız. Cömertliğiniz, yaratıcılığınız ve doğal karizmanızla her zaman ilham kaynağı olursunuz.",
        "Başak": "Düzenin ve verimliliğin mimarısınız. Keskin analiz gücünüzle en karmaşık işleri bile kolayca çözer ve her zaman en iyiyi hedeflersiniz.",
        "Terazi": "Uyumun ve adaletin temsilcisisiniz. Diplomatik yeteneklerinizle köprüler kurar, estetik anlayışınızla dünyayı güzelleştirirsiniz.",
        "Akrep": "Derinliğin ve dönüşümün simgesisiniz. Güçlü sezgileriniz ve sarsılmaz kararlılığınızla hayatın en gizemli kapılarını aralarsınız.",
        "Yay": "Vizyonun ve özgürlüğün elçisisiniz. Felsefi bakış açınız ve iyimserliğinizle her zaman daha uzak ufukları hedeflersiniz.",
        "Oğlak": "Zirveye giden yolun sabırlı yolcususunuz. Disiplininiz, sorumluluk bilinciniz ve stratejik aklınızla her türlü zorluğu aşarsınız.",
        "Kova": "Geleceğin ve yeniliğin sesisiniz. Bağımsız ruhunuz ve insancıl ideallerinizle topluma ışık tutan bir dâhisiniz.",
        "Balık": "Ruhsallığın ve hayallerin limanısınız. Sınırsız empati yeteneğiniz ve yaratıcılığınızla evrensel sevginin bir parçasısınız."
    };

    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) sign = "Koç";
    else if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) sign = "Boğa";
    else if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) sign = "İkizler";
    else if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) sign = "Yengeç";
    else if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) sign = "Aslan";
    else if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) sign = "Başak";
    else if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) sign = "Terazi";
    else if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) sign = "Akrep";
    else if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) sign = "Yay";
    else if ((month == 12 && day >= 22) || (month == 1 && day <= 19)) sign = "Oğlak";
    else if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) sign = "Kova";
    else sign = "Balık";

    desc = signsInfo[sign];

    let detailedContent = `
        <p><strong>Öz:</strong> ${desc}</p>
        <p><strong>Karakteriniz:</strong> ${sign} burcu olarak, hayata bakış açınız bu burcun temel dinamikleriyle şekillenir. Sizin için dürüstlük ve kendiniz olmak her şeyden önemlidir. Diğer hesaplama araçlarımızı kullanarak bu burcun dekanını, niteliğini ve 2026 yılındaki özel etkilerini de detaylıca öğrenebilirsiniz.</p>
        <p>Unutmayın, burcunuz sadece Güneş'in konumudur; sizi tam olarak tanımlayan şey, tüm gezegenlerin birleşimi olan doğum haritanızdır.</p>
    `;

    document.getElementById('hc-dt-value').innerText = sign;
    document.getElementById('hc-dt-desc').innerHTML = detailedContent;
    document.getElementById('hc-dt-result').classList.add('visible');
}
