function hcHucreSayisiHesapla() {
    const conc = parseFloat(document.getElementById('hc-cell-conc').value);
    const vol = parseFloat(document.getElementById('hc-cell-vol').value);

    if (isNaN(conc) || isNaN(vol) || conc < 0 || vol < 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const total = conc * vol;

    document.getElementById('hc-cell-count-val').innerText = total.toLocaleString('tr-TR') + ' hücre';
    
    if (total > 1000000) {
        document.getElementById('hc-cell-count-val').innerText += ` (${total.toExponential(2)})`;
    }

    document.getElementById('hc-cell-count-result').classList.add('visible');
}
