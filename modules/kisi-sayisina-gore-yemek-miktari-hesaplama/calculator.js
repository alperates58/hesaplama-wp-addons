function hcGenelYemekHesapla() {
    const count = parseInt(document.getElementById('hc-mpp-count').value);
    const weightPerPerson = parseFloat(document.getElementById('hc-mpp-intensity').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalWeight = count * weightPerPerson;

    const resultDiv = document.getElementById('hc-meal-per-person-result');
    document.getElementById('hc-mpp-res-val').innerText = (totalWeight / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    
    resultDiv.classList.add('visible');
}
