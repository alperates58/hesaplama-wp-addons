function hcNoktaGrafigiOlustur() {
    const dataText = document.getElementById('hc-dp-data').value.trim();
    const container = document.getElementById('hc-dp-container');
    const axis = document.getElementById('hc-dp-axis');
    const resultDiv = document.getElementById('hc-nokta-grafigi-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri giriniz.');
        return;
    }

    const nums = dataText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n)).sort((a, b) => a - b);
    if (nums.length === 0) {
        alert('Geçerli sayılar giriniz.');
        return;
    }

    const counts = {};
    nums.forEach(n => counts[n] = (counts[n] || 0) + 1);

    const uniqueVals = Object.keys(counts).map(Number).sort((a, b) => a - b);
    
    container.innerHTML = "";
    axis.innerHTML = "";

    uniqueVals.forEach(val => {
        const col = document.createElement('div');
        col.className = 'hc-dp-col';
        
        const count = counts[val];
        for (let i = 0; i < count; i++) {
            const dot = document.createElement('div');
            dot.className = 'hc-dp-dot';
            col.appendChild(dot);
        }
        
        container.appendChild(col);

        const label = document.createElement('div');
        label.className = 'hc-dp-label';
        label.innerText = val.toLocaleString('tr-TR');
        axis.appendChild(label);
    });

    resultDiv.classList.add('visible');
}
