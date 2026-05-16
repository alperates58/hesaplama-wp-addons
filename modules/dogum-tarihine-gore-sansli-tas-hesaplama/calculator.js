function hcSansliTasTarihHesapla() {
    const dStr = document.getElementById('hc-lsd-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = new Date(dStr);
    const month = d.getMonth() + 1;
    const day = d.getDate();

    let sign = "";
    let stones = "";
    let desc = "";

    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) {
        sign = "Koç"; stones = "Akik, Kan Taşı";
        desc = "Koç burcu olarak enerjinizi dengelemek ve cesaretinizi pekiştirmek için bu taşlar sizin için en iyisidir.";
    } else if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) {
        sign = "Boğa"; stones = "Safir, Turkuaz";
        desc = "Boğa burcunun sabırlı ve kararlı doğasını bu taşlar destekler, huzur verir.";
    } else if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) {
        sign = "İkizler"; stones = "Akik, İnci";
        desc = "İkizler'in zihinsel hızını dengelemek ve iletişim gücünü artırmak için uğurlu taşlarınızdır.";
    } else if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) {
        sign = "Yengeç"; stones = "Zümrüt, Ay Taşı";
        desc = "Hassas ve koruyucu Yengeç burcu için Ay Taşı duygusal denge sağlar.";
    } else if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) {
        sign = "Aslan"; stones = "Yakut, Topaz";
        desc = "Aslan'ın görkemli enerjisini ve özgüvenini parlatacak en güçlü taşlar bunlardır.";
    } else if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) {
        sign = "Başak"; stones = "Yeşim, Jasper";
        desc = "Başak burcunun titiz ve detaycı yapısına bu taşlar toprak enerjisiyle destek olur.";
    } else if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) {
        sign = "Terazi"; stones = "Opal, Lapis Lazuli";
        desc = "Terazi'nin estetik ve denge arayışını bu zarif taşlar tamamlar.";
    } else if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) {
        sign = "Akrep"; stones = "Topaz, Granat";
        desc = "Akrep'in derin ve gizemli enerjisini dengelemek için bu taşlar birebirdir.";
    } else if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) {
        sign = "Yay"; stones = "Turkuaz, Obsidyen";
        desc = "Yay burcunun özgür ruhuna ve maceracı yapısına şans getiren taşlar.";
    } else if ((month == 12 && day >= 22) || (month == 1 && day <= 19)) {
        sign = "Oğlak"; stones = "Kuvars, Kehribar";
        desc = "Oğlak burcunun disiplinli ve hırslı doğasını bu taşlar korur.";
    } else if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) {
        sign = "Kova"; stones = "Ametist, Florit";
        desc = "Kova'nın yenilikçi ve bağımsız ruhuna en uyumlu enerji Ametist'ten gelir.";
    } else {
        sign = "Balık"; stones = "Akuamarin, Mercan";
        desc = "Duygusal ve sezgisel Balık burcu için suyun enerjisini taşıyan uğurlu taşlar.";
    }

    document.getElementById('hc-lsd-value').innerText = stones;
    document.getElementById('hc-lsd-desc').innerHTML = `<p><strong>${sign}</strong> burcu için: ${desc}</p>`;
    document.getElementById('hc-dogum-tarihine-gore-sansli-tas-result').classList.add('visible');
}
