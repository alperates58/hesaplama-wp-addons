function hcGramCayKasigiHesapla() {
    const grams = parseFloat(document.getElementById('hc-grams').value);
    const density = parseFloat(document.getElementById('hc-material').value);

    if (isNaN(grams) || grams <= 0) {
        alert('Lütfen geçerli bir gram miktarı giriniz.');
        return;
    }

    // 1 çay kaşığı yaklaşık 5ml'dir. 
    // Gram / density = ml. ml / 5 = çay kaşığı
    const tsp = grams / density;

    document.getElementById('hc-tsp-val').innerText = tsp.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Çay Kaşığı';
    document.getElementById('hc-tsp-info').innerText = 'Not: Mutfak ölçüleri malzemenin yoğunluğuna ve kaşığın doluluk oranına göre değişebilir.';
    document.getElementById('hc-g-to-tsp-result').classList.add('visible');
}
