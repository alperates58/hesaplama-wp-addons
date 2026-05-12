function hcGramCayKasigiHesapla() {
    const grams = parseFloat(document.getElementById('hc-grams').value);
    const density = parseFloat(document.getElementById('hc-material').value);

    if (isNaN(grams) || grams <= 0) {
        alert('Lütfen geçerli bir gram miktarı giriniz.');
        return;
    }

    // density is grams per tsp
    const tsp = grams / density;

    const resultDiv = document.getElementById('hc-g-to-tsp-result');
    document.getElementById('hc-tsp-val').innerText = tsp.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Çay Kaşığı';
    document.getElementById('hc-tsp-info').innerText = 'Not: Mutfak ölçüleri malzemenin yoğunluğuna ve kaşığın doluluk oranına göre (tepeleme/silme) değişebilir.';
    
    resultDiv.classList.add('visible');
}
