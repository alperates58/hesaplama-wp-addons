function hcPopcornHesapla() {
    const count = parseInt(document.getElementById('hc-pm-count').value);
    const gramsPerPerson = parseFloat(document.getElementById('hc-pm-size').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * gramsPerPerson;

    const resultDiv = document.getElementById('hc-popcorn-result');
    document.getElementById('hc-pm-res-val').innerText = totalGrams.toLocaleString('tr-TR') + ' g (~' + (totalGrams / 150).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Bardak)';
    
    resultDiv.classList.add('visible');
}
