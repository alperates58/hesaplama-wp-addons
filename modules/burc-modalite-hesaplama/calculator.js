function hcBurcModaliteHesapla() {
    const sign = document.getElementById('hc-bm-sign').value;
    
    const modalities = {
        "koc": "Öncü (Başlatıcı)",
        "boga": "Sabit (Sürdürücü)",
        "ikizler": "Değişken (Uyarlayıcı)",
        "yengec": "Öncü (Başlatıcı)",
        "aslan": "Sabit (Sürdürücü)",
        "basak": "Değişken (Uyarlayıcı)",
        "terazi": "Öncü (Başlatıcı)",
        "akrep": "Sabit (Sürdürücü)",
        "yay": "Değişken (Uyarlayıcı)",
        "oglak": "Öncü (Başlatıcı)",
        "kova": "Sabit (Sürdürücü)",
        "balik": "Değişken (Uyarlayıcı)"
    };

    const modaliteName = modalities[sign];
    let description = "";

    if (modaliteName.includes("Öncü")) {
        description = `
            <p><strong>Öncü (Başlatıcı) Modalite:</strong> Siz hayata yön veren, rüzgarı başlatan kişisiniz. Sizin için en büyük motivasyon 'yeni bir şeye başlamaktır'.</p>
            <p><strong>Eylem Stratejiniz:</strong> Beklemek size göre değildir. Bir problem gördüğünüzde veya bir fırsat yakaladığınızda hemen harekete geçersiniz. İş hayatında girişimci, sosyal hayatta ise ajandayı belirleyen kişisinizdir. Sizin liderliğiniz 'vizyoner' bir liderliktir. Ancak dikkat etmeniz gereken nokta, başladığınız işlerin rutinleştiği aşamada ilginizi kaybetmemektir.</p>
            <p><strong>2026 İş Dünyası Tavsiyesi:</strong> 2026 yılında hızlı kararlar almanız gerekecek. Başlatıcı gücünüzü özellikle dijital dönüşüm ve yeni iş modelleri üzerinde yoğunlaştırın. İlk adımı atan kazanır!</p>
        `;
    } else if (modaliteName.includes("Sabit")) {
        description = `
            <p><strong>Sabit (Sürdürücü) Modalite:</strong> Siz sistemin omurgasısınız. Sizin için en büyük güç 'devam ettirmek ve mükemmelleştirmektir'.</p>
            <p><strong>Eylem Stratejiniz:</strong> Bir işi devraldığınızda onu en yüksek kalite standartlarına taşırsınız. Sabrınız ve dayanıklılığınız sarsılmazdır. Zorluklar karşısında geri adım atmaz, aksine daha çok odaklanırsınız. İş hayatında güvenilir yönetici, sosyal hayatta ise sadık dostsunuzdur. Ancak stratejinizde bazen 'esneklik' eksikliği yaşayabilirsiniz; değişen şartlara inatla direnmek yerine uyum sağlamayı denemelisiniz.</p>
            <p><strong>2026 İş Dünyası Tavsiyesi:</strong> 2026 yılındaki belirsizliklerde sizin 'dengeleyici' ve 'sabit' duruşunuz size büyük saygınlık kazandıracak. Mevcut sistemleri optimize etmek bu yılın anahtarı olacak.</p>
        `;
    } else {
        description = `
            <p><strong>Değişken (Uyarlayıcı) Modalite:</strong> Siz değişimin ustasısınız. Sizin için en büyük yetenek 'her türlü şartta hayatta kalmak ve dönüştürmektir'.</p>
            <p><strong>Eylem Stratejiniz:</strong> Çok yönlü ve esneksiniz. Bir plan bozulduğunda saniyeler içinde B planına geçebilirsiniz. İletişim ağınız çok geniştir ve farklı gruplar arasında köprü kurarsınız. İş hayatında kriz yöneticisi veya danışman, sosyal hayatta ise her ortama uyum sağlayan kişisinizdir. Ancak stratejinizde bazen 'dağınıklık' yaşayabilirsiniz; her şeye evet demek yerine ana hedefinize sadık kalmaya çalışmalısınız.</p>
            <p><strong>2026 İş Dünyası Tavsiyesi:</strong> 2026 yılında çok fazla bilgi akışı olacak. Sizin bu bilgileri ayıklama ve sentezleme yeteneğiniz sizi vazgeçilmez kılacak. Çok yönlülüğünüzü bir uzmanlıkla taçlandırın.</p>
        `;
    }

    document.getElementById('hc-bm-value').innerText = modaliteName;
    document.getElementById('hc-bm-desc').innerHTML = description;
    document.getElementById('hc-bm-result').classList.add('visible');
}
