function hcGramYemekKasigiHesapla() {
    const grams = parseFloat(document.getElementById('hc-grams-tbsp').value);
    const density = parseFloat(document.getElementById('hc-material-tbsp').value);

    if (isNaN(grams) || grams <= 0) {
        alert('Lütfen geçerli bir gram miktarı giriniz.');
        return;
    }

    const tbsp = grams / density;

    const resultDiv = document.getElementById('hc-g-to-tbsp-result');
    document.getElementById('hc-tbsp-val').innerText = tbsp.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Yemek Kaşığı';
    document.getElementById('hc-tbsp-info').innerText = 'Not: Kaşık ölçüleri malzemenin yoğunluğuna ve kaşığın ne kadar dolu (silme/tepeleme) olduğuna göre değişebilir.';
    
    resultDiv.classList.add('visible');
}
