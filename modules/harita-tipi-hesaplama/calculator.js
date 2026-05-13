function hcHaritaTipiHesapla() {
    const selects = document.querySelectorAll('.hc-ht-planet');
    const houses = [];
    selects.forEach(s => houses.push(parseInt(s.value)));

    const uniqueHouses = [...new Set(houses)].sort((a, b) => a - b);
    const houseCount = uniqueHouses.length;
    
    // Find maximum gap
    let maxGap = 0;
    for(let i=0; i<uniqueHouses.length; i++) {
        let gap;
        if(i === uniqueHouses.length - 1) {
            gap = (12 - uniqueHouses[i]) + uniqueHouses[0];
        } else {
            gap = uniqueHouses[i+1] - uniqueHouses[i];
        }
        if(gap > maxGap) maxGap = gap;
    }

    let model = "";
    let desc = "";

    if (maxGap >= 8) {
        model = "Demet (Bundle)";
        desc = "Tüm enerjiniz çok dar bir alanda toplanmış. Belirli bir konuda uzmanlaşma ve derinleşme yeteneğiniz çok yüksek. Ancak hayata bakışınız biraz sınırlı olabilir.";
    } else if (maxGap >= 6) {
        model = "Çanak (Bowl)";
        desc = "Haritanın bir yarısı tamamen boş. Bu durum, hayatınızda bir şeyleri tamamlama ve 'kendine yetme' arzusunu tetikler. Deneyimlerinizi içselleştirmekte ustasınız.";
    } else if (maxGap >= 4) {
        model = "Lokomotif (Locomotive)";
        desc = "Enerjiniz haritanın büyük kısmına yayılmış ama 120 derecelik bir boşluk var. Bu boşluğu kapatmak için müthiş bir itici güce ve motivasyona sahipsiniz.";
    } else if (maxGap <= 2 && houseCount >= 8) {
        model = "Yayılma (Splash)";
        desc = "Enerjiniz her yere dağılmış. Çok yönlü, her konuda bilgisi olan ve sosyal birisiniz. Ancak odaklanmakta zorluk çekebilirsiniz.";
    } else {
        model = "Kova (Bucket)";
        desc = "Çoğu gezegen bir tarafta, bir gezegen ise karşı tarafta (sap) duruyor. O tek gezegen hayatınızın yönünü ve enerjinizi nereye akıtacağınızı belirleyen anahtar güçtür.";
    }

    let detailedContent = `
        <p><strong>Harita Modeli Analizi:</strong> Haritanızın genel yapısı <strong>${model}</strong> modeline uygun görünüyor.</p>
        <p><strong>Hayat Stratejiniz:</strong> ${desc}</p>
        <p><strong>Enerji Dağılımı:</strong> Harita tipi, sizin dünya ile nasıl etkileşime girdiğinizi gösteren bir 'kuş bakışı' analizidir. ${model === 'Demet' ? 'Odak noktanız çok net.' : model === 'Çanak' ? 'Eksik olanı tamamlama dürtüsüyle hareket ediyorsunuz.' : 'Çok kanallı bir hayat yaşıyorsunuz.'}</p>
        <p><strong>2026 Enerji Yönetimi:</strong> 2026 yılında gezegenlerin yapacağı transitler, haritanızdaki bu 'boşlukları' ve 'dolulukları' tetikleyecek. Boş olan alanlarınızı partneriniz veya hobilerinizle doldurmaya çalışın. Bu yıl ${model === 'Lokomotif' ? 'hedeflerinize ulaşmak için gereken o itici gücü bulacaksınız' : 'enerjinizi daha dengeli kullanmanız gereken bir yıl olacak'}.</p>
        <p><strong>Tavsiye:</strong> Harita modelinizi bir 'yetenek haritası' olarak görün. Boş alanlar zayıflık değil, dinlenme ve gelişim alanlarınızdır.</p>
    `;

    document.getElementById('hc-ht-value').innerText = model;
    document.getElementById('hc-ht-desc').innerHTML = detailedContent;
    document.getElementById('hc-ht-result').classList.add('visible');
}
