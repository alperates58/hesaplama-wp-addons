function hcAritmetikOrtHesapla() {
    const raw = document.getElementById('hc-aa-data').value;
    const data = raw.split(/[,\s\n]+/).map(x => parseFloat(x.replace(',', '.').trim())).filter(x => !isNaN(x));

    if (data.length === 0) {
        alert('Lütfen en az bir sayı girin.');
        return;
    }

    const sum = data.reduce((a, b) => a + b, 0);
    const avg = sum / data.length;

    document.getElementById('hc-res-aa-avg').innerText = avg.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-aa-sum').innerText = sum.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-aa-count').innerText = data.length.toLocaleString('tr-TR');

    document.getElementById('hc-aa-result').classList.add('visible');
}
