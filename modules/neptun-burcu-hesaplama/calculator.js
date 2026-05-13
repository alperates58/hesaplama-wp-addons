function hcNeptunBurcuHesapla() {
    const birthdate = document.getElementById('hc-nb-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const time = date.getTime();

    const neptuneDates = [
        { start: new Date('1901-01-01').getTime(), sign: "İkizler", desc: "Ruhsal iletişimin, edebiyatın ve bilginin kutsallaştığı bir nesil." },
        { start: new Date('1915-07-19').getTime(), sign: "Yengeç", desc: "Vatan, aile ve koruyucu içgüdülerin ruhsal bir ideal haline geldiği bir nesil." },
        { start: new Date('1929-09-21').getTime(), sign: "Aslan", desc: "Sanatın, ihtişamın ve yaratıcı ifadenin ilahi bir boyuta taşındığı bir nesil." },
        { start: new Date('1943-10-03').getTime(), sign: "Başak", desc: "Hizmetin, sağlığın ve günlük rutinlerin ruhsal bir disipline dönüştüğü bir nesil." },
        { start: new Date('1956-10-19').getTime(), sign: "Terazi", desc: "İlişkilerin, sanatın ve adaletin evrensel bir uyum arayışıyla harmanlandığı bir nesil." },
        { start: new Date('1970-11-06').getTime(), sign: "Akrep", desc: "Cinselliğin, ölümün ve psikolojinin derin ruhsal araştırmalara konu olduğu bir nesil." },
        { start: new Date('1984-11-21').getTime(), sign: "Yay", desc: "İnançların, felsefenin ve uzak dünyaların ruhsal bir vizyon haline geldiği bir nesil." },
        { start: new Date('1998-01-29').getTime(), sign: "Oğlak", desc: "Sorumlulukların, kariyerin ve toplumsal yapıların ruhsal bir görev olarak görüldüğü bir nesil." },
        { start: new Date('2012-02-03').getTime(), sign: "Balık", desc: "Neptün kendi burcunda. Sınırsız empatinin, ruhsal uyanışın ve sanatın zirve yaptığı bir nesil." },
        { start: new Date('2025-03-30').getTime(), sign: "Koç", desc: "Ruhsal öncülüğün, bireysel uyanışın ve yeni bir spiritüel dönemin başlangıcını temsil eden bir nesil." }
    ];

    let result = null;
    for (let i = neptuneDates.length - 1; i >= 0; i--) {
        if (time >= neptuneDates[i].start) {
            result = neptuneDates[i];
            break;
        }
    }

    if (!result) {
        alert('Girdiğiniz tarih sistemimizdeki Neptün tabloları için çok eski.');
        return;
    }

    const signDetails = {
        "İkizler": "Zihinsel düzeyde yüksek bir hayal gücüne sahipsiniz. Kelimelerle sihir yapabilir, karmaşık fikirleri rüyalarınızla harmanlayabilirsiniz.",
        "Yengeç": "Duygusal köklerinize ve ailenize karşı mistik bir bağınız var. Eviniz sizin için sadece bir mekan değil, ruhsal bir sığınaktır.",
        "Aslan": "Yaratıcılığınız ilahi bir ilhamla beslenir. Sahne ışıkları altında veya sanat icra ederken kendinizi aşkın bir boyutta hissedebilirsiniz.",
        "Başak": "Detaylarda gizli olan kutsallığı görebilirsiniz. Başkalarına hizmet etmek ve dünyayı daha düzenli bir yer yapmak sizin ruhsal görevinizdir.",
        "Terazi": "Güzellik ve uyum sizin için ruhsal bir ihtiyaçtır. İlişkilerinizde aradığınız şey sadece sevgi değil, ruhsal bir bütünleşmedir.",
        "Akrep": "Hayatın gizemli ve karanlık yönlerine karşı doğal bir çekiminiz var. Krizleri ruhsal bir dönüşüm fırsatı olarak görme yeteneğine sahipsiniz.",
        "Yay": "Gerçeğin peşinde koşan bir ruhsal gezginsiniz. Farklı kültürler ve felsefeler sizin için ruhunuzun gıdasıdır.",
        "Oğlak": "Hayallerinizi somut gerçekliğe dönüştürme konusunda çok sabırlısınız. Ruhsal gelişimin disiplinle geleceğine inanırsınız.",
        "Balık": "Ruhsallığın en saf halini yaşıyorsunuz. Dünyadaki acılara karşı aşırı duyarlı olabilir, evrensel sevgiyle her şeyi şifalandırmak isteyebilirsiniz.",
        "Koç": "Ruhsal olarak çok cesur ve öncüsünüz. Yeni inanç sistemleri geliştirebilir veya ruhsal uyanışın liderliğini yapabilirsiniz."
    };

    let detailedDesc = `
        <p><strong>Ruhsal Nesil Etkisi:</strong> ${result.desc}</p>
        <p><strong>Karakteristik Analiz:</strong> ${signDetails[result.sign]}</p>
        <p><strong>Neptün'ün Hayatınızdaki Rolü:</strong> Neptün haritanızda 'sisli' ama büyülü alanı temsil eder. Mantığın bittiği ve sezgilerin başladığı yerdir. Neptün hangi burçtaysa, o burcun konularında hayal gücünüz sınırsızdır. Ancak dikkatli olmalısınız; Neptün bazen gerçekleri görmenizi zorlaştırarak sizi hayal kırıklığına uğratabilir.</p>
        <p>2026 yılında Neptün'ün Balık burcundan Koç burcuna geçişi (veya sınırda seyretmesi), kolektif bilinçte büyük bir 'uyanış' yaratacaktır. Bu süreçte kendi hayalleriniz ile toplumsal idealler arasında bir köprü kurmanız gerekebilir. Sanatsal yönünüzü geliştirmek, meditasyon ve ruhsal çalışmalar bu dönemde size çok iyi gelecektir.</p>
    `;

    document.getElementById('hc-nb-sign-name').innerText = result.sign;
    document.getElementById('hc-nb-sign-desc').innerHTML = detailedDesc;
    document.getElementById('hc-nb-result').classList.add('visible');
}
