function hcReliabilityHesapla() {
    const mtbf = parseFloat(document.getElementById('hc-rel-mtbf').value);
    const time = parseFloat(document.getElementById('hc-rel-time').value);

    if (isNaN(mtbf) || isNaN(time) || mtbf <= 0 || time < 0) {
        alert('Lütfen geçerli pozitif değerler girin.');
        return;
    }

    // Reliability formula: R(t) = exp(-t / MTBF)
    const reliability = Math.exp(-time / mtbf);
    const percentage = reliability * 100;

    document.getElementById('hc-res-rel-ratio').innerText = '%' + percentage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    
    document.getElementById('hc-rel-desc').innerText = `Sistemin ${time.toLocaleString('tr-TR')} saat sonunda hala arızasız çalışma olasılığı %${percentage.toLocaleString('tr-TR', {maximumFractionDigits: 2})} kadardır.`;
    
    document.getElementById('hc-guvenilirlik-orani-result').classList.add('visible');
}
