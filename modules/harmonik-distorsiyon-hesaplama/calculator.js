function hcThdHesapla() {
    const v1 = parseFloat(document.getElementById('hc-thd-v1').value);
    const v2 = parseFloat(document.getElementById('hc-thd-v2').value) || 0;
    const v3 = parseFloat(document.getElementById('hc-thd-v3').value) || 0;
    const v4 = parseFloat(document.getElementById('hc-thd-v4').value) || 0;
    const v5 = parseFloat(document.getElementById('hc-thd-v5').value) || 0;

    if (isNaN(v1) || v1 <= 0) {
        alert('Lütfen temel bileşen değerini girin.');
        return;
    }

    // THD = sqrt(v2^2 + v3^2 + v4^2 + v5^2) / v1
    const sumSquares = Math.pow(v2, 2) + Math.pow(v3, 2) + Math.pow(v4, 2) + Math.pow(v5, 2);
    const thd = (Math.sqrt(sumSquares) / v1) * 100;

    document.getElementById('hc-thd-res-val').innerText = '%' + thd.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-thd-result').classList.add('visible');
}
