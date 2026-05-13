function hcHistogramHesapla() {
    const input = document.getElementById('hc-hist-data').value;
    const binCount = parseInt(document.getElementById('hc-hist-bins').value);
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length === 0 || isNaN(binCount) || binCount < 1) {
        alert('Lütfen geçerli veri ve grup sayısı girin.');
        return;
    }

    const min = data[0];
    const max = data[data.length - 1];
    const range = max - min;
    const binSize = range / binCount;

    const bins = [];
    for (let i = 0; i < binCount; i++) {
        const lower = min + i * binSize;
        const upper = (i === binCount - 1) ? max : min + (i + 1) * binSize;
        bins.push({ lower, upper, count: 0 });
    }

    data.forEach(val => {
        for (let i = 0; i < binCount; i++) {
            if (i === binCount - 1) {
                if (val >= bins[i].lower && val <= bins[i].upper) {
                    bins[i].count++;
                    break;
                }
            } else {
                if (val >= bins[i].lower && val < bins[i].upper) {
                    bins[i].count++;
                    break;
                }
            }
        }
    });

    const tbody = document.getElementById('hc-hist-tbody');
    tbody.innerHTML = '';
    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    bins.forEach(bin => {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = `${fmt(bin.lower)} - ${fmt(bin.upper)}`;
        row.insertCell(1).innerText = bin.count.toLocaleString('tr-TR');
        row.insertCell(2).innerText = "%" + (bin.count / data.length * 100).toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    });

    document.getElementById('hc-histogram-result').classList.add('visible');
}
