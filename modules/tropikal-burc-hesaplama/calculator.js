function hcTropikalBurcHesapla() {
    const birthdate = document.getElementById('hc-tb-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const month = date.getMonth() + 1;
    const day = date.getDate();

    let sign = "";
    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) sign = "Koç";
    else if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) sign = "Boğa";
    else if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) sign = "İkizler";
    else if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) sign = "Yengeç";
    else if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) sign = "Aslan";
    else if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) sign = "Başak";
    else if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) sign = "Terazi";
    else if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) sign = "Akrep";
    else if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) sign = "Yay";
    else if ((month == 12 && day >= 22) || (month == 1 && day <= 19)) sign = "Oğlak";
    else if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) sign = "Kova";
    else sign = "Balık";

    let detailedDesc = `
        <p><strong>Tropikal Zodyak Nedir?</strong> Tropikal Zodyak, Dünya'nın Güneş etrafındaki dönüşüne ve mevsimsel döngülere dayanır. Bu sistemde Koç burcu her zaman Bahar Ekinoksu ile başlar. Batı astrolojisinde en yaygın kullanılan sistem budur.</p>
        <p><strong>Neden Önemli?</strong> Sizin karakter analiziniz, psikolojik yapınız ve hayata yaklaşımınız bu sisteme göre şekillenir. Tropikal sistem, ruhun 'dünyevi' ve 'mevsimsel' yolculuğunu temsil eder.</p>
        <p><strong>Yıldızıl (Sidereal) Farkı:</strong> Yıldızıl sistem, takımyıldızların gökyüzündeki gerçek konumunu temel alır. Dünya'nın presesyon (yalpalama) hareketi nedeniyle Tropikal ve Yıldızıl zodyaklar arasında şu an yaklaşık 24 derecelik bir fark vardır. Bu yüzden Tropikal burcunuz Koç iken, Yıldızıl burcunuz Balık olabilir.</p>
        <p>2026 yılındaki astrolojik yorumlarımızı okurken, Tropikal burcunuzu temel almanızı öneririz; çünkü Batı dünyasındaki kolektif bilinç bu sembolizm üzerinden çalışır.</p>
    `;

    document.getElementById('hc-tb-value').innerText = sign;
    document.getElementById('hc-tb-desc').innerHTML = detailedDesc;
    document.getElementById('hc-tb-result').classList.add('visible');
}
