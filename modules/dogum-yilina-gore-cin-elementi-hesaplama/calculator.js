function hcDogumYiliElementHesapla() {
    const year = parseInt(document.getElementById('hc-cey-year').value);
    if (!year) {
        alert('Lütfen doğum yılınızı girin.');
        return;
    }

    const lastDigit = year % 10;
    let element = "";
    let desc = "";

    if (lastDigit === 0 || lastDigit === 1) {
        element = "Metal";
        desc = "Metal elementi insanları kararlı, hırslı ve disiplinlidir. Güçlü bir iradeye sahiptirler ve hedeflerine ulaşmak için odaklanırlar. Bazen mesafeli veya fazla sert görünebilirler ancak sadakatleri çok yüksektir.";
    } else if (lastDigit === 2 || lastDigit === 3) {
        element = "Su";
        desc = "Su elementi insanları sezgisel, esnek ve ikna edicidir. Uyum yetenekleri çok yüksektir ve olaylara derinlemesine bakarlar. Duygusal zekaları gelişmiştir, ancak bazen fazla kararsız kalabilirler.";
    } else if (lastDigit === 4 || lastDigit === 5) {
        element = "Ağaç (Tahta)";
        desc = "Ağaç elementi insanları yaratıcı, idealist ve büyüme odaklıdır. Yeniliklere açıktırlar ve sürekli kendilerini geliştirmek isterler. Cömert ve yardımseverdirler, ancak bazen fazla inatçı olabilirler.";
    } else if (lastDigit === 6 || lastDigit === 7) {
        element = "Ateş";
        desc = "Ateş elementi insanları enerjik, tutkulu ve maceracıdır. Liderlik özellikleri ön plandadır ve çevrelerine ışık saçarlar. Heyecanlı ve girişkendirler, ancak sabırsızlık ve öfke patlamalarına eğilimli olabilirler.";
    } else if (lastDigit === 8 || lastDigit === 9) {
        element = "Toprak";
        desc = "Toprak elementi insanları güvenilir, sabırlı ve pratiktir. Hayata karşı sağlam bir duruş sergilerler ve sorumluluk almaktan çekinmezler. Denge ve istikrar ararlar, bazen fazla tutucu veya yavaş olabilirler.";
    }

    document.getElementById('hc-cey-name').innerText = element;
    document.getElementById('hc-cey-desc').innerHTML = `<p>${desc}</p>`;
    document.getElementById('hc-dogum-yilina-gore-cin-elementi-result').classList.add('visible');
}
