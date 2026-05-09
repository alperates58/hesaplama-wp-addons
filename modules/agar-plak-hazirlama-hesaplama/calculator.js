function hcAgarPlakHesapla() {
    const vol = parseFloat(document.getElementById('hc-agar-vol').value);
    const conc = parseFloat(document.getElementById('hc-agar-conc').value);

    if (isNaN(vol) || isNaN(conc) || vol <= 0 || conc <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const mass = (conc * vol) / 1000;
    
    const resultValue = document.getElementById('hc-agar-value');
    resultValue.innerText = mass.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' g';
    
    document.getElementById('hc-agar-note').innerText = `${vol} mL çözelti hazırlamak için ${mass.toLocaleString('tr-TR')} gram toz tartmanız gerekmektedir.`;
    document.getElementById('hc-agar-result').classList.add('visible');
}
