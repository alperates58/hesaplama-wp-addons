function hcAddGroupedRow() {
    const container = document.getElementById('hc-grouped-rows');
    const newRow = document.createElement('div');
    newRow.className = 'hc-grouped-row';
    newRow.innerHTML = `
        <input type="text" class="hc-input hc-grouped-range" placeholder="Aralık">
        <input type="number" class="hc-input hc-grouped-freq" placeholder="Frekans">
    `;
    container.appendChild(newRow);
}

function hcGroupedStdHesapla() {
    const ranges = document.querySelectorAll('.hc-grouped-range');
    const freqs = document.querySelectorAll('.hc-grouped-freq');
    
    let totalN = 0;
    let sumFm = 0;
    const midpoints = [];
    const frequencyValues = [];

    for (let i = 0; i < ranges.length; i++) {
        const rangeText = ranges[i].value;
        const freq = parseFloat(freqs[i].value);

        if (rangeText && !isNaN(freq)) {
            const parts = rangeText.split(/[-–—]/).map(s => parseFloat(s.trim()));
            if (parts.length === 2 && !isNaN(parts[0]) && !isNaN(parts[1])) {
                const midpoint = (parts[0] + parts[1]) / 2;
                midpoints.push(midpoint);
                frequencyValues.push(freq);
                totalN += freq;
                sumFm += midpoint * freq;
            }
        }
    }

    if (totalN < 2) {
        alert('Lütfen en az 2 toplam frekans olacak şekilde geçerli veriler girin.');
        return;
    }

    const mean = sumFm / totalN;
    
    let sumFm2 = 0;
    for (let i = 0; i < midpoints.length; i++) {
        sumFm2 += frequencyValues[i] * Math.pow(midpoints[i] - mean, 2);
    }

    const variance = sumFm2 / (totalN - 1);
    const stdDev = Math.sqrt(variance);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-grp-n').innerText = totalN.toLocaleString('tr-TR');
    document.getElementById('hc-res-grp-mean').innerText = fmt(mean);
    document.getElementById('hc-res-grp-var').innerText = fmt(variance);
    document.getElementById('hc-res-grp-std').innerText = fmt(stdDev);

    document.getElementById('hc-gruplandirilmis-veri-standart-sapmasi-result').classList.add('visible');
}
