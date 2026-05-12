function hcMakarnaMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-ppp-count').value);
    const perPerson = parseFloat(document.getElementById('hc-ppp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;

    const resultDiv = document.getElementById('hc-pasta-per-person-result');
    if (totalGrams >= 1000) {
        document.getElementById('hc-ppp-res-val').innerText = (totalGrams / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    } else {
        document.getElementById('hc-ppp-res-val').innerText = totalGrams.toLocaleString('tr-TR') + ' g';
    }
    
    resultDiv.classList.add('visible');
}
