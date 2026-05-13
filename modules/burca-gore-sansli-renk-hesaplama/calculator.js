function hcBurcSansliRenkHesapla() {
    const sign = document.getElementById('hc-sr-sign').value;
    
    const colorData = {
        "koc": { name: "Kırmızı", hex: "#e84118", desc: "Ateş elementinin ve Mars'ın rengi olan kırmızı, sizin cesaretinizi, tutkunuzu ve yaşam enerjinizi temsil eder. Özgüven tazelemeniz gereken günlerde kırmızı tonlarını tercih edin." },
        "boga": { name: "Yeşil ve Pembe", hex: "#44bd32", desc: "Doğanın huzurunu yansıtan yeşil ve Venüs'ün zarif pembe tonları, sizin ihtiyacınız olan güven ve konfor duygusunu pekiştirir. Maddi bolluk için yeşil, duygusal denge için pembe kullanın." },
        "ikizler": { name: "Sarı", hex: "#f1c40f", desc: "Zekanın ve neşenin rengi olan sarı, zihinsel süreçlerinizi hızlandırır ve iletişiminizi güçlendirir. Öğrenme ve sosyalleşme zamanlarında sarı aksesuarlar şans getirir." },
        "yengec": { name: "Gümüş ve Beyaz", hex: "#dcdde1", desc: "Ay'ın ışığını temsil eden gümüş ve saf beyaz, sizin hassas ruhunuzu korur ve sezgilerinizi berraklaştırır. Huzur aradığınız anlarda bu renklere yönelin." },
        "aslan": { name: "Altın ve Turuncu", hex: "#f39c12", desc: "Güneş'in görkemini yansıtan altın sarısı ve canlı turuncu, sizin yaratıcılığınızı ve karizmanızı ön plana çıkarır. Dikkat çekmek istediğinizde bu renkler sizin imzanızdır." },
        "basak": { name: "Toprak Tonları ve Lacivert", hex: "#8d6e63", desc: "Doğanın verimliliğini simgeleyen kahverengi ve Merkür'ün disiplinli laciverti, sizin analiz gücünüzü ve odaklanma yeteneğinizi artırır." },
        "terazi": { name: "Pastel Mavi ve Pembe", hex: "#74b9ff", desc: "Dengenin ve nezaketin renkleri olan pastel tonlar, sizin diplomatik ruhunuzu ve estetik anlayışınızı besler. Huzurlu bir ortam yaratmak için bu renkleri kullanın." },
        "akrep": { name: "Bordo ve Siyah", hex: "#800000", desc: "Plüton'un gizemini ve tutkusunu temsil eden derin kırmızı ve siyah, sizin karizmanızı ve dönüştürücü gücünüzü simgeler. Güçlü görünmek istediğinizde bu renkler vazgeçilmezinizdir." },
        "yay": { name: "Mor ve Eflatun", hex: "#8e44ad", desc: "Jüpiter'in bilgeliğini ve vizyonunu yansıtan mor tonları, sizin spiritüel derinliğinizi ve öğrenme aşkınızı simgeler. Vizyoner projelerinizde mor size rehberlik eder." },
        "oglak": { name: "Koyu Yeşil ve Siyah", hex: "#2d3436", desc: "Satürn'ün disiplinini ve ciddiyetini temsil eden koyu tonlar, sizin sarsılmaz otoritenizi ve sabrınızı simgeler. İş dünyasında bu renkler size saygınlık katar." },
        "kova": { name: "Turkuaz ve Elektrik Mavisi", hex: "#00d2d3", desc: "Uranüs'ün yenilikçi ve aykırı ruhunu yansıtan canlı mavi tonları, sizin özgünlüğünüzü ve dâhice fikirlerinizi besler." },
        "balik": { name: "Deniz Yeşili ve Menekşe", hex: "#1dd1a1", desc: "Neptün'ün hayal dünyasını ve sınırsızlığını temsil eden bu renkler, sizin empati yeteneğinizi ve sanatsal ilhamınızı artırır." }
    };

    const data = colorData[sign];
    let detailedDesc = `
        <p><strong>Aura Etkisi:</strong> ${data.desc}</p>
        <p><strong>Nasıl Kullanılır?</strong> Bu renkleri sadece kıyafetlerinizde değil, çalışma masanızda, ev dekorasyonunuzda ve hatta dijital duvar kağıtlarınızda kullanarak enerjinizi bu frekansa uyumlayabilirsiniz.</p>
        <p><strong>2026 Renk Trendi:</strong> 2026 yılında burcunuzun rengini metalik aksesuarlarla birleştirmek, özellikle teknolojik cihazlarınızda bu tonları tercih etmek, kariyerinizde 'görünür' olmanızı sağlayacaktır.</p>
    `;

    document.getElementById('hc-sr-value').innerText = data.name;
    document.getElementById('hc-sr-box').style.backgroundColor = data.hex;
    document.getElementById('hc-sr-desc').innerHTML = detailedDesc;
    document.getElementById('hc-sr-result').classList.add('visible');
}
