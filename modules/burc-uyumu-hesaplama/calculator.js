function hcBurcUyumuHesapla() {
    const b1 = document.getElementById('hc-burc1').value;
    const b2 = document.getElementById('hc-burc2').value;

    const elementler = {
        "Koç": "Ateş", "Aslan": "Ateş", "Yay": "Ateş",
        "Boğa": "Toprak", "Başak": "Toprak", "Oğlak": "Toprak",
        "İkizler": "Hava", "Terazi": "Hava", "Kova": "Hava",
        "Yengeç": "Su", "Akrep": "Su", "Balık": "Su"
    };

    const e1 = elementler[b1];
    const e2 = elementler[b2];

    let skor = 0;
    let desc = "";

    if (e1 === e2) {
        skor = 85;
        desc = `Her iki burç da <strong>${e1}</strong> elementine sahip olduğu için birbirinizi anlamanız ve aynı dili konuşmanız oldukça kolaydır. Benzer enerji seviyelerine ve hayata benzer bakış açılarına sahipsiniz. Bu uyum, ilişkide doğal bir akış ve güçlü bir dostluk sağlar. Ancak bazen birbirinizin gölge yanlarını da pekiştirebilirsiniz; örneğin iki ateş burcu çok fazla çatışabilir veya iki su burcu duygusallıkta boğulabilir. Genel olarak çok destekleyici ve uyumlu bir birliktelik potansiyeli taşıyorsunuz.`;
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        skor = 95;
        desc = `<strong>Ateş ve Hava</strong> kombinasyonu Zodyak'ın en dinamik ve heyecan verici uyumlarından biridir. Hava, ateşi besler ve onun daha parlak yanmasını sağlar; bu da ilişkinizde sürekli bir ilham, hareket ve entelektüel canlılık olacağı anlamına gelir. Birlikte yeni fikirler üretebilir, maceralara atılabilir ve asla sıkılmazsınız. Birbirinizin özgürlük ihtiyacına saygı duyduğunuz sürece bu ilişki her geçen gün daha da büyüyecek ve çevreye enerji yayacaktır.`;
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        skor = 90;
        desc = `<strong>Toprak ve Su</strong> uyumu, doğadaki verimlilik gibi çok besleyici ve kalıcı bir ilişki vaat eder. Su toprağı canlandırır, toprak ise suya bir kap ve yön verir. Bu birliktelikte duygusal güven, sadakat ve somut başarılar ön plandadır. Birbirinizi duygusal olarak şifalandırabilir ve birlikte çok sağlam bir gelecek inşa edebilirsiniz. Oldukça huzurlu, uzun soluklu ve aile kurmaya meyilli bir enerjiye sahipsiniz. Birbirinizin sessizliğini ve derinliğini en iyi siz anlarsınız.`;
    } else {
        skor = 65;
        desc = `Sizlerin elementleri (<strong>${e1} ve ${e2}</strong>) birbirlerinden oldukça farklı enerjilere sahiptir. Bu durum başlangıçta bazı zorluklar ve yanlış anlaşılmalar yaratsa da, aslında birbirinizi tamamlamak için harika bir fırsattır. Birbirinizde olmayan özellikleri görebilir ve hayata farklı pencerelerden bakmayı öğrenebilirsiniz. Bu ilişkide sabır, empati ve birbirinizin farklılıklarına saygı duymak başarının anahtarıdır. Zorlukları aştığınızda, çok güçlü ve öğretici bir bağ kurabilirsiniz.`;
    }

    document.getElementById('hc-uyum-skor').innerText = "%" + skor;
    document.getElementById('hc-uyum-desc').innerHTML = desc;
    document.getElementById('hc-burc-uyumu-result').classList.add('visible');
}
