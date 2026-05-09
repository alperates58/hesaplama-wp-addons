function hcDNAMWHesapla() {
    const length = parseFloat(document.getElementById('hc-mw-length').value);
    const type = document.getElementById('hc-mw-type').value;

    if (isNaN(length) || length <= 0) {
        alert('Lütfen geçerli bir uzunluk giriniz.');
        return;
    }

    let mw = 0;
    if (type === 'double') {
        // (bp * 607.4) + 157.9
        mw = (length * 607.4) + 157.9;
    } else {
        // (nt * 303.7) + 79
        mw = (length * 303.7) + 79;
    }

    document.getElementById('hc-mw-val').innerText = mw.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Da';
    document.getElementById('hc-mw-result').classList.add('visible');
}
