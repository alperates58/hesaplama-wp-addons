function hcMercimekMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-lpp-count').value);
    const perPerson = parseFloat(document.getElementById('hc-lpp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;

    const resultDiv = document.getElementById('hc-lentil-per-person-result');
    if (totalGrams >= 1000) {
        document.getElementById('hc-lpp-res-val').innerText = (totalGrams / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    } else {
        document.getElementById('hc-lpp-res-val').innerText = totalGrams.toLocaleString('tr-TR') + ' g';
    }
    
    resultDiv.classList.add('visible');
}
