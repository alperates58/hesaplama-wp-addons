function hcBurcElementHesapla() {
    const sign = document.getElementById('hc-be-sign').value;
    
    const elements = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    const elementName = elements[sign];
    let description = "";

    if (elementName === "Ateş") {
        description = `
            <p><strong>Ateş Elementi:</strong> Canlılık, heyecan ve eylemi temsil eder. Siz Zodyak'ın motor gücüsünüz.</p>
            <p><strong>Mizaç:</strong> Kolerik (Sıcak ve Kuru). Coşkulu, dürüst ve doğrudan bir yapınız var. Bir şeye inandığınızda onu sonuna kadar savunursunuz. Sizin için hayat bir 'yapma' ve 'yaratma' sürecidir. Ancak sabırsızlık ve öfke kontrolü konusunda dikkatli olmalısınız.</p>
            <p><strong>2026 Etkisi:</strong> 2026 yılında gökyüzündeki ateş enerjisi, sizin liderlik vasıflarınızı ve girişimci ruhunuzu destekleyecek. Kendi ışığınızı parlatmak için mükemmel bir yıl.</p>
        `;
    } else if (elementName === "Toprak") {
        description = `
            <p><strong>Toprak Elementi:</strong> Maddeyi, güvenliği ve kalıcılığı temsil eder. Siz Zodyak'ın sarsılmaz kalesisiniz.</p>
            <p><strong>Mizaç:</strong> Melankolik (Soğuk ve Kuru). Pratik, gerçekçi ve çalışkan bir yapınız var. Ayaklarınız yere sağlam basar. Somut sonuçlar görmek istersiniz. Güvenilirlik sizin en büyük markanızdır. Ancak aşırı maddecilik ve esneyememe sorunlarına dikkat etmelisiniz.</p>
            <p><strong>2026 Etkisi:</strong> 2026 yılında toprak burçları için 'yapılandırma' ve 'hasat' dönemi olacak. Emeklerinizin karşılığını somut olarak alacağınız bir süreçtesiniz.</p>
        `;
    } else if (elementName === "Hava") {
        description = `
            <p><strong>Hava Elementi:</strong> Zekayı, iletişimi ve sosyalliyi temsil eder. Siz Zodyak'ın haberci ve bağlayıcı gücüsünüz.</p>
            <p><strong>Mizaç:</strong> Sanguin (Sıcak ve Nemli). Meraklı, objektif ve sosyal bir yapınız var. Bilgi sizin için en büyük hazinedir. İnsanlar arasında köprü kurmayı seversiniz. Ancak duygulardan uzaklaşma ve yüzeysellik riskine karşı dikkatli olmalısınız.</p>
            <p><strong>2026 Etkisi:</strong> 2026 yılındaki hava geçişleri, sizin zihinsel vizyonunuzu genişletecek. Yeni teknolojiler ve küresel ağlar içinde kendinize sağlam bir yer bulacaksınız.</p>
        `;
    } else {
        description = `
            <p><strong>Su Elementi:</strong> Duyguları, sezgileri ve ruhsallığı temsil eder. Siz Zodyak'ın şifacı ve derin ruhusunuz.</p>
            <p><strong>Mizaç:</strong> Flegmatik (Soğuk ve Nemli). Empatik, koruyucu ve hayalperest bir yapınız var. İnsanların hislerini kelimeler olmadan anlarsınız. Sezgileriniz en büyük rehberinizdir. Ancak aşırı hassasiyet ve duygusal dalgalanmalara karşı sınırlarınızı korumayı öğrenmelisiniz.</p>
            <p><strong>2026 Etkisi:</strong> 2026 yılında su burçları için 'ruhsal şifa' ve 'yaratıcı ilham' temaları ön planda. İç sesinizi dinleyerek büyük mucizelere tanıklık edebilirsiniz.</p>
        `;
    }

    document.getElementById('hc-be-value').innerText = elementName;
    document.getElementById('hc-be-desc').innerHTML = description;
    document.getElementById('hc-be-result').classList.add('visible');
}
