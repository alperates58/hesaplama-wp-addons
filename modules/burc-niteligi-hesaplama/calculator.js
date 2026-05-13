function hcBurcNiteligiHesapla() {
    const sign = document.getElementById('hc-bn-sign').value;
    
    const qualities = {
        "koc": "Öncü",
        "boga": "Sabit",
        "ikizler": "Değişken",
        "yengec": "Öncü",
        "aslan": "Sabit",
        "basak": "Değişken",
        "terazi": "Öncü",
        "akrep": "Sabit",
        "yay": "Değişken",
        "oglak": "Öncü",
        "kova": "Sabit",
        "balik": "Değişken"
    };

    const qualityName = qualities[sign];
    let description = "";

    if (qualityName === "Öncü") {
        description = `
            <p><strong>Öncü Nitelik (Cardinal):</strong> Mevsimleri başlatan burçlardır. Koç (İlkbahar), Yengeç (Yaz), Terazi (Sonbahar) ve Oğlak (Kış). Sizin hayata yaklaşımınız 'başlatmak' üzerinedir.</p>
            <p><strong>Karakteristik Özellikler:</strong> Öncü burçlar enerjik, girişken ve hırslıdırlar. Bir şeyleri başlatmak, harekete geçmek ve liderlik etmek sizin doğanızda var. Siz bir "ateşleyici"siniz. Durumlara müdahale etmekten ve yön vermekten çekinmezsiniz. Ancak başladığınız işleri bitirmek konusunda bazen desteğe ihtiyaç duyabilirsiniz çünkü zihniniz her zaman bir sonraki büyük projeye odaklıdır.</p>
            <p><strong>Hayat Tarzınız:</strong> Statüko size göre değildir. Her zaman bir yenilik, bir ilerleme ararsınız. 2026 yılında Satürn'ün Koç burcuna geçişi, özellikle Öncü nitelikteki burçlar için büyük bir sorumluluk ve somut başarı dönemi başlatacaktır. Bu dönemde ektiğiniz tohumların meyvelerini toplamak için gereken disiplini göstereceksiniz.</p>
        `;
    } else if (qualityName === "Sabit") {
        description = `
            <p><strong>Sabit Nitelik (Fixed):</strong> Mevsimlerin tam ortasına denk gelen burçlardır. Boğa, Aslan, Akrep ve Kova. Sizin hayata yaklaşımınız 'sürdürmek' ve 'derinleşmek' üzerinedir.</p>
            <p><strong>Karakteristik Özellikler:</strong> Sabit burçlar kararlı, dayanıklı ve sarsılmazdırlar. Bir işe başladığınızda onu en ince ayrıntısına kadar tamamlamadan bırakmazsınız. Güvenilirlik sizin en büyük markanızdır. Ancak bu kararlılık bazen aşırı inadına ve değişime direnç göstermeye neden olabilir. Sizin için "bırakmak" öğrenilmesi gereken en büyük derstir.</p>
            <p><strong>Hayat Tarzınız:</strong> Siz kurulu düzenin koruyucusu, değerlerin savunucusu ve projelerin bitiricisisiniz. 2026 yılındaki Uranüs ve Plüton etkileşimleri, Sabit burçlar için "esneme" ve "dönüşüm" temasını ön plana çıkarıyor. Konfor alanınızdan çıkmak size başta korkutucu gelse de, bu değişim ruhunuzun en büyük ihtiyacı olabilir.</p>
        `;
    } else {
        description = `
            <p><strong>Değişken Nitelik (Mutable):</strong> Mevsimlerin bitişine ve geçiş dönemlerine denk gelen burçlardır. İkizler, Başak, Yay ve Balık. Sizin hayata yaklaşımınız 'uyum sağlamak' ve 'esnemek' üzerinedir.</p>
            <p><strong>Karakteristik Özellikler:</strong> Değişken burçlar esnek, çok yönlü ve uyumludur. Her türlü duruma ve insana kolayca adapte olabilirsiniz. Zihniniz sürekli bilgi toplar ve bu bilgileri sentezleyerek yeni bakış açıları geliştirirsiniz. Ancak bu esneklik bazen kararsızlığa, dağınıklığa ve odaklanma sorunlarına yol açabilir. Sınır çizmek ve bir merkezde kalmak sizin için önemlidir.</p>
            <p><strong>Hayat Tarzınız:</strong> Siz bir köprü vazifesi görürsünüz. İnsanları, fikirleri ve dönemleri birbirine bağlarsınız. 2026 yılındaki tutulma döngüleri, Değişken burçlar için hayatlarındaki fazla yüklerden kurtulma ve sadeleşme dönemi olacaktır. Artık daha odaklı ve seçici davranarak potansiyelinizi daha verimli kullanabileceksiniz.</p>
        `;
    }

    document.getElementById('hc-bn-value').innerText = qualityName;
    document.getElementById('hc-bn-desc').innerHTML = description;
    document.getElementById('hc-bn-result').classList.add('visible');
}
