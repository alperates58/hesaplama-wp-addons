function hcBesiyeriHesapla() {
    const vol = parseFloat(document.getElementById('hc-by-vol').value);
    const conc = parseFloat(document.getElementById('hc-by-conc').value);

    if (isNaN(vol) || isNaN(conc) || vol <= 0 || conc <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const mass = (conc * vol) / 1000;
    
    document.getElementById('hc-by-val').innerText = mass.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' g';
    document.getElementById('hc-by-note').innerText = `${vol} mL besiyeri hazırlamak için ${mass.toLocaleString('tr-TR')} gram toz kullanmalısınız.`;
    document.getElementById('hc-by-result').classList.add('visible');
}
