function hcStationaryHesapla() {
    const planet = document.getElementById('hc-st-planet').value;
    const sign = document.getElementById('hc-st-sign').value;

    const planetNames = {
        "merkur": "Merkür", "venus": "Venüs", "mars": "Mars", "jupiter": "Jüpiter",
        "saturn": "Satürn", "uranus": "Uranüs", "neptun": "Neptün", "pluton": "Plüton"
    };
    const signNames = { "koc": "Koç", "boga": "Boğa", "ikizler": "İkizler", "yengec": "Yengeç", "aslan": "Aslan", "basak": "Başak", "terazi": "Terazi", "akrep": "Akrep", "yay": "Yay", "oglak": "Oğlak", "kova": "Kova", "balik": "Balık" };

    const interpretations = {
        "merkur": "Zekanız bir lazer kadar keskin ve odaklı. Bir konuyu derinlemesine anlama ve çözme yeteneğiniz muazzamdır. Sözleriniz kadersel bir ağırlık taşır.",
        "venus": "Sevgi ve estetik anlayışınız sarsılmaz bir kararlılığa sahip. Değer verdiğiniz şeylere olan bağlılığınız hayatınızın ana rotasını belirler.",
        "mars": "Eylem gücünüz patlamaya hazır bir volkan gibidir. Bir şeyi hedeflediğinizde sizi durdurmak imkansızdır. Fiziksel ve ruhsal dayanıklılığınız çok yüksektir.",
        "jupiter": "İnançlarınız ve vizyonunuz kadersel bir rehberlik taşır. Hayattaki şansınız, tek bir alandaki aşırı uzmanlaşmanızdan ve bilgeliğinizden gelir.",
        "saturn": "Disiplin ve sorumluluk sizin en güçlü yanınızdır. Hayatınızda inşa ettiğiniz her şey ömür boyu kalıcı olacak kadar sağlamdır.",
        "uranus": "Deha seviyesinde özgün fikirleriniz var. Dünyayı değiştirecek o 'anlık' ilhamlar sizde sabitleşmiş durumdadır.",
        "neptun": "İlham ve sezgi kanalınız her zaman açık. Ruhsal derinliğiniz ve hayal gücünüzle başkalarına şifa verebilirsiniz.",
        "pluton": "Dönüşüm gücünüz o kadar yüksek ki, hayatınızdaki her krizi bir küllerinden doğuş hikayesine çevirebilirsiniz. Çok derin bir karizmanız var."
    };

    let detailedContent = `
        <p><strong>Durağan (S) Analizi:</strong> Haritanızda <strong>${planetNames[planet]} (S)</strong> konumunun ${signNames[sign]} burcunda olması, bu gezegenin haritanızdaki 'en güçlü' enerji noktası olduğunu gösterir.</p>
        <p><strong>Kadersel Güç:</strong> Durağan gezegenler, durup yön değiştirmek üzere oldukları için tüm enerjilerini o dereceye odaklarlar. Bu durum sizi o gezegenin temsil ettiği konularda (örn: ${planet === 'merkur' ? 'bilgi, ticaret' : 'ilişkiler, sanat'}) bir 'uzman' veya 'odak noktası' yapar.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında durağan gezegeninizin temsil ettiği hayat alanı, kadersel bir 'zirve' noktasına ulaşacak. Uzun süredir emek verdiğiniz o 'sabit' konu artık meyvelerini vermeye başlayacak. Bu yıl hayatınızdaki en büyük sıçramayı bu gezegen üzerinden yapacaksınız.</p>
        <p><strong>Tavsiye:</strong> En büyük gücünüz, en büyük sorumluluğunuzdur. Bu yoğun enerjiyi yapıcı ve yaratıcı hedefler için kullanın.</p>
    `;

    document.getElementById('hc-st-value').innerText = `${planetNames[planet]} Durağan`;
    document.getElementById('hc-st-desc').innerHTML = detailedContent;
    document.getElementById('hc-st-result').classList.add('visible');
}
