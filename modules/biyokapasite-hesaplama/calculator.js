function hcBiyokapasiteHesapla() {
    const type = document.getElementById('hc-bio-land-type').value;
    const area = parseFloat(document.getElementById('hc-bio-area').value);

    if (isNaN(area) || area <= 0) {
        alert('Lütfen geçerli bir alan giriniz.');
        return;
    }

    // Biyokapasite (gha) = Alan * Verim Faktörü * Eşdeğerlik Faktörü
    // 2026 Global Footprint Network standartları baz alınmıştır.
    
    // Eşdeğerlik Faktörleri (EQF)
    const eqf = {
        cropland: 2.51,
        grazing: 0.46,
        forest: 1.26,
        fishing: 0.37
    };

    // Türkiye için ortalama Verim Faktörleri (YF) - Tahmini
    const yf = 1.1; 

    const biocap = area * yf * eqf[type];

    document.getElementById('hc-res-biocap').innerText = biocap.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' gha';
    
    document.getElementById('hc-biyokapasite-result').classList.add('visible');
}
