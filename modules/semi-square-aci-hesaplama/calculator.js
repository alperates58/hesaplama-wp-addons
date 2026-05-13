function hcSemiSquareHesapla() {
    const p1 = document.getElementById('hc-sq-p1').value;
    const p2 = document.getElementById('hc-sq-p2').value;

    const planetNames = {
        "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs",
        "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };

    let detailedContent = `
        <p><strong>Semi-Square (45°) Analizi:</strong> Haritanızda <strong>${planetNames[p1]}</strong> ve <strong>${planetNames[p2]}</strong> arasındaki bu açı, 'kumdaki çakıl taşı' gibi sürekli bir huzursuzluk yaratır.</p>
        <p><strong>Açının Etkisi:</strong> 45 derecelik açı, kare açı kadar sert olmasa da, içten içe kemiren bir stres kaynağıdır. ${planetNames[p1]}'in istekleri ile ${planetNames[p2]}'nin gerçekleri arasında bir sürtünme yaşarsınız. Bu durum sizi harekete geçmeye zorlar ama sonuçları bazen tatminsizlik yaratabilir.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında bu açının tetiklenmesi, haritanızdaki bu 'küçük pürüzleri' çözmek için size motivasyon verecek. Bu yıl ertelediğiniz o 'küçük' sorunların aslında hayat kalitenizi ne kadar etkilediğini fark edip, onları kalıcı olarak çözeceksiniz.</p>
        <p><strong>Tavsiye:</strong> Küçük pürüzleri görmezden gelmek yerine, onları birer gelişim fırsatı olarak görün. Sürtünme ısı yaratır, bu ısıyı bir şeyi dönüştürmek için kullanın.</p>
    `;

    document.getElementById('hc-sq-desc').innerHTML = detailedContent;
    document.getElementById('hc-sq-result').classList.add('visible');
}
