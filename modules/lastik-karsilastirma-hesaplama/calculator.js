function hcTc2Hesapla() {
    const getDia = (w, r, d) => (w * r / 50) + (d * 25.4);
    
    const d1 = getDia(
        parseFloat(document.getElementById('hc-tc2-w1').value),
        parseFloat(document.getElementById('hc-tc2-r1').value),
        parseFloat(document.getElementById('hc-tc2-d1').value)
    );
    const d2 = getDia(
        parseFloat(document.getElementById('hc-tc2-w2').value),
        parseFloat(document.getElementById('hc-tc2-r2').value),
        parseFloat(document.getElementById('hc-tc2-d2').value)
    );

    if (isNaN(d1) || isNaN(d2)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    var severity = Math.abs(diff) > 3 ? 'danger' : 'success';
    var desc = Math.abs(diff) > 3 
        ? 'Lastik çap farkı %3 limitinin üzerindedir. Bu durum araçta şanzıman, ABS, ESP ve hız göstergesi hatalarına yol açabileceğinden tavsiye edilmez.' 
        : 'Lastik çap farkı yasal sınırlar (%3) dahilindedir. Güvenle kullanabilirsiniz.';

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('lastik-karsilastirma-hesaplama', {
        primaryResult: (diff > 0 ? '+' : '') + diff.toFixed(2) + '%',
        shortSummary: 'Lastik çap kıyaslama sonucu.',
        interpretation: desc,
        referenceTable: {
            headers: ['Ölçüm', 'Eski Lastik', 'Yeni Lastik', 'Fark / Değişim'],
            rows: [
                ['Çap Değeri', d1.toFixed(1) + ' mm', d2.toFixed(1) + ' mm', (d2 - d1).toFixed(1) + ' mm'],
                ['Yüzdesel Çap Değişimi', '100%', '100%', (diff > 0 ? '+' : '') + diff.toFixed(2) + '%']
            ]
        },
        formula: {
            raw: 'Çap = (Genişlik * YanakOranı / 50) + (Jant * 25.4)',
            text: 'Lastik yanağının iki katı ile jant çapının milimetre cinsinden toplamı alınarak lastik dış çapı hesaplanır.'
        },
        source: {
            name: 'Uluslararası Lastik Ebat Standartları (ETRTO)',
            url: 'https://www.etrto.org'
        },
        nextActions: [
            'Eğer çap farkı %3ten büyükse orijinal lastik ebadına sadık kalın.',
            'Yeni lastik takıldığında hız göstergesindeki sapma oranını göz önünde bulundurun.'
        ],
        faq: [
            { question: "Lastik değişiminde maksimum çap farkı ne olmalıdır?", answer: "Emniyet standartları gereği yeni ebat ile eski ebat arasındaki çap farkı en fazla +%3 veya -%3 olmalıdır." },
            { question: "Lastik çapı değiştiğinde hız göstergesi nasıl etkilenir?", answer: "Çap büyüdüğünde hız göstergesi gerçek hızdan daha yavaş bir hız değeri gösterecektir." }
        ],
        metadata: {
            severity: severity,
            status: 'success',
            lastUpdated: '2026-07-06',
            badges: ['Otomotiv & Trafik', 'Güvenlik Standardı']
        }
    })) {
        return;
    }

    document.getElementById('hc-tc2-val').innerText = diff.toFixed(2) + "%";
    document.getElementById('hc-tc2-result').classList.add('visible');
}
