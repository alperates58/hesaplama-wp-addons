function hcFreeFloatHesapla() {
    const floatShares = parseFloat(document.getElementById('hc-ff-float').value) || 0;
    const totalShares = parseFloat(document.getElementById('hc-ff-total').value) || 0;

    if (totalShares === 0) {
        alert('Toplam hisse adedi sıfır olamaz.');
        return;
    }

    const ratio = (floatShares / totalShares) * 100;

    document.getElementById('hc-ff-res-val').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-freefloat-result').classList.add('visible');
}
