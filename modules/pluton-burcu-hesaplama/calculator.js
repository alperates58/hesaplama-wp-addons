function hcPlutonBurcuHesapla() {
    const birthdate = document.getElementById('hc-pb-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const time = date.getTime();

    const plutoDates = [
        { start: new Date('1884-01-01').getTime(), sign: "İkizler", desc: "Bilginin ve iletişimin büyük bir güç savaşına dönüştüğü, dünya savaşlarını tetikleyen fikirlerin doğduğu nesil." },
        { start: new Date('1913-09-10').getTime(), sign: "Yengeç", desc: "Vatan ve aile kavramlarının kökten değiştiği, dünya savaşlarının yaşandığı ve güvenliğin yeniden tanımlandığı nesil." },
        { start: new Date('1939-06-14').getTime(), sign: "Aslan", desc: "Bireysel gücün, atom enerjisinin ve 'ben' merkezli liderlik anlayışının doğduğu, görkemli ama krizli bir nesil." },
        { start: new Date('1958-06-10').getTime(), sign: "Başak", desc: "İş dünyasının, teknolojinin ve sağlık sistemlerinin kökten dönüştüğü, 'baby boomers' neslinin çalışkan temsilcileri." },
        { start: new Date('1972-04-17').getTime(), sign: "Terazi", desc: "Evlilik ve ilişkilerde büyük devrimler yapan, toplumsal cinsiyet rollerini ve adaleti yeniden tanımlayan nesil." },
        { start: new Date('1984-08-28').getTime(), sign: "Akrep", desc: "Plüton kendi evinde. Cinsellik, psikoloji ve güç kavramlarında en derin dönüşümleri yaşayan, 'X kuşağı' sonu ve 'Y kuşağı' başı." },
        { start: new Date('1995-11-10').getTime(), sign: "Yay", desc: "Küreselleşmenin, internetin ve inanç sistemlerinin sınır tanımadan yayıldığı, özgürlük tutkunu Millennial nesli." },
        { start: new Date('2008-01-26').getTime(), sign: "Oğlak", desc: "Ekonomik krizlerle büyüyen, sistemleri yıkan ve kurumsal yapıları teknolojiyle dönüştüren Z kuşağı." },
        { start: new Date('2024-01-21').getTime(), sign: "Kova", desc: "Yapay zeka, toplumsal devrimler ve insanlık dışı (robotik/dijital) bir geleceğin mimarı olacak olan yeni nesil." }
    ];

    let result = null;
    for (let i = plutoDates.length - 1; i >= 0; i--) {
        if (time >= plutoDates[i].start) {
            result = plutoDates[i];
            break;
        }
    }

    if (!result) {
        alert('Girdiğiniz tarih sistemimizdeki Plüton tabloları için çok eski.');
        return;
    }

    const signDetails = {
        "İkizler": "Zihinsel bir güç odağısınız. Sözlerinizle dünyayı sarsabilir, kitleleri peşinizden sürükleyebilirsiniz.",
        "Yengeç": "Duygusal dayanıklılığınız çok yüksektir. En zor ailevi krizlerden bile güçlenerek çıkma yeteneğine sahipsiniz.",
        "Aslan": "Kendi gücünüzü sergilemekten korkmazsınız. Yaratıcılığınızda bir 'yeniden doğuş' enerjisi vardır.",
        "Başak": "Mükemmeliyetçiliğiniz bir takıntı düzeyinde olabilir ama bu sayede en karmaşık sistemleri bile baştan aşağı yenileyebilirsiniz.",
        "Terazi": "Adalet ve denge sizin için bir ölüm-kalım meselesidir. İlişkilerinizdeki güç savaşlarını fark edip dönüştürmeniz gerekir.",
        "Akrep": "En karanlık derinliklere inebilen, hiçbir şeyden korkmayan bir ruha sahipsiniz. Simyacı gibisiniz; acıyı güce dönüştürürsünüz.",
        "Yay": "Gerçeğe olan tutkunuz sizi en uzak sınırlara götürebilir. Dogmaları yıkmak ve evrensel bilgiyi yaymak sizin görevinizdir.",
        "Oğlak": "Sorumluluk ve otorite konularında çok ciddisiniz. Eski sistemlerin küllerinden yeni ve sarsılmaz yapılar inşa edersiniz.",
        "Kova": "Bireysel kimliğinizi aşmış, insanlık için dönüşüm yaratan bir dâhisiniz. Geleceği şekillendirecek olan güç sizin ellerinizdedir."
    };

    let detailedDesc = `
        <p><strong>Dönüşüm Odaklı Nesil Etkisi:</strong> ${result.desc}</p>
        <p><strong>Karakteristik Analiz:</strong> ${signDetails[result.sign]}</p>
        <p><strong>Plüton'un Hayatınızdaki Rolü:</strong> Plüton haritanızda 'yıkıp yeniden yapan' güçtür. Hayatınızda bazı şeylerin tamamen bitmesi ve küllerinden doğması gerekiyorsa, bunu Plüton yapar. Plüton hangi burçtaysa, o burcun konularında büyük bir hırs ve kontrol arzusu hissedersiniz.</p>
        <p>2026 yılı projeksiyonlarına göre, Plüton'un Kova burcundaki seyri, sizin sosyal çevrelerinizde, hayallerinizde ve teknolojiye bakış açınızda geri dönülemez değişimleri tetikleyecektir. Bu dönemde gücü başkalarını kontrol etmek için değil, kendinizi dönüştürmek için kullanmalısınız. Korkularınızın üzerine gitmek, size en büyük ödülü (gerçek özgürlüğü) getirecektir.</p>
    `;

    document.getElementById('hc-pb-sign-name').innerText = result.sign;
    document.getElementById('hc-pb-sign-desc').innerHTML = detailedDesc;
    document.getElementById('hc-pb-result').classList.add('visible');
}
