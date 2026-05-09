function hcPow2Hesapla() {
    const exp = parseInt(document.getElementById('hc-p2-exp').value);

    if (isNaN(exp)) {
        alert('Lütfen bir üs değeri girin.');
        return;
    }

    const val = Math.pow(2, exp);
    
    document.getElementById('hc-res-p2-val').innerText = val.toLocaleString('tr-TR');
    
    // Additional info for bit enthusiasts
    let bitsStr = '';
    if (exp >= 0 && exp <= 64) {
        if (exp === 0) bitsStr = '1 bit';
        else if (exp === 10) bitsStr = '1024 (1 KB)';
        else if (exp === 20) bitsStr = '1 MB';
        else if (exp === 30) bitsStr = '1 GB';
        else bitsStr = (exp + 1) + ' bitlik adresleme';
    } else {
        bitsStr = '-';
    }
    document.getElementById('hc-res-p2-bits').innerText = bitsStr;

    document.getElementById('hc-p2-result').classList.add('visible');
}
