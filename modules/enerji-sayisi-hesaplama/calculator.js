function hcEnerjiSayisiHesapla() {
    const dStr = document.getElementById('hc-en-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi seçin.');
        return;
    }

    const digits = dStr.replace(/-/g, '').split('');
    let sum = 0;
    digits.forEach(d => sum += parseInt(d));

    while (sum > 9) {
        let tempSum = 0;
        sum.toString().split('').forEach(d => tempSum += parseInt(d));
        sum = tempSum;
    }

    const energyMeanings = {
        1: "Öncü Enerji: Başlatma ve yaratma gücüne sahipsiniz. Kararlılığınız çevrenize ilham verir.",
        2: "Uyumlu Enerji: Dengeli ve birleştirici bir yapıdasınız. Hassasiyetiniz en büyük gücünüzdür.",
        3: "Dinamik Enerji: Dışa dönük, neşeli ve yaratıcı bir enerji yayıyorsunuz. Kendinizi ifade etmekte çok başarılısınız.",
        4: "İstikrarlı Enerji: Güvenilir, pratik ve sağlam bir yapınız var. Hayatınızı düzen üzerine kurarsınız.",
        5: "Özgür Enerji: Değişken, maceracı ve meraklısınız. Yeni deneyimler enerjinizi tazeler.",
        6: "Koruyucu Enerji: Sorumluluk sahibi ve şefkatlisiniz. Çevrenizi iyileştiren bir enerjiniz var.",
        7: "Ruhsal Enerji: İç gözlem yapan, derin ve bilge bir yapıdasınız. Sırları keşfetmek sizin doğanızda var.",
        8: "Yönetici Enerji: Güçlü, hırslı ve sonuç odaklısınız. Maddi ve manevi dengeyi kurma yeteneğiniz yüksek.",
        9: "Evrensel Enerji: Hümanist, fedakar ve geniş görüşlüsünüz. Dünyayı daha iyi bir yer yapma enerjisi taşıyorsunuz."
    };

    document.getElementById('hc-en-value').innerText = sum;
    document.getElementById('hc-en-desc').innerHTML = `<p>${energyMeanings[sum]}</p>`;
    document.getElementById('hc-enerji-sayisi-result').classList.add('visible');
}
