function hcStressConcHesapla() {
    const sMax = parseFloat(document.getElementById('hc-sc-max').value);
    const sNom = parseFloat(document.getElementById('hc-sc-nom').value);

    if (isNaN(sMax) || isNaN(sNom) || sNom <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Kt = sMax / sNom
    const kt = sMax / sNom;

    document.getElementById('hc-sc-res-val').innerText = kt.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-sc-result').classList.add('visible');
}
