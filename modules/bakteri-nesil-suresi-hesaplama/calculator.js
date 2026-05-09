function hcBakteriNesilHesapla() {
    const n0 = parseFloat(document.getElementById('hc-gen-n0').value);
    const nt = parseFloat(document.getElementById('hc-gen-nt').value);
    const time = parseFloat(document.getElementById('hc-gen-time').value);

    if (isNaN(n0) || isNaN(nt) || isNaN(time) || n0 <= 0 || nt <= n0 || time <= 0) {
        alert('Lütfen geçerli değerler giriniz (Son sayı başlangıç sayısından büyük olmalıdır).');
        return;
    }

    // n = 3.32 * log10(nt/n0)
    const n = 3.32 * Math.log10(nt / n0);
    const g = time / n;

    document.getElementById('hc-gen-n-val').innerText = n.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-gen-g-val').innerText = g.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dk';
    
    document.getElementById('hc-gen-result').classList.add('visible');
}
