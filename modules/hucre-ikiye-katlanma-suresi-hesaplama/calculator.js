function hcDTHesapla() {
    const n0 = parseFloat(document.getElementById('hc-dt-n0').value);
    const nt = parseFloat(document.getElementById('hc-dt-nt').value);
    const time = parseFloat(document.getElementById('hc-dt-time').value);

    if (isNaN(n0) || isNaN(nt) || isNaN(time) || n0 <= 0 || nt <= n0 || time <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz (Son sayı başlangıç sayısından büyük olmalıdır).');
        return;
    }

    // DT = time * ln(2) / ln(nt / n0)
    const dt = (time * Math.log(2)) / Math.log(nt / n0);

    document.getElementById('hc-dt-val').innerText = dt.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' saat';
    document.getElementById('hc-dt-note').innerText = `Hücreleriniz her ${dt.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} saatte bir sayıca ikiye katlanmaktadır.`;
    document.getElementById('hc-dt-result').classList.add('visible');
}
