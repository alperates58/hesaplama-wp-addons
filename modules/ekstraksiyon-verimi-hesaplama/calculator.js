function hcExtYieldHesapla() {
    const total = parseFloat(document.getElementById('hc-ey-total').value);
    const yieldAmt = parseFloat(document.getElementById('hc-ey-yield').value);

    if (isNaN(total) || isNaN(yieldAmt) || total <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (yieldAmt > total) {
        alert('Elde edilen miktar toplam miktardan büyük olamaz.');
        return;
    }

    const yieldPerc = (yieldAmt / total) * 100;

    document.getElementById('hc-ey-res-val').innerText = '%' + yieldPerc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-ey-result').classList.add('visible');
}
