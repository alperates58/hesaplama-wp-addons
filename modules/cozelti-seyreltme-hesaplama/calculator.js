function hcCozeltiSeyreltHesapla() {
    const c1 = parseFloat(document.getElementById('hc-cs-c1').value);
    const c2 = parseFloat(document.getElementById('hc-cs-c2').value);
    const v2 = parseFloat(document.getElementById('hc-cs-v2').value);

    if (isNaN(c1) || isNaN(c2) || isNaN(v2)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (c2 >= c1) {
        alert('Hedef derişim stok derişimden küçük olmalıdır.');
        return;
    }

    // V1 = (C2 * V2) / C1
    const v1 = (c2 * v2) / c1;
    const solvent = v2 - v1;

    document.getElementById('hc-cs-v1').innerText = v1.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' ml';
    document.getElementById('hc-cs-solvent').innerText = solvent.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' ml';
    
    document.getElementById('hc-cs-result').classList.add('visible');
}
