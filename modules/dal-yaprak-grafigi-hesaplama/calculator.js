function hcStemLeafHesapla() {
    const input = document.getElementById('hc-sl-data').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length === 0) {
        alert('Lütfen geçerli veriler girin.');
        return;
    }

    const stems = {};
    data.forEach(num => {
        const s = Math.floor(num / 10);
        const l = num % 10;
        if (!stems[s]) stems[s] = [];
        stems[s].push(l);
    });

    const display = document.getElementById('hc-sl-display');
    display.innerHTML = '';

    const sortedStems = Object.keys(stems).map(Number).sort((a, b) => a - b);
    sortedStems.forEach(s => {
        const row = document.createElement('div');
        row.className = 'hc-sl-row';
        
        const stemSpan = document.createElement('span');
        stemSpan.className = 'hc-sl-stem';
        stemSpan.innerText = s;
        
        const leafSpan = document.createElement('span');
        leafSpan.className = 'hc-sl-leaf';
        leafSpan.innerText = stems[s].join(' ');
        
        row.appendChild(stemSpan);
        row.appendChild(leafSpan);
        display.appendChild(row);
    });

    document.getElementById('hc-dal-yaprak-grafigi-hesaplama-result').classList.add('visible');
}
