function hcPorosityHesapla() {
    const vv = parseFloat(document.getElementById('hc-po-vv').value);
    const vt = parseFloat(document.getElementById('hc-po-vt').value);

    if (isNaN(vv) || isNaN(vt) || vt <= 0) {
        alert('Lütfen geçerli hacim değerleri girin.');
        return;
    }

    if (vv > vt) {
        alert('Boşluk hacmi toplam hacimden büyük olamaz.');
        return;
    }

    // Porosity n = Vv / Vt
    const n = (vv / vt) * 100;
    
    // Void ratio e = Vv / Vs. Vs = Vt - Vv
    const vs = vt - vv;
    const e = vs > 0 ? (vv / vs) : 0;

    document.getElementById('hc-po-res-val').innerText = '%' + n.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-po-res-void').innerText = 'Boşluk Oranı (e = Vv/Vs): ' + e.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-po-result').classList.add('visible');
}
