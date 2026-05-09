function hcPow10Hesapla() {
    const exp = parseInt(document.getElementById('hc-p10-exp').value);

    if (isNaN(exp)) {
        alert('Lütfen bir üs değeri girin.');
        return;
    }

    const val = Math.pow(10, exp);
    
    // Format result
    let resultStr = '';
    if (Math.abs(exp) > 15) {
        resultStr = val.toExponential();
    } else {
        resultStr = val.toLocaleString('tr-TR', { maximumFractionDigits: 20 });
    }

    document.getElementById('hc-res-p10-val').innerText = resultStr;
    document.getElementById('hc-res-p10-sci').innerText = '10^' + exp;

    document.getElementById('hc-p10-result').classList.add('visible');
}
