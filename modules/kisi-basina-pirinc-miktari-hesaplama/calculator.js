function hcPirincMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-rpp-count').value);
    const perPerson = parseFloat(document.getElementById('hc-rpp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;

    const resultDiv = document.getElementById('hc-rice-per-person-result');
    if (totalGrams >= 1000) {
        document.getElementById('hc-rpp-res-val').innerText = (totalGrams / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    } else {
        document.getElementById('hc-rpp-res-val').innerText = totalGrams.toLocaleString('tr-TR') + ' g';
    }
    
    resultDiv.classList.add('visible');
}
