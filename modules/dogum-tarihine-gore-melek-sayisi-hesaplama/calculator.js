function hcDogumMelekSayisiHesapla() {
    const dStr = document.getElementById('hc-abd-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = dStr.replace(/-/g, '');
    let sum = 0;
    d.split('').forEach(char => sum += parseInt(char));

    while (sum > 9 && sum !== 11 && sum !== 22) {
        let tempSum = 0;
        sum.toString().split('').forEach(char => tempSum += parseInt(char));
        sum = tempSum;
    }

    const angelMeanings = {
        1: "Yol Gösterici: Melekleriniz yeni yollar açmanız ve liderlik etmeniz için sizi destekliyor. Kendi gücünüze güvenin.",
        2: "Dengeleyici: Melekleriniz hayatınızda huzur ve iş birliği yaratmanız için size rehberlik ediyor. Yalnız değilsiniz.",
        3: "Yaratıcı Enerji: Melekleriniz kendinizi ifade etmeniz ve neşenizi yaymanız için sizi teşvik ediyor. İlham yanınızda.",
        4: "Koruyucu İnşaatçı: Melekleriniz temellerinizi sağlamlaştırmanız ve güvenli bir gelecek kurmanız için yanınızda.",
        5: "Değişim Elçisi: Melekleriniz sizi özgürleşmeye ve hayatın getirdiği maceraları kucaklamaya çağırıyor.",
        6: "Sevgi Koruyucusu: Melekleriniz aile, yuva ve sorumluluk konularında size şefkatle rehberlik ediyor.",
        7: "Bilgelik Arayıcısı: Melekleriniz ruhsal derinliğinizi keşfetmeniz ve içsel gerçeğinize ulaşmanız için size ışık tutuyor.",
        8: "Bolluk Kaynağı: Melekleriniz hak ettiğiniz bolluk ve bereketi hayatınıza çekmeniz için size güç veriyor.",
        9: "Ruhsal Işık: Melekleriniz bir döngüyü kapatıp başkalarına ışık olmanız için sizi hazırlıyor.",
        11: "Ruhsal Elçi: Siz yüksek bir sezgiye ve ruhsal uyanış potansiyeline sahipsiniz. Melekleriniz size vahiyler sunuyor.",
        22: "Usta İnşaatçı: Melekleriniz büyük hayallerinizi somut gerçeğe dönüştürmeniz için size sınırsız güç veriyor."
    };

    document.getElementById('hc-abd-value').innerText = sum;
    document.getElementById('hc-abd-desc').innerHTML = `<p>${angelMeanings[sum]}</p>`;
    document.getElementById('hc-dogum-tarihine-gore-melek-sayisi-result').classList.add('visible');
}
