function hcInverseHesapla() {
    const val = parseFloat(document.getElementById('hc-i-val').value);

    if (isNaN(val)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const addInv = -val;
    const mulInv = val === 0 ? 'Tanımsız' : (1 / val);

    document.getElementById('hc-i-res-add').innerText = addInv.toLocaleString('tr-TR');
    document.getElementById('hc-i-res-mul').innerText = typeof mulInv === 'string' ? mulInv : mulInv.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-tersini-alma-result').classList.add('visible');
}
