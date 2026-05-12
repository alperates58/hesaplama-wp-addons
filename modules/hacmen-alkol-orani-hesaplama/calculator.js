function hcABVHesapla() {
    const og = parseFloat(document.getElementById('hc-og').value);
    const fg = parseFloat(document.getElementById('hc-fg').value);

    if (!og || !fg || og < fg) {
        alert('Lütfen geçerli yoğunluk değerleri giriniz. İlk yoğunluk son yoğunluktan büyük olmalıdır.');
        return;
    }

    // Standard ABV Formula
    const abv = (og - fg) * 131.25;
    
    // Attenuation formula
    const attenuation = ((og - fg) / (og - 1)) * 100;

    const resultDiv = document.getElementById('hc-abv-result');
    document.getElementById('hc-abv-val').innerText = '%' + abv.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-abv-att').innerText = '%' + attenuation.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    
    resultDiv.classList.add('visible');
}
