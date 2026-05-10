function hcGramYemekKasigiHesapla() {
    const grams = parseFloat(document.getElementById('hc-tb-grams').value);
    const density = parseFloat(document.getElementById('hc-tb-material').value);

    if (isNaN(grams) || grams <= 0) {
        alert('Lütfen geçerli bir gram miktarı giriniz.');
        return;
    }

    // 1 yemek kaşığı yaklaşık 15ml'dir. 
    // Gram üzerinden yaklaşık değerler density select box'ında tanımlı.
    const tbsp = grams / density;

    document.getElementById('hc-tbsp-val').innerText = tbsp.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Yemek Kaşığı';
    document.getElementById('hc-tbsp-info').innerText = 'Not: Kaşığın doluluk oranı (silme/tepeleme) sonuca etki eder.';
    document.getElementById('hc-g-to-tbsp-result').classList.add('visible');
}
