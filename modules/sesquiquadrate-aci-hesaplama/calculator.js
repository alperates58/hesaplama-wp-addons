function hcSesquiquadrateHesapla() {
    const p1 = document.getElementById('hc-ssq-p1').value;
    const p2 = document.getElementById('hc-ssq-p2').value;

    const planetNames = {
        "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs",
        "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };

    let detailedContent = `
        <p><strong>Sesquiquadrate (135°) Analizi:</strong> Haritanızda <strong>${planetNames[p1]}</strong> ve <strong>${planetNames[p2]}</strong> arasındaki bu açı, 'bir adım ileri, iki adım geri' hissi yaratan dışsal engelleri temsil eder.</p>
        <p><strong>Açının Etkisi:</strong> 135 derecelik açı, kare açının (90°) bir üst versiyonu gibidir. Ancak burada engeller genellikle dış dünyadan, diğer insanlardan veya şartlardan gelir. ${planetNames[p1]}'in hedeflerine ulaşmak isterken ${planetNames[p2]}'nin temsil ettiği konular (örn: kurallar, duygusal blokajlar) karşınıza bir duvar gibi çıkabilir.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında bu açının kadersel olarak tetiklenmesi, sizin 'sabır ve azim' sınavınızı başarıyla vermenizi sağlayacak. Bu yıl, engellerle savaşmak yerine onları aşacak yeni yollar (diplomasi, strateji) geliştireceksiniz. Zorlukların sizi daha güçlü kıldığı bir yıl olacak.</p>
        <p><strong>Tavsiye:</strong> Duvara kafa atmak yerine, duvarın etrafından dolanmayı öğrenin. Esneklik, en sert engeli bile aşmanın tek yoludur.</p>
    `;

    document.getElementById('hc-ssq-desc').innerHTML = detailedContent;
    document.getElementById('hc-ssq-result').classList.add('visible');
}
