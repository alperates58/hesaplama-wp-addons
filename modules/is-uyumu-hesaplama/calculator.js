function hcIsUyumHesapla() {
    const sign1 = document.getElementById('hc-iu-sign1').value;
    const sign2 = document.getElementById('hc-iu-sign2').value;

    const signModalities = {
        "koc": "Öncü", "yengec": "Öncü", "terazi": "Öncü", "oglak": "Öncü",
        "boga": "Sabit", "aslan": "Sabit", "akrep": "Sabit", "kova": "Sabit",
        "ikizler": "Değişken", "basak": "Değişken", "yay": "Değişken", "balik": "Değişken"
    };

    const modalite1 = signModalities[sign1];
    const modalite2 = signModalities[sign2];

    let score = 50;
    let desc = "";

    if (modalite1 === "Öncü" && modalite2 === "Sabit") {
        score = 95;
        desc = "Mükemmel bir ekip! Biriniz vizyonu başlatırken diğeriniz onu sağlamlaştırıyor ve sürdürüyor. İş dünyasında en başarılı ortaklıklar bu ikiliden çıkar.";
    } else if (modalite1 === "Sabit" && modalite2 === "Değişken") {
        score = 85;
        desc = "Güçlü bir operasyonel ekip. Biriniz istikrar sağlarken diğeriniz değişen şartlara hızla uyum sağlıyor. Verimlilik potansiyeliniz çok yüksek.";
    } else if (modalite1 === "Öncü" && modalite2 === "Değişken") {
        score = 80;
        desc = "Hızlı ve yaratıcı bir ekip. Sürekli yeni fikirler ve esnek çözümler üretebilirsiniz. Ancak işleri tamamlamak ve disiplin kurmak için bir sisteme ihtiyacınız var.";
    } else if (modalite1 === modalite2) {
        score = 60;
        desc = "Benzer çalışma stillerine sahipsiniz. Bu durum başlangıçta iyi hissettirse de, işlerin sıkışmasına veya yetki çatışmasına neden olabilir. Görev dağılımını çok net yapmalısınız.";
    } else {
        score = 70;
        desc = "Farklı ama birbirini tamamlayan profesyonel yaklaşımlarınız var. İletişimi açık tuttuğunuz sürece başarılı bir iş birliği yürütebilirsiniz.";
    }

    let detailedContent = `
        <p><strong>Profesyonel Sinerji Analizi:</strong> ${desc}</p>
        <p><strong>Başarı Anahtarınız:</strong> Sizin (${modalite1}) ve ortağınızın (${modalite2}) çalışma stilleri, bir projenin farklı aşamalarında birbirinizi kurtarabilir. Özellikle kriz anlarında kimin 'lider' kimin 'uygulayıcı' olacağını önceden belirlemek verimliliğinizi %200 artıracaktır.</p>
        <p><strong>2026 İş Gündemi:</strong> 2026 yılında profesyonel dünyada 'teknolojik yetkinlik' ve 'hızlı adaptasyon' her şeyden önemli olacak. Bu yıl birlikte bir dijital yatırım veya eğitim projesine girmek, uzun vadeli finansal başarınızı garantileyebilir.</p>
        <p><strong>Tavsiye:</strong> Haftalık 'strateji toplantıları' yaparak vizyonunuzu tazelemeli ve birbirinize yapıcı geri bildirimler vermelisiniz.</p>
    `;

    document.getElementById('hc-iu-value').innerText = `% ${score}`;
    document.getElementById('hc-iu-desc').innerHTML = detailedContent;
    document.getElementById('hc-iu-result').classList.add('visible');
}
