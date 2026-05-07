function hcStandartIckiHesapla() {
    const tip = document.getElementById('hc-sim-tip').value;
    const adet = parseFloat(document.getElementById('hc-sim-adet').value) || 0;
    
    let ml = 0;
    let oran = 0;

    switch(tip) {
        case 'bira': ml = 330; oran = 5; break;
        case 'bira50': ml = 500; oran = 5; break;
        case 'sarap': ml = 150; oran = 12; break;
        case 'sert': ml = 45; oran = 40; break;
        case 'ozel':
            ml = parseFloat(document.getElementById('hc-sim-hacim').value);
            oran = parseFloat(document.getElementById('hc-sim-oran').value);
            break;
    }

    if (isNaN(ml) || isNaN(oran)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Saf alkol gram = ml * (oran/100) * 0.789 (ethanol density)
    // 1 standart icki = 10g saf alkol (WHO)
    const safAlkolGram = ml * (oran / 100) * 0.789;
    const standartIcki = (safAlkolGram * adet) / 10;

    document.getElementById('hc-sim-res-toplam').innerText = standartIcki.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Standart İçki';
    document.getElementById('hc-standart-icki-miktari-result').classList.add('visible');
}
