function hcBalikMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-fpp-count').value);
    const perPerson = parseFloat(document.getElementById('hc-fpp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;
    const totalKg = totalGrams / 1000;

    const resultDiv = document.getElementById('hc-fish-per-person-result');
    document.getElementById('hc-fpp-res-val').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    
    resultDiv.classList.add('visible');
}
