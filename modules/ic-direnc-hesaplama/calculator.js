function hcIntResHesapla() {
    const voc = parseFloat(document.getElementById('hc-ir-voc').value);
    const vload = parseFloat(document.getElementById('hc-ir-vload').value);
    const i = parseFloat(document.getElementById('hc-ir-i').value);

    if (isNaN(voc) || isNaN(vload) || isNaN(i) || i <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (vload > voc) {
        alert('Yük altındaki gerilim, açık devre geriliminden büyük olamaz.');
        return;
    }

    // r = (Voc - Vload) / I
    const r = (voc - vload) / i;

    document.getElementById('hc-ir-res-val').innerText = r.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' Ω';
    
    document.getElementById('hc-ir-result').classList.add('visible');
}
