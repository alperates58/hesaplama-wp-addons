function hcBaskinGezegenHesapla() {
    const weights = {
        sun: document.getElementById('hc-hg-sun').value,
        moon: document.getElementById('hc-hg-moon').value,
        asc: document.getElementById('hc-hg-asc').value,
        mars: document.getElementById('hc-hg-mars').value,
        venus: document.getElementById('hc-hg-venus').value,
        mercury: document.getElementById('hc-hg-mercury').value
    };

    const rulerMap = {
        "koc": "Mars", "boga": "Venüs", "ikizler": "Merkür", "yengec": "Ay",
        "aslan": "Güneş", "basak": "Merkür", "terazi": "Venüs", "akrep": "Plüton/Mars",
        "yay": "Jüpiter", "oglak": "Satürn", "kova": "Uranüs/Satürn", "balik": "Neptün/Jüpiter"
    };

    const planetPoints = {
        "Güneş": 0, "Ay": 0, "Merkür": 0, "Venüs": 0, "Mars": 0,
        "Jüpiter": 0, "Satürn": 0, "Uranüs": 0, "Neptün": 0, "Plüton": 0
    };

    // Yükselen yöneticisi (En güçlü faktör)
    const chartRuler = rulerMap[weights.asc];
    if (chartRuler.includes('/')) {
        chartRuler.split('/').forEach(p => planetPoints[p] += 5);
    } else {
        planetPoints[chartRuler] += 5;
    }

    // Diğer gezegenlerin bulundukları burçların yöneticileri
    Object.values(weights).forEach(sign => {
        const ruler = rulerMap[sign];
        if (ruler.includes('/')) {
            ruler.split('/').forEach(p => planetPoints[p] += 2);
        } else {
            planetPoints[ruler] += 2;
        }
    });

    let dominantPlanet = "";
    let maxP = -1;
    for (let p in planetPoints) {
        if (planetPoints[p] > maxP) {
            maxP = planetPoints[p];
            dominantPlanet = p;
        }
    }

    let planetDesc = {
        "Güneş": "Siz bir lidersiniz. Parlamak, takdir edilmek ve yaratıcılığınızı sergilemek hayat amacınızdır.",
        "Ay": "Duygusal, besleyici ve sezgisel bir doğanız var. Eviniz ve sevdikleriniz sizin kalenizdir.",
        "Merkür": "Zekanız ve iletişim becerilerinizle öne çıkıyorsunuz. Meraklı, analitik ve hızlısınız.",
        "Venüs": "Aşk, estetik ve değerler sizin için her şeydir. Uyum kurmak ve güzelleştirmek sizin göreviniz.",
        "Mars": "Savaşçı, cesur ve hırslısınız. Eyleme geçmek ve kazanmak için yaşıyorsunuz.",
        "Jüpiter": "Şanslı, vizyoner ve bilgesiniz. Büyümek, öğrenmek ve ufkunuzu genişletmek temel motivasyonunuz.",
        "Satürn": "Disiplinli, sorumluluk sahibi ve sağlam adımlar atan birisiniz. Sabırla inşa etmeyi biliyorsunuz.",
        "Uranüs": "Özgün, dahi ve asisiniz. Değişim yaratmak ve geleceği şekillendirmek sizin işiniz.",
        "Neptün": "Hayalperest, ruhsal ve ilham dolusunuz. Görünenin ötesini hissedebiliyorsunuz.",
        "Plüton": "Dönüştürücü, güçlü ve gizemli birisiniz. Küllerinizden doğma gücüne sahipsiniz."
    };

    let detailedDesc = `
        <p><strong>Harita Yöneticisi Analizi:</strong> Haritanızdaki en baskın güç <strong>${dominantPlanet}</strong> gezegeni olarak belirlendi.</p>
        <p><strong>Karakter Arketipleriniz:</strong> ${planetDesc[dominantPlanet]}</p>
        <p><strong>Gezegensel Etki:</strong> Baskın gezegeniniz, hayattaki kararlarınızı ve davranış kalıplarınızı yöneten 'ana frekansınızdır'. Bu gezegenin temsil ettiği temalar (örn: ${dominantPlanet === 'Venüs' ? 'sanat, ilişkiler' : 'bilgi, ticaret'}) hayatınızda sürekli karşınıza çıkar.</p>
        <p><strong>2026 Mesajı:</strong> 2026 yılında ${dominantPlanet} gezegeninin yapacağı açılar, sizin için kadersel bir 'zirve' noktası oluşturabilir. Bu yıl bu gezegenin temsil ettiği erdemleri (cesaret, sabır, sevgi vb.) kullanarak büyük bir çıkış yapabilirsiniz.</p>
        <p><strong>Not:</strong> Harita yöneticinizi bilmek, hayattaki 'kuzey yıldızınızı' bulmak gibidir. Hangi yöne giderseniz gidin, bu gezegenin enerjisi sizi dengeleyecektir.</p>
    `;

    document.getElementById('hc-hg-value').innerText = dominantPlanet;
    document.getElementById('hc-hg-desc').innerHTML = detailedDesc;
    document.getElementById('hc-hg-result').classList.add('visible');
}
