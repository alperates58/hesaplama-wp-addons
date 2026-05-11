function hcSafetyStockHesapla() {
    const sigma = parseFloat(document.getElementById('hc-ss-sigma').value);
    const lt = parseFloat(document.getElementById('hc-ss-lt').value);
    const z = parseFloat(document.getElementById('hc-ss-service').value);

    if (isNaN(sigma) || isNaN(lt) || sigma < 0 || lt <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // SS = Z * sigma * sqrt(LT)
    const safetyStock = z * sigma * Math.sqrt(lt);

    document.getElementById('hc-ss-res-val').innerText = Math.ceil(safetyStock).toLocaleString('tr-TR') + ' Adet';
    
    document.getElementById('hc-ss-result').classList.add('visible');
}
