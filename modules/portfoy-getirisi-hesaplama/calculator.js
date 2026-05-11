function hcPortfoySatirEkle() {
    const container = document.getElementById('hc-portfoy-items');
    const newRow = document.createElement('div');
    newRow.className = 'hc-portfoy-row';
    newRow.innerHTML = `
        <input type="text" class="hc-asset-name" placeholder="Varlık Adı">
        <input type="number" class="hc-asset-weight" placeholder="Ağırlık (%)">
        <input type="number" class="hc-asset-return" placeholder="Getiri (%)">
    `;
    container.appendChild(newRow);
}

function hcPortfoyHesapla() {
    const weights = document.querySelectorAll('.hc-asset-weight');
    const returns = document.querySelectorAll('.hc-asset-return');
    
    let totalWeight = 0;
    let weightedReturn = 0;

    for (let i = 0; i < weights.length; i++) {
        const w = parseFloat(weights[i].value) || 0;
        const r = parseFloat(returns[i].value) || 0;
        
        totalWeight += w;
        weightedReturn += (w / 100) * r;
    }

    const warning = document.getElementById('hc-portfoy-warning');
    if (Math.abs(totalWeight - 100) > 0.01) {
        warning.style.display = 'block';
        warning.innerText = `Uyarı: Ağırlıklar toplamı %100 olmalıdır. Şu an: %${totalWeight.toLocaleString('tr-TR')}`;
    } else {
        warning.style.display = 'none';
    }

    document.getElementById('hc-portfoy-res-total').innerText = '%' + weightedReturn.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-portfoy-result').classList.add('visible');
}
