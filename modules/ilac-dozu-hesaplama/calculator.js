function hcDrugDoseHesapla() {
    const weight = parseFloat(document.getElementById('hc-dd-weight').value);
    const unitDose = parseFloat(document.getElementById('hc-dd-unit').value);
    const conc = parseFloat(document.getElementById('hc-dd-conc').value);

    if (isNaN(weight) || isNaN(unitDose) || weight <= 0 || unitDose <= 0) {
        alert('Lütfen geçerli kilo ve doz değerleri girin.');
        return;
    }

    const totalMg = weight * unitDose;
    document.getElementById('hc-dd-res-val').innerText = totalMg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mg';
    
    if (!isNaN(conc) && conc > 0) {
        const totalMl = totalMg / conc;
        document.getElementById('hc-dd-res-vol').innerText = 'Gerekli Hacim: ' + totalMl.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ml';
    } else {
        document.getElementById('hc-dd-res-vol').innerText = "";
    }
    
    document.getElementById('hc-dd-result').classList.add('visible');
}
