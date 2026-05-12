function hcTavukMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-tpp-count').value);
    const perPerson = parseFloat(document.getElementById('hc-tpp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;

    const resultDiv = document.getElementById('hc-chicken-per-person-result');
    if (totalGrams >= 1000) {
        document.getElementById('hc-tpp-res-val').innerText = (totalGrams / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    } else {
        document.getElementById('hc-tpp-res-val').innerText = totalGrams.toLocaleString('tr-TR') + ' g';
    }
    
    resultDiv.classList.add('visible');
}
