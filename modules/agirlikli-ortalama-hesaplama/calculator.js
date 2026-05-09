function hcWaSatirEkle() {
    const container = document.getElementById('hc-wa-rows');
    const row = document.createElement('div');
    row.className = 'hc-wa-row';
    row.innerHTML = `
        <input type="number" placeholder="Değer (x)" class="hc-wa-val" step="any">
        <input type="number" placeholder="Ağırlık (w)" class="hc-wa-weight" step="any">
        <button onclick="this.parentElement.remove()" class="hc-wa-remove">×</button>
    `;
    container.appendChild(row);
}

function hcWaHesapla() {
    const vals = document.querySelectorAll('.hc-wa-val');
    const weights = document.querySelectorAll('.hc-wa-weight');

    let totalWeightedSum = 0;
    let totalWeights = 0;

    for (let i = 0; i < vals.length; i++) {
        const x = parseFloat(vals[i].value);
        const w = parseFloat(weights[i].value);

        if (!isNaN(x) && !isNaN(w)) {
            totalWeightedSum += x * w;
            totalWeights += w;
        }
    }

    if (totalWeights === 0) {
        alert('Lütfen en az bir değer ve ağırlık girin.');
        return;
    }

    const avg = totalWeightedSum / totalWeights;

    document.getElementById('hc-res-wa-val').innerText = avg.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-wa-total-w').innerText = totalWeights.toLocaleString('tr-TR');

    document.getElementById('hc-wa-result').classList.add('visible');
}
