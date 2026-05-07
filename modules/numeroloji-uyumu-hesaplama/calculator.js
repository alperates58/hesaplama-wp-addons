function hcNumUyumuHesapla() {
    const lp1 = parseInt(document.getElementById('hc-num-lp1').value);
    const lp2 = parseInt(document.getElementById('hc-num-lp2').value);

    let skor = 0;
    let desc = "";

    // Simplified Numerology Compatibility Table Logic
    const compatible = {
        1: [1, 3, 5, 9],
        2: [2, 4, 6, 8, 11],
        3: [1, 3, 5, 6, 9],
        4: [2, 4, 6, 7, 8, 22],
        5: [1, 3, 5, 7],
        6: [2, 3, 4, 6, 9, 33],
        7: [4, 5, 7, 9],
        8: [2, 4, 8],
        9: [1, 3, 6, 7, 9],
        11: [2, 11],
        22: [4, 22],
        33: [6, 33]
    };

    if (lp1 === lp2) {
        skor = 90;
        desc = `Her ikiniz de <strong>${lp1}</strong> Yaşam Yolu sayısına sahipsiniz. Aynı temel frekansta olduğunuz için birbirinizin hayattaki hedeflerini, arzularını ve zorluklarını çok iyi anlarsınız. Bu durum ilişkide derin bir dostluk ve ortak bir vizyon sağlar. Ancak birbirinizin zayıf yönlerini de pekiştirme riskiniz vardır. Yine de, ruhsal olarak birbirinize en yakın olan kişilersiniz. Birlikteyken kendinizi evinizde gibi hissedersiniz.`;
    } else if (compatible[lp1] && compatible[lp1].includes(lp2)) {
        skor = 95;
        desc = `Harika bir numerolojik uyum! <strong>${lp1}</strong> ve <strong>${lp2}</strong> sayıları birbirini mükemmel bir şekilde dengeler. Aranızda doğal bir çekim ve karşılıklı destek vardır. Biriniz vizyonerken diğeri uygulayıcı olabilir veya biriniz duygusal derinlik sağlarken diğeri zihinsel netlik getirebilir. Bu ilişki, her iki tarafın da en iyi versiyonuna dönüşmesine yardımcı olacak bir potansiyel taşır. 2026 yılı enerjileri, bu uyumu daha da güçlendirecektir.`;
    } else {
        skor = 75;
        desc = `Sayılarınız (<strong>${lp1} ve ${lp2}</strong>) farklı yaşam derslerini temsil ediyor. Bu durum, ilişkinizde başlangıçta bazı uyum sorunları yaratsa da aslında çok güçlü bir 'tamamlama' enerjisidir. Birbirinizde olmayan özellikleri keşfedebilir ve hayata farklı açılardan bakmayı öğrenebilirsiniz. Bu ilişkide başarı, birbirinizin bireysel yollarına saygı duymak ve ortak bir paydada buluşmakla gelir. Sabırlı olduğunuzda, çok öğretici ve köklü bir bağ kurabilirsiniz.`;
    }

    document.getElementById('hc-num-skor').innerText = "%" + skor;
    document.getElementById('hc-num-desc').innerHTML = desc;
    document.getElementById('hc-num-uyumu-result').classList.add('visible');
}
