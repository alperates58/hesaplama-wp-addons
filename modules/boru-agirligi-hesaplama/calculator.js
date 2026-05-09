function hcBAHesapla() {
    const density = parseFloat(document.getElementById('hc-ba-mat').value);
    const od = parseFloat(document.getElementById('hc-ba-od').value);
    const wt = parseFloat(document.getElementById('hc-ba-wt').value);
    const len = parseFloat(document.getElementById('hc-ba-len').value);

    if (isNaN(od) || isNaN(wt) || isNaN(len) || od <= 0 || wt <= 0 || len <= 0 || wt >= od/2) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Weight = pi * (OD - WT) * WT * Density * L
    // OD, WT in mm -> convert to cm for g/cm3 density
    // len in m -> convert to cm
    const weightG = Math.PI * (od - wt) * wt * density * (len * 100) / 1000;
    const weightKg = weightG; // Because (mm * mm * cm) / 1000 with g/cm3 works out to kg if we are careful.
    // Let's re-calculate in cm:
    // Vol cm3 = pi * ( (od/10) - (wt/10) ) * (wt/10) * (len * 100)
    const weightKgCorrect = (Math.PI * (od/10 - wt/10) * (wt/10) * (len * 100) * density) / 1000;

    document.getElementById('hc-ba-val').innerText = weightKgCorrect.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg';
    document.getElementById('hc-ba-result').classList.add('visible');
}
