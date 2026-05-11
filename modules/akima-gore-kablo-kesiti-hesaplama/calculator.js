function hcAkimaGoreKabloKesitiHesapla() {
    const akim = parseFloat(document.getElementById('hc-ak-akim').value);
    const tesisat = document.getElementById('hc-ak-tesisat').value;
    const faz = parseInt(document.getElementById('hc-ak-faz').value);

    if (!akim) {
        alert('Lütfen akım değerini giriniz.');
        return;
    }

    // Basitleştirilmiş IEC 60364 Tablosu (Bakır iletken, PVC izole)
    // Format: { kesit: akim_kapasitesi }
    const tablo = {
        'boruda': [
            {s: 0.75, i: 6},
            {s: 1, i: 10},
            {s: 1.5, i: 14},
            {s: 2.5, i: 19},
            {s: 4, i: 26},
            {s: 6, i: 33},
            {s: 10, i: 46},
            {s: 16, i: 61},
            {s: 25, i: 80},
            {s: 35, i: 99},
            {s: 50, i: 119}
        ],
        'havada': [
            {s: 0.75, i: 12},
            {s: 1, i: 15},
            {s: 1.5, i: 19.5},
            {s: 2.5, i: 27},
            {s: 4, i: 36},
            {s: 6, i: 46},
            {s: 10, i: 63},
            {s: 16, i: 85},
            {s: 25, i: 112},
            {s: 35, i: 138},
            {s: 50, i: 168}
        ],
        'toprakta': [
            {s: 1.5, i: 26},
            {s: 2.5, i: 34},
            {s: 4, i: 44},
            {s: 6, i: 56},
            {s: 10, i: 75},
            {s: 16, i: 98},
            {s: 25, i: 128},
            {s: 35, i: 154},
            {s: 50, i: 185}
        ]
    };

    let data = tablo[tesisat];
    
    // Trifaze (3-damarlı) ise kapasite %10-15 civarı azalabilir (basitleştirilmiş katsayı)
    const katsayi = (faz === 3) ? 0.85 : 1.0;
    
    let uygunKesit = data.find(item => (item.i * katsayi) >= akim);

    const sonucDiv = document.getElementById('hc-akim-kesit-result');
    const valDiv = document.getElementById('hc-ak-res-val');
    const noteDiv = document.getElementById('hc-ak-res-note');

    if (uygunKesit) {
        valDiv.innerText = uygunKesit.s.toLocaleString('tr-TR') + ' mm²';
        noteDiv.innerText = `${tesisat === 'boruda' ? 'Boruda' : tesisat === 'havada' ? 'Havada' : 'Toprakta'} tesisat için IEC 60364 standartları baz alınmıştır. Belirtilen kesitin akım taşıma kapasitesi: ${(uygunKesit.i * katsayi).toFixed(1)} A.`;
    } else {
        valDiv.innerText = 'Çok Yüksek';
        noteDiv.innerText = 'Girdiğiniz akım değeri için özel büyük kesitli enerji kabloları veya paralel kablolama gereklidir. Lütfen bir elektrik mühendisine danışın.';
    }

    sonucDiv.classList.add('visible');
}
