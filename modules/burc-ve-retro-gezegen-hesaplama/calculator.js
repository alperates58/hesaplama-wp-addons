function hcRetroHesapla() {
    const planet = document.getElementById('hc-rx-planet').value;
    const sign = document.getElementById('hc-rx-sign').value;

    const planetNames = {
        "merkur": "Merkür", "venus": "Venüs", "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };
    const signNames = { "koc": "Koç", "boga": "Boğa", "ikizler": "İkizler", "yengec": "Yengeç", "aslan": "Aslan", "basak": "Başak", "terazi": "Terazi", "akrep": "Akrep", "yay": "Yay", "oglak": "Oğlak", "kova": "Kova", "balik": "Balık" };

    const interpretations = {
        "merkur": "Zihniniz dış dünyadan çok iç dünyaya odaklı. Kendinizi ifade etmekte acele etmek yerine, derinlemesine düşünmeyi tercih ediyorsunuz. İletişimde 'farklı' bir diliniz var.",
        "venus": "Sevgi ve değer anlayışınız alışılmışın dışında. İlişkilerde geçmiş temalar veya kadersel karşılaşmalar sıkça yaşanabilir. Kendi değerinizi içeriden inşa etmelisiniz.",
        "mars": "Eylem gücünüzü doğrudan değil, stratejik ve içsel bir şekilde kullanıyorsunuz. Öfkenizi veya arzularınızı dışa vurmak yerine, onları bir yakıt olarak içeride dönüştürüyorsunuz.",
        "jupiter": "Şans ve bereket anlayışınız ruhsal bir temele dayanıyor. Maddi kazançtan çok, içsel bir genişleme ve bilgelik peşindesiniz. Kendi doğrularınızı sorgulamaktan korkmuyorsunuz.",
        "saturn": "Sorumluluk duygusu sizin için çok derin ve bazen ağır bir yüktür. Geçmişten gelen kadersel ödevleri tamamlamak için buradasınız. Sabır sizin en büyük öğretmeniniz."
    };

    let detailedContent = `
        <p><strong>Retro (Rx) Analizi:</strong> Haritanızda <strong>${planetNames[planet]} (Rx)</strong> konumunun ${signNames[sign]} burcunda olması, bu gezegenin enerjisini 'içselleştirdiğinizi' gösterir.</p>
        <p><strong>Ruhsal Dinamik:</strong> ${interpretations[planet]}</p>
        <p><strong>2026 Mesajı:</strong> 2026 yılında gökyüzündeki retro döngüleri, sizin bu doğuştan gelen retro enerjinizle rezonansa girecek. Bu yıl, geçmişte yarım kalan bir konuyu (ilişki, iş, proje) tamamlama ve ondan tamamen özgürleşme şansı bulacaksınız. Kendi içinize yaptığınız yolculuk, en büyük keşfiniz olacak.</p>
        <p><strong>Tavsiye:</strong> Retro gezegenler 'ikinci bir şans' demektir. Hayatın size sunduğu tekrarları birer engel değil, birer basamak olarak görün.</p>
    `;

    document.getElementById('hc-rx-value').innerText = `${planetNames[planet]} Retro`;
    document.getElementById('hc-rx-desc').innerHTML = detailedContent;
    document.getElementById('hc-rx-result').classList.add('visible');
}
