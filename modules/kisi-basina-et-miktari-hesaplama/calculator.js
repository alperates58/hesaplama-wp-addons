function hcEtMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-mpp-count').value);
    const perPerson = parseFloat(document.getElementById('hc-mpp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;
    const totalKg = totalGrams / 1000;

    const resultDiv = document.getElementById('hc-meat-per-person-result');
    document.getElementById('hc-mpp-res-val').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    
    resultDiv.classList.add('visible');
}
