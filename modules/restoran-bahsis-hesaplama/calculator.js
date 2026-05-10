function hcTipHesapla() {
    const bill = parseFloat(document.getElementById('hc-tip-bill').value);
    const pct = parseFloat(document.getElementById('hc-tip-pct').value);
    const split = parseInt(document.getElementById('hc-tip-split').value);

    if (isNaN(bill) || bill <= 0) {
        alert('Lütfen hesap tutarını giriniz.');
        return;
    }

    const tipTotal = bill * (pct / 100);
    const totalWithTip = bill + tipTotal;
    const perPerson = totalWithTip / split;

    document.getElementById('hc-tip-val').innerText = tipTotal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ₺';
    
    let infoText = `Bahşişli Toplam: ${totalWithTip.toLocaleString('tr-TR', {maximumFractionDigits:2})} ₺.`;
    if (split > 1) {
        infoText += ` Kişi başı düşen: ${perPerson.toLocaleString('tr-TR', {maximumFractionDigits:2})} ₺.`;
    }
    
    document.getElementById('hc-tip-total-info').innerText = infoText;
    document.getElementById('hc-tip-result').classList.add('visible');
}
