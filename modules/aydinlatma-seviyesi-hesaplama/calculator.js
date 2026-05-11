function hcAydinlatmaHesapla() {
    const lumen = parseFloat(document.getElementById('hc-ayd-lumen').value);
    const adet = parseFloat(document.getElementById('hc-ayd-adet').value);
    const alan = parseFloat(document.getElementById('hc-ayd-alan').value);
    const uf = parseFloat(document.getElementById('hc-ayd-uf').value);
    const mf = parseFloat(document.getElementById('hc-ayd-mf').value);

    if (isNaN(lumen) || isNaN(adet) || isNaN(alan) || alan <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // E = (Phi * n * UF * MF) / A
    const lux = (lumen * adet * uf * mf) / alan;

    document.getElementById('hc-ayd-res-lux').innerText = Math.round(lux).toLocaleString('tr-TR') + ' Lux';
    
    document.getElementById('hc-ayd-result').classList.add('visible');
}
