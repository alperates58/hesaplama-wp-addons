function hcMangalMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-bpp-count').value);
    const gramsPerPerson = parseFloat(document.getElementById('hc-bpp-intensity').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalMeatGrams = count * gramsPerPerson;
    const coalKg = Math.ceil(totalMeatGrams / 2000); // 1kg coal per 2kg meat approx
    const breadCount = Math.ceil(count * 0.5); // Half loaf per person

    const resultDiv = document.getElementById('hc-bbq-per-person-result');
    document.getElementById('hc-bpp-res-meat').innerText = (totalMeatGrams / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    document.getElementById('hc-bpp-res-coal').innerText = coalKg + ' kg';
    document.getElementById('hc-bpp-res-bread').innerText = breadCount + ' Adet';
    
    resultDiv.classList.add('visible');
}
