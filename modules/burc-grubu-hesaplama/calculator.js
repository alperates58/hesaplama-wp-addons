function hcBurcGrubuHesapla() {
    const burc = document.getElementById('hc-grub-burc-select').value;
    let grup = "";
    let aciklama = "";

    const gruplar = {
        oncu: ["koc", "yengec", "terazi", "oglak"],
        sabit: ["boga", "aslan", "akrep", "kova"],
        degisken: ["ikizler", "basak", "yay", "balik"]
    };

    if (gruplar.oncu.includes(burc)) {
        grup = "Öncü";
        aciklama = "Öncü burçlar (Koç, Yengeç, Terazi, Oğlak) Zodyak'ın başlatıcı enerjileridir. Mevsimlerin başlangıcını temsil eden bu burçlar, harekete geçme, yeni projeler başlatma ve liderlik etme konusunda doğal bir yeteneğe sahiptirler. Hayatın itici gücüdürler ve bir şeylerin gerçekleşmesi için gereken kıvılcımı çakarlar. Kararlı ve hırslıdırlar, hedeflerine doğru doğrudan ilerlerler. Ancak bazen başladıkları işleri bitirmekte zorlanabilirler çünkü odakları her zaman 'yeni olanı başlatmak' üzerindedir.";
    } else if (gruplar.sabit.includes(burc)) {
        grup = "Sabit";
        aciklama = "Sabit burçlar (Boğa, Aslan, Akrep, Kova) Zodyak'ın sürdürücü ve dayanıklı enerjileridir. Mevsimlerin tam ortasını temsil eden bu burçlar, başladıkları işleri sonuna kadar götürme, odaklanma ve derinleşme konusunda ustadırlar. Kararlılıkları ve sadakatleri ile tanınırlar; kolay kolay fikir değiştirmez ve prensiplerinden ödün vermezler. Hayatın istikrarını sağlayan temel taşlarıdırlar. En büyük sınavları ise değişime karşı gösterdikleri direnç ve esneklik gösterememeleridir.";
    } else if (gruplar.degisken.includes(burc)) {
        grup = "Değişken";
        aciklama = "Değişken burçlar (İkizler, Başak, Yay, Balık) Zodyak'ın uyum sağlayan ve dönüştüren enerjileridir. Mevsim geçişlerini temsil eden bu burçlar, esneklik, çok yönlülük ve değişime ayak uydurma konusunda mükemmeldirler. Bir durumun sonlanması ve yeni bir duruma geçiş aşamasında gereken arabuluculuğu ve hazırlığı yaparlar. Çok yönlü düşünürler ve farklı şartlar altında kendilerini yeniden var edebilirler. En büyük zorlukları ise zaman zaman odaklanmakta güçlük çekmek ve kararsızlık yaşamaktır.";
    }

    document.getElementById('hc-grub-value').innerText = grup;
    document.getElementById('hc-grub-desc').innerText = aciklama;
    document.getElementById('hc-burc-grubu-result').classList.add('visible');
}
