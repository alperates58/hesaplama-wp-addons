function hcSansliRenkIsimHesapla() {
    const name = document.getElementById('hc-lcn-name').value.trim().toLowerCase();
    if (!name) {
        alert('Lütfen adınızı girin.');
        return;
    }

    const charMap = {
        'a': 1, 'j': 1, 's': 1, 'ş': 1,
        'b': 2, 'k': 2, 't': 2,
        'c': 3, 'ç': 3, 'l': 3, 'u': 3, 'ü': 3,
        'd': 4, 'm': 4, 'v': 4,
        'e': 5, 'n': 5, 'w': 5,
        'f': 6, 'o': 6, 'ö': 6, 'x': 6,
        'g': 7, 'ğ': 7, 'p': 7, 'y': 7,
        'h': 8, 'q': 8, 'z': 8,
        'i': 9, 'ı': 9, 'r': 9
    };

    let sum = 0;
    for (let char of name) {
        if (charMap[char]) sum += charMap[char];
    }

    while (sum > 9) {
        let tempSum = 0;
        sum.toString().split('').forEach(d => tempSum += parseInt(d));
        sum = tempSum;
    }

    const colors = {
        1: { name: "Kırmızı", hex: "#FF0000", desc: "Kırmızı, güç ve tutku rengidir. Liderlik özelliklerinizi ve yaşama sevincinizi pekiştirir." },
        2: { name: "Turuncu", hex: "#FFA500", desc: "Turuncu, yaratıcılık ve neşe rengidir. Sosyal ilişkilerinizde ve sanatsal üretimlerinizde size şans getirir." },
        3: { name: "Sarı", hex: "#FFFF00", desc: "Sarı, zeka ve iyimserlik rengidir. Odaklanmanızı artırır ve pozitif enerji yaymanızı sağlar." },
        4: { name: "Yeşil", hex: "#008000", desc: "Yeşil, denge ve şifa rengidir. Maddi ve manevi huzuru bulmanıza yardımcı olur." },
        5: { name: "Mavi", hex: "#0000FF", desc: "Mavi, barış ve iletişim rengidir. Kendinizi doğru ifade etmenizi ve içsel dinginliğe ulaşmanızı destekler." },
        6: { name: "Çivit Mavisi (İndigo)", hex: "#4B0082", desc: "Çivit mavisi, sezgi ve derin farkındalık rengidir. Ruhsal uyanışınızda size rehberlik eder." },
        7: { name: "Mor (Menekşe)", hex: "#8A2BE2", desc: "Mor, bilgelik ve ruhanilik rengidir. Hayal gücünüzü ve spiritüel bağlantılarınızı güçlendirir." },
        8: { name: "Pembe", hex: "#FFC0CB", desc: "Pembe, sevgi ve şefkat rengidir. Kalp enerjinizi yumuşatır ve ikili ilişkilerinizde uyum sağlar." },
        9: { name: "Altın Sarısı / Beyaz", hex: "#FFD700", desc: "Altın sarısı, evrensel sevgi ve başarı rengidir. Hayatınızda bolluk ve aydınlanma getirir." }
    };

    const myColor = colors[sum];

    document.getElementById('hc-lcn-value').innerText = myColor.name;
    document.getElementById('hc-lcn-box').style.backgroundColor = myColor.hex;
    document.getElementById('hc-lcn-desc').innerHTML = `<p>${myColor.desc}</p>`;
    document.getElementById('hc-sansli-renk-result').classList.add('visible');
}
