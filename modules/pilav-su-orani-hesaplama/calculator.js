function hcPilavSuHesapla() {
    const rice = parseFloat(document.getElementById('hc-rw-rice').value);
    const ratio = parseFloat(document.getElementById('hc-rw-type').value);

    if (!rice || rice <= 0) {
        alert('Lütfen pirinç miktarını giriniz.');
        return;
    }

    const water = rice * ratio;

    const resultDiv = document.getElementById('hc-rice-water-result');
    document.getElementById('hc-rw-res-val').innerText = water.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Bardak';
    
    resultDiv.classList.add('visible');
}
