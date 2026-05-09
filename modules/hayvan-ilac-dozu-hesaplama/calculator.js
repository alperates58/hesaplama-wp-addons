function hcHayvanDozHesapla() {
    const weight = parseFloat(document.getElementById('hc-dose-weight').value);
    const rate = parseFloat(document.getElementById('hc-dose-rate').value);
    const conc = parseFloat(document.getElementById('hc-dose-conc').value);

    if (isNaN(weight) || isNaN(rate) || isNaN(conc) || weight <= 0 || rate <= 0 || conc <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const totalMg = weight * rate;
    const totalMl = totalMg / conc;

    document.getElementById('hc-dose-val').innerText = totalMl.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mL';
    document.getElementById('hc-dose-note').innerText = `Toplam ${totalMg.toLocaleString('tr-TR')} mg etken madde verilmelidir.`;
    document.getElementById('hc-dose-result').classList.add('visible');
}
