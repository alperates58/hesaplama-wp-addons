function hcPirincSuHassasHesapla() {
    const rice = parseFloat(document.getElementById('hc-rwp-rice').value);
    const ratio = parseFloat(document.getElementById('hc-rwp-type').value);

    if (!rice || rice <= 0) {
        alert('Lütfen pirinç ağırlığını giriniz.');
        return;
    }

    const water = rice * ratio;

    const resultDiv = document.getElementById('hc-rice-water-prec-result');
    document.getElementById('hc-rwp-res-val').innerText = Math.round(water).toLocaleString('tr-TR') + ' ml';
    
    resultDiv.classList.add('visible');
}
