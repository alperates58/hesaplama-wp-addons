function hcSemiSextileHesapla() {
    const p1 = document.getElementById('hc-ss-p1').value;
    const p2 = document.getElementById('hc-ss-p2').value;

    const planetNames = {
        "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs",
        "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };

    let detailedContent = `
        <p><strong>Semi-Sextile (30°) Analizi:</strong> Haritanızda <strong>${planetNames[p1]}</strong> ve <strong>${planetNames[p2]}</strong> arasındaki bu açı, 'bir sonraki adımı' temsil eden ince bir gelişim bağıdır.</p>
        <p><strong>Açının Etkisi:</strong> 30 derecelik açı, birbirini takip eden burçlar arasındadır. Bu, ${planetNames[p1]}'in sunduğu imkanları ${planetNames[p2]}'nin bir basamak olarak kullanması demektir. Çok belirgin bir etki olmasa da, günlük hayatta küçük kolaylıklar ve 'doğru zamanda doğru yerde olma' şansı verir.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında bu iki gezegenin üzerinden geçecek olan transitler, haritanızdaki bu 'küçük destekleri' büyük fırsatlara dönüştürebilir. Bu yıl ayrıntılara dikkat etmek ve küçük adımların gücüne inanmak size büyük kazançlar getirecektir.</p>
        <p><strong>Tavsiye:</strong> Büyük değişimler, küçük adımlarla başlar. Bu açının size sunduğu 'gizli yardımcıları' fark etmeye çalışın.</p>
    `;

    document.getElementById('hc-ss-desc').innerHTML = detailedContent;
    document.getElementById('hc-ss-result').classList.add('visible');
}
