function hcAvgPercentHesapla() {
    const input = document.getElementById('hc-ap-input').value;
    const percents = input.split(',').map(p => parseFloat(p.trim())).filter(p => !isNaN(p));

    if (percents.length === 0) {
        alert('Lütfen en az bir yüzde değeri giriniz.');
        return;
    }

    const sum = percents.reduce((a, b) => a + b, 0);
    const avg = sum / percents.length;

    document.getElementById('hc-ap-res-val').innerText = `% ${avg.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-avg-percent-result').classList.add('visible');
}
