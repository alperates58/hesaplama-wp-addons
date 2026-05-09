function hcLog2Hesapla() {
    const x = parseFloat(document.getElementById('hc-l2-val').value);

    if (isNaN(x) || x <= 0) {
        alert('Lütfen 0\'dan büyük bir sayı girin.');
        return;
    }

    const val = Math.log2(x);
    
    document.getElementById('hc-res-l2-val').innerText = val.toLocaleString('tr-TR', { maximumFractionDigits: 10 });
    document.getElementById('hc-res-l2-floor').innerText = Math.floor(val);

    document.getElementById('hc-l2-result').classList.add('visible');
}
