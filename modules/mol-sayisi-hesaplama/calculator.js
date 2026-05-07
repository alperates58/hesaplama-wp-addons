function hcMolSayisiHesapla() {
    const mass = parseFloat(document.getElementById('hc-mol-n-mass').value);
    const ma = parseFloat(document.getElementById('hc-mol-n-ma').value);

    if (isNaN(mass) || isNaN(ma) || mass <= 0 || ma <= 0) {
        alert('Lütfen geçerli kütle ve mol kütlesi değerleri giriniz.');
        return;
    }

    // n = m / MA
    const moles = mass / ma;

    document.getElementById('hc-res-mol-n-val').innerText = moles.toLocaleString('tr-TR', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 4 
    });

    document.getElementById('hc-mol-n-result').classList.add('visible');
    document.getElementById('hc-mol-n-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
