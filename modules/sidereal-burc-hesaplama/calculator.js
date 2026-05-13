function hcSiderealBurcHesapla() {
    const birthdate = document.getElementById('hc-sb-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const month = date.getMonth() + 1;
    const day = date.getDate();

    // 1. Tropikal Derece Tahmini (0-360)
    const signs = [
        { name: "Koç", start: 0 }, { name: "Boğa", start: 30 }, { name: "İkizler", start: 60 },
        { name: "Yengeç", start: 90 }, { name: "Aslan", start: 120 }, { name: "Başak", start: 150 },
        { name: "Terazi", start: 180 }, { name: "Akrep", start: 210 }, { name: "Yay", start: 240 },
        { name: "Oğlak", start: 270 }, { name: "Kova", start: 300 }, { name: "Balık", start: 330 }
    ];

    let tropicalDegree = 0;
    const year = date.getFullYear();
    const startOfAries = new Date(year, 2, 21);
    const diffDays = Math.floor((date - startOfAries) / (1000 * 60 * 60 * 24));
    
    tropicalDegree = (diffDays < 0 ? diffDays + 365 : diffDays) * (360/365);

    // 2. Ayanamsa (Lahiri) - Yaklaşık 24 derece geri
    // Daha hassas: 1900'de ~22.5, 2026'da ~24.2
    const ayanamsa = 22.5 + (year - 1900) * 0.0135;
    let siderealDegree = (tropicalDegree - ayanamsa + 360) % 360;

    const siderealSignIndex = Math.floor(siderealDegree / 30);
    const siderealSign = signs[siderealSignIndex].name;

    let detailedDesc = `
        <p><strong>Yıldızıl (Sidereal) Zodyak Nedir?</strong> Bu sistem, takımyıldızların gökyüzündeki fiziksel konumlarını temel alır. Hint (Vedik) astrolojisinde kullanılan ana sistemdir. Dünya'nın presesyon hareketi nedeniyle Tropikal Zodyak ile Yıldızıl Zodyak arasındaki fark her yıl biraz daha açılır.</p>
        <p><strong>Hesaplama (Ayanamsa):</strong> Sizin doğum yılınız için yaklaşık ${ayanamsa.toFixed(2)} derecelik bir kayma (Lahiri Ayanamsa) hesaplanmıştır. Bu kayma, burcunuzun Batı astrolojisine göre bir önceki burca kaymasına neden olabilir.</p>
        <p><strong>Karakter Analizi:</strong> Yıldızıl burç, ruhun 'kadersel' ve 'gökyüzündeki gerçek' konumunu temsil eder. Batı burcunuz psikolojik yapınızı anlatırken, Yıldızıl burcunuz daha çok ruhsal yolculuğunuzu ve somut kaderinizi anlatır.</p>
        <p>2026 yılında Sidereal sistemdeki geçişleri takip etmek, özellikle karma ve geçmiş yaşam etkilerini anlamak isteyenler için çok değerlidir.</p>
    `;

    document.getElementById('hc-sb-value').innerText = siderealSign;
    document.getElementById('hc-sb-desc').innerHTML = detailedDesc;
    document.getElementById('hc-sb-result').classList.add('visible');
}
