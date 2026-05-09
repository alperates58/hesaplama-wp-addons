function hcBurcElementiHesapla() {
    const burc = document.getElementById('hc-element-burc-select').value;
    let element = "";
    let aciklama = "";

    const elementler = {
        ates: ["koc", "aslan", "yay"],
        toprak: ["boga", "basak", "oglak"],
        hava: ["ikizler", "terazi", "kova"],
        su: ["yengec", "akrep", "balik"]
    };

    if (elementler.ates.includes(burc)) {
        element = "Ateş";
        aciklama = "Ateş grubu burçları (Koç, Aslan, Yay) Zodyak'ın en enerjik, tutkulu ve hareketli bireyleridir. Onlar hayatın kıvılcımıdır; her zaman yeni maceralara atılmaya, başkalarına ilham vermeye ve liderlik etmeye hazırdırlar. İçsel bir motivasyonla hareket ederler ve zorluklar karşısında cesaretlerini asla yitirmezler. Ancak sabırsızlık ve dürtüsellik, bu ateşli enerjinin gölge yanları olabilir. Hayatı bir serüven olarak görürler ve her anı dolu dolu yaşamak isterler.";
    } else if (elementler.toprak.includes(burc)) {
        element = "Toprak";
        aciklama = "Toprak grubu burçları (Boğa, Başak, Oğlak) pratiklik, güvenilirlik ve gerçekçiliğin temsilcileridir. Ayakları her zaman yere sağlam basar ve somut sonuçlar elde etmek için sabırla çalışırlar. Maddi dünyayla olan bağları güçlüdür; konfor, düzen ve güvenlik onlar için vazgeçilmezdir. Dayanıklılıkları sayesinde en zorlu projeleri bile başarıyla tamamlarlar. Gölge yönleri ise değişime direnç göstermek ve aşırı maddeci olmak olabilir. Onlar hayatın sağlam temelini oluştururlar.";
    } else if (elementler.hava.includes(burc)) {
        element = "Hava";
        aciklama = "Hava grubu burçları (İkizler, Terazi, Kova) entelektüel kapasite, sosyal iletişim ve fikirlerin dünyasını temsil eder. Bilgiye olan açlıkları onları sürekli öğrenmeye ve bu bilgiyi başkalarıyla paylaşmaya iter. Objektif bakış açıları sayesinde olayları farklı yönlerden değerlendirebilirler. Sosyal ilişkiler ve adalet duygusu onlar için hayati önem taşır. Ancak zaman zaman duygulardan uzaklaşarak aşırı rasyonel kalabilirler. Onlar hayatın zihinsel bağlarını ve iletişim ağlarını kuran kişilerdir.";
    } else if (elementler.su.includes(burc)) {
        element = "Su";
        aciklama = "Su grubu burçları (Yengeç, Akrep, Balık) derin duygusallık, sezgi ve ruhsallığın temsilcileridir. Empati yetenekleri o kadar gelişmiştir ki başkalarının hislerini kendi içlerinde duyumsayabilirler. Hayatın görünmeyen, gizemli ve manevi yönleriyle güçlü bir bağları vardır. Sezgilerine güvenerek hareket ederler ve çevrelerine şifa veren, besleyici bir enerji yayarlar. Gölge yanları ise aşırı hassasiyet ve duygusal dalgalanmalar olabilir. Onlar hayatın duygusal derinliğini ve ruhsal anlamını koruyan ruhlardır.";
    }

    document.getElementById('hc-element-value').innerText = element;
    document.getElementById('hc-element-desc').innerText = aciklama;
    document.getElementById('hc-burc-elementi-result').classList.add('visible');
}
