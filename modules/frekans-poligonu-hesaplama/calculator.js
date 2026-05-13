function hcFrekansPoligonuHesapla() {
    const input = document.getElementById('hc-poly-data').value;
    const binCount = parseInt(document.getElementById('hc-poly-bins').value);
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length === 0 || isNaN(binCount) || binCount < 1) {
        alert('Lütfen geçerli veri ve grup sayısı girin.');
        return;
    }

    const min = data[0];
    const max = data[data.length - 1];
    const range = max - min;
    const binSize = range / binCount;

    const points = [];
    
    // Add starting point (0 frequency)
    points.push({ x: min - binSize / 2, y: 0 });

    for (let i = 0; i < binCount; i++) {
        const lower = min + i * binSize;
        const upper = (i === binCount - 1) ? max : min + (i + 1) * binSize;
        const midpoint = (lower + upper) / 2;
        
        let count = 0;
        data.forEach(val => {
            if (i === binCount - 1) {
                if (val >= lower && val <= upper) count++;
            } else {
                if (val >= lower && val < upper) count++;
            }
        });
        
        points.push({ x: midpoint, y: count });
    }

    // Add ending point (0 frequency)
    points.push({ x: max + binSize / 2, y: 0 });

    const tbody = document.getElementById('hc-poly-tbody');
    tbody.innerHTML = '';
    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    points.forEach((pt, idx) => {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = idx + 1;
        row.insertCell(1).innerText = fmt(pt.x);
        row.insertCell(2).innerText = pt.y.toLocaleString('tr-TR');
    });

    document.getElementById('hc-frekans-poligonu-result').classList.add('visible');
}
