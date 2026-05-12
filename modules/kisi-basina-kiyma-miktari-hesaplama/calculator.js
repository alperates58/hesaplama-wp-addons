function hcKiymaMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-kpp-count').value);
    const perPerson = parseFloat(document.getElementById('hc-kpp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;

    const resultDiv = document.getElementById('hc-mince-per-person-result');
    if (totalGrams >= 1000) {
        document.getElementById('hc-kpp-res-val').innerText = (totalGrams / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    } else {
        document.getElementById('hc-kpp-res-val').innerText = totalGrams.toLocaleString('tr-TR') + ' g';
    }
    
    resultDiv.classList.add('visible');
}
