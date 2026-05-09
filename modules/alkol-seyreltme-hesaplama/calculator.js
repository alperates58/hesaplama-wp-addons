function hcAlkolHesapla() {
    const v1 = parseFloat(document.getElementById('hc-as-v1').value);
    const c1 = parseFloat(document.getElementById('hc-as-c1').value);
    const c2 = parseFloat(document.getElementById('hc-as-c2').value);

    if (isNaN(v1) || isNaN(c1) || isNaN(c2)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (c2 >= c1) {
        alert('Hedef derece mevcut dereceden küçük olmalıdır.');
        return;
    }

    // V2 = (V1 * C1) / C2
    const v2 = (v1 * c1) / c2;
    const water = v2 - v1;

    document.getElementById('hc-as-water').innerText = water.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ml';
    document.getElementById('hc-as-total').innerText = v2.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ml';
    
    document.getElementById('hc-as-result').classList.add('visible');
}
