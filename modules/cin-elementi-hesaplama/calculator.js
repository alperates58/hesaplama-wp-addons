function hcCinElemHesapla() {
    const dateStr = document.getElementById('hc-cine-date').value;
    if (!dateStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    
    const year = new Date(dateStr).getFullYear();
    const lastDigit = year % 10;

    const elementler = {
        0: { name: "Metal", desc: "Metal elementi, sarsılmaz bir iradeyi, disiplini ve kararlılığı temsil eder. Bu elemente sahip olanlar, hedeflerine ulaşmak için büyük bir dayanıklılık sergilerler. Kendi kurallarıyla yaşamayı severler ve oldukça dürüsttürler. Ancak bazen fazla katı ve tavizsiz olabilirler. Hayatlarında düzen ve kalite en önemli unsurlardır." },
        1: { name: "Metal", desc: "Metal elementi, sarsılmaz bir iradeyi, disiplini ve kararlılığı temsil eder. Bu elemente sahip olanlar, hedeflerine ulaşmak için büyük bir dayanıklılık sergilerler. Kendi kurallarıyla yaşamayı severler ve oldukça dürüsttürler. Ancak bazen fazla katı ve tavizsiz olabilirler. Hayatlarında düzen ve kalite en önemli unsurlardır." },
        2: { name: "Su", desc: "Su elementi, sezgiselliği, esnekliği ve derin duygusal bir kavrayışı simgeler. Bu kişiler çevrelerine çok kolay uyum sağlarlar ve insanların niyetlerini anlama konusunda çok yeteneklidirler. Sessiz ama derinden ilerleyen bir güçleri vardır. İletişim kurma yetenekleri çok gelişmiştir, ancak bazen fazla pasif veya kararsız olabilirler. Hayatın akışına güvenmek onların ana felsefesidir." },
        3: { name: "Su", desc: "Su elementi, sezgiselliği, esnekliği ve derin duygusal bir kavrayışı simgeler. Bu kişiler çevrelerine çok kolay uyum sağlarlar ve insanların niyetlerini anlama konusunda çok yeteneklidirler. Sessiz ama derinden ilerleyen bir güçleri vardır. İletişim kurma yetenekleri çok gelişmiştir, ancak bazen fazla pasif veya kararsız olabilirler. Hayatın akışına güvenmek onların ana felsefesidir." },
        4: { name: "Tahta", desc: "Tahta elementi, büyümeyi, yaratıcılığı ve yenilikçiliği temsil eder. Bu elemente sahip olanlar, her zaman ileriye bakarlar ve sürekli kendilerini geliştirmek isterler. Cömert ve yardımsever bir yapıları vardır; başkalarının potansiyelini keşfetmesine yardımcı olmayı severler. Ancak bazen fazla hırslı ve öfkeli olabilirler. Doğayla iç içe olmak ve üretmek ruhlarını besler." },
        5: { name: "Tahta", desc: "Tahta elementi, büyümeyi, yaratıcılığı ve yenilikçiliği temsil eder. Bu elemente sahip olanlar, her zaman ileriye bakarlar ve sürekli kendilerini geliştirmek isterler. Cömert ve yardımsever bir yapıları vardır; başkalarının potansiyelini keşfetmesine yardımcı olmayı severler. Ancak bazen fazla hırslı ve öfkeli olabilirler. Doğayla iç içe olmak ve üretmek ruhlarını besler." },
        6: { name: "Ateş", desc: "Ateş elementi, tutkuyu, dinamizmi ve liderlik gücünü simgeler. Bu kişiler inanılmaz bir enerjiye sahiptirler ve çevrelerine ışık saçarlar. Maceracı ruhları onları her zaman aksiyonun merkezine iter. Sosyal becerileri çok yüksektir ve insanları peşlerinden sürükleyebilirler. Ancak sabırsızlık ve dürtüsellik en büyük zorluklarıdır. Hayatı dolu dolu ve büyük bir heyecanla yaşarlar." },
        7: { name: "Ateş", desc: "Ateş elementi, tutkuyu, dinamizmi ve liderlik gücünü simgeler. Bu kişiler inanılmaz bir enerjiye sahiptirler ve çevrelerine ışık saçarlar. Maceracı ruhları onları her zaman aksiyonun merkezine iter. Sosyal becerileri çok yüksektir ve insanları peşlerinden sürükleyebilirler. Ancak sabırsızlık ve dürtüsellik en büyük zorluklarıdır. Hayatı dolu dolu ve büyük bir heyecanla yaşarlar." },
        8: { name: "Toprak", desc: "Toprak elementi, istikrarı, güvenilirliği ve pratikliği temsil eder. Bu elemente sahip olanlar, ayakları yere sağlam basan ve sorumluluk sahibi bireylerdir. Sabırları sayesinde en zorlu süreçleri başarıyla yönetirler. Analitik zekaları gelişmiştir ve her adımı planlı atarlar. Ancak bazen fazla muhafazakar ve değişime kapalı olabilirler. Onlar için en büyük başarı, güvenli ve bereketli bir temel inşa etmektir." },
        9: { name: "Toprak", desc: "Toprak elementi, istikrarı, güvenilirliği ve pratikliği temsil eder. Bu elemente sahip olanlar, ayakları yere sağlam basan ve sorumluluk sahibi bireylerdir. Sabırları sayesinde en zorlu süreçleri başarıyla yönetirler. Analitik zekaları gelişmiştir ve her adımı planlı atarlar. Ancak bazen fazla muhafazakar ve değişime kapalı olabilirler. Onlar için en büyük başarı, güvenli ve bereketli bir temel inşa etmektir." }
    };

    const res = elementler[lastDigit];
    document.getElementById('hc-cine-val').innerText = res.name;
    document.getElementById('hc-cine-desc').innerText = res.desc;
    document.getElementById('hc-cine-result').classList.add('visible');
}
