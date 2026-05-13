function hcAciKalipHesapla() {
    const type = document.getElementById('hc-ak-type').value;
    const element = document.getElementById('hc-ak-element').value;

    const typeNames = {
        "tkare": "T-Kare (T-Square)",
        "buyukucgen": "Büyük Üçgen (Grand Trine)",
        "buyukkare": "Büyük Kare (Grand Cross)",
        "yod": "Yod (Tanrı'nın Parmağı)",
        "mistikdortgen": "Mistik Dörtgen",
        "ucurtma": "Uçurtma (Kite)"
    };

    const interpretations = {
        "tkare": "Yüksek motivasyon, hırs ve zorlukları aşma gücü. Bu kalıp sizi sürekli bir eyleme ve çözüm bulmaya iter. Hayatınızdaki gerilimleri başarıya dönüştürme potansiyeliniz çok yüksektir.",
        "buyukucgen": "Doğal yetenekler, akışta olma ve şans. Çaba sarf etmeden başardığınız şeyler bu kalıptan gelir. Ancak fazla konfor alanında kalma riskine karşı dikkatli olmalısınız.",
        "buyukkare": "Büyük sorumluluklar, kadersel sınavlar ve muazzam bir direnç gücü. Hayat sizi dört koldan sıkıştırsa da, bu süreç sizi çelik gibi sağlam bir karaktere dönüştürür.",
        "yod": "Özel bir görev duygusu, kadersel yönelim ve sezgisellik. Hayatınızda 'açıklanamaz' tesadüfler ve yön değişimleri sıkça yaşanabilir. Spiritüel bir misyonunuz olabilir.",
        "mistikdortgen": "Denge, uyum ve pratik çözümler. Hayatınızdaki zıtlıkları ustaca birleştirebilir ve krizleri sakinlikle yönetebilirsiniz. Çok yönlü bir yetenek setine sahipsiniz.",
        "ucurtma": "Yeteneklerin eyleme dökülmesi ve büyük çıkışlar. Büyük Üçgen'in şansını, T-Kare'nin hırsıyla birleştirirsiniz. Hayallerinizi gerçeğe dönüştürmek sizin için çok kolaydır."
    };

    let detailedContent = `
        <p><strong>Açı Kalıbı Analizi:</strong> Haritanızda bir <strong>${typeNames[type]}</strong> bulunması, hayat hikayenizin ${type === 'tkare' || type === 'buyukkare' ? 'mücadele ve zafer' : 'yetenek ve akış'} üzerine kurulu olduğunu gösteriyor.</p>
        <p><strong>Karakter Dinamiği:</strong> ${interpretations[type]}</p>
        <p><strong>2026 Enerjisi:</strong> 2026 yılında Plüton'un Kova burcundaki ilerleyişi, özellikle ${element === 'hava' || element === 'ates' ? 'fikirlerinizi ve eylemlerinizi' : 'güvenlik ve huzur arayışınızı'} bu kalıp üzerinden test edecek. Bu yıl kalıbınızın 'çıkış noktası' olan gezegene odaklanarak hayatınızda büyük bir sıçrama yapabilirsiniz.</p>
        <p><strong>Tavsiye:</strong> Açı kalıpları, haritanın 'motorlarıdır'. Motorun nasıl çalıştığını anlamak, hayat yolculuğunda vitesinizi doğru ayarlamanızı sağlar. Bu kalıptaki en zorlu gezegeni şifalandırmaya çalışın.</p>
    `;

    document.getElementById('hc-ak-value').innerText = typeNames[type];
    document.getElementById('hc-ak-desc').innerHTML = detailedContent;
    document.getElementById('hc-ak-result').classList.add('visible');
}
