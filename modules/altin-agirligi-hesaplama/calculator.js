function hcAltinAgirligiHesapla() {
    const ayar = parseInt(document.getElementById('hc-gold-ayar').value);
    const hacim = parseFloat(document.getElementById('hc-gold-hacim').value);

    if (!hacim) {
        alert('Lütfen hacim değerini giriniz.');
        return;
    }

    // Yaklaşık yoğunluk değerleri (g/cm3)
    const yogunluklar = {
        24: 19.32,
        22: 17.50,
        18: 15.50,
        14: 13.00,
        8: 10.50
    };

    const yogunluk = yogunluklar[ayar];
    const toplamGram = hacim * yogunluk;
    
    // Saf altın oranı = Ayar / 24
    const safGram = toplamGram * (ayar / 24);

    const sonucDiv = document.getElementById('hc-gold-result');
    document.getElementById('hc-gold-res-gram').innerText = toplamGram.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' g';
    document.getElementById('hc-gold-res-pure').innerText = safGram.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' g (Has)';
    
    const noteDiv = document.getElementById('hc-gold-res-note');
    noteDiv.innerText = `${ayar} ayar altının yaklaşık yoğunluğu ${yogunluk} g/cm³ olarak alınmıştır. Gerçek değer alaşımdaki diğer metallere göre küçük farklılıklar gösterebilir.`;

    sonucDiv.classList.add('visible');
}
