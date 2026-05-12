function hcKahveSuOraniHesapla() {
    const coffee = parseFloat(document.getElementById('hc-csw-coffee').value);
    const ratio = parseFloat(document.getElementById('hc-csw-ratio').value);

    if (!coffee || !ratio || coffee <= 0 || ratio <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const water = coffee * ratio;

    const resultDiv = document.getElementById('hc-coffee-water-result');
    document.getElementById('hc-csw-res-val').innerText = Math.round(water).toLocaleString('tr-TR') + ' ml';
    
    resultDiv.classList.add('visible');
}
