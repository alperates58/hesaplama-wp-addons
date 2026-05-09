function hcHucreSeyreltmeHesapla() {
    const c1 = parseFloat(document.getElementById('hc-cs-c1').value);
    const c2 = parseFloat(document.getElementById('hc-cs-c2').value);
    const v2 = parseFloat(document.getElementById('hc-cs-v2').value);

    if (isNaN(c1) || isNaN(c2) || isNaN(v2) || c1 <= 0 || c2 <= 0 || v2 <= 0 || c2 > c1) {
        alert('Lütfen geçerli değerler giriniz (Hedef stoktan küçük olmalıdır).');
        return;
    }

    const v1 = (c2 * v2) / c1;
    const media = v2 - v1;

    document.getElementById('hc-cs-v1').innerText = v1.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' mL';
    document.getElementById('hc-cs-med').innerText = media.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' mL';
    
    document.getElementById('hc-cs-result').classList.add('visible');
}
