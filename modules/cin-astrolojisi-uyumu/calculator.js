function hcCinUyumuHesapla() {
    const b1 = document.getElementById('hc-cin-sel1').value;
    const b2 = document.getElementById('hc-cin-sel2').value;

    const gruplar = [
        ["Fare", "Ejderha", "Maymun"],
        ["Öküz", "Yılan", "Horoz"],
        ["Kaplan", "At", "Köpek"],
        ["Tavşan", "Keçi", "Domuz"]
    ];

    let skor = 0;
    let desc = "";

    const ayniGrup = gruplar.find(g => g.includes(b1) && g.includes(b2));

    if (b1 === b2) {
        skor = 80;
        desc = `İkiniz de <strong>${b1}</strong> burcuna sahipsiniz. Benzer karakteristik özelliklere ve hayata benzer bakış açılarına sahip olduğunuz için birbirinizi anlamanız çok kolaydır. Ancak aynı zayıf yanları paylaştığınız için zaman zaman birbirinizin inadını veya sabırsızlığını tetikleyebilirsiniz. Genel olarak dengeli ve güven dolu bir temel kurabilirsiniz.`;
    } else if (ayniGrup) {
        skor = 98;
        desc = `İnanılmaz bir uyum! <strong>${b1} ve ${b2}</strong>, Çin astrolojisinde 'Üçlü Uyum' (San He) gruplarından birine aittir. Bu, ruhsal ve karakteristik olarak birbirinizi en iyi tamamlayan çiftlerden biri olduğunuzu gösterir. Aranızdaki enerji doğal bir akışa sahiptir; birbirinizin cümlelerini tamamlayabilir ve hayat hedeflerinize el ele yürüyebilirsiniz. Bu ilişki büyük bir başarı, mutluluk ve uzun ömürlülük vaat ediyor.`;
    } else {
        skor = 65;
        desc = `Sizlerin enerjileri (<strong>${b1} ve ${b2}</strong>) birbirinden oldukça farklıdır. Bu durum başlangıçta bazı iletişim sorunları yaratsa da, aslında birbirinizden öğrenecek çok şeyiniz var. Bu ilişkide başarı, birbirinizin farklı ritimlerine saygı duymak ve ortak bir paydada buluşmakla gelir. Biriniz daha hızlı ve enerjikken, diğeriniz daha sakin ve gözlemci olabilir. Sabırlı olduğunuzda, birbirinizi en iyi tamamlayan zıt kutuplar haline gelebilirsiniz.`;
    }

    document.getElementById('hc-cin-skor').innerText = "%" + skor;
    document.getElementById('hc-cin-u-desc').innerHTML = desc;
    document.getElementById('hc-cin-u-result').classList.add('visible');
}
