function hcDNASeyreltmeHesapla() {
    const c1 = parseFloat(document.getElementById('hc-ds-c1').value);
    const c2 = parseFloat(document.getElementById('hc-ds-c2').value);
    const v2 = parseFloat(document.getElementById('hc-ds-v2').value);

    if (isNaN(c1) || isNaN(c2) || isNaN(v2) || c1 <= 0 || c2 <= 0 || v2 <= 0 || c2 > c1) {
        alert('Lütfen geçerli değerler giriniz (Hedef konsantrasyon stoktan küçük olmalıdır).');
        return;
    }

    const v1 = (c2 * v2) / c1;
    const water = v2 - v1;

    document.getElementById('hc-ds-v1').innerText = v1.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' µL';
    document.getElementById('hc-ds-water').innerText = water.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' µL';
    
    document.getElementById('hc-ds-result').classList.add('visible');
}
