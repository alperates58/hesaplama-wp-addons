function hcEnzimSeyreltmeHesapla() {
    const c1 = parseFloat(document.getElementById('hc-enz-c1').value);
    const c2 = parseFloat(document.getElementById('hc-enz-c2').value);
    const v2 = parseFloat(document.getElementById('hc-enz-v2').value);

    if (isNaN(c1) || isNaN(c2) || isNaN(v2) || c1 <= 0 || c2 <= 0 || v2 <= 0 || c2 > c1) {
        alert('Lütfen geçerli değerler giriniz (Hedef stoktan küçük olmalıdır).');
        return;
    }

    const v1 = (c2 * v2) / c1;
    const buffer = v2 - v1;

    document.getElementById('hc-enz-v1').innerText = v1.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' µL';
    document.getElementById('hc-enz-buffer').innerText = buffer.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' µL';
    
    document.getElementById('hc-enz-dil-result').classList.add('visible');
}
