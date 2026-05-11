function hcPortfoyBetaSatirEkle() {
    const container = document.getElementById('hc-p-beta-items');
    const newRow = document.createElement('div');
    newRow.className = 'hc-p-beta-row';
    newRow.innerHTML = `
        <input type="text" class="hc-pb-name" placeholder="Hisse Adı">
        <input type="number" class="hc-pb-weight" placeholder="Ağırlık (%)">
        <input type="number" class="hc-pb-beta" placeholder="Beta (β)" step="0.01">
    `;
    container.appendChild(newRow);
}

function hcPortfoyBetaHesapla() {
    const weights = document.querySelectorAll('.hc-pb-weight');
    const betas = document.querySelectorAll('.hc-pb-beta');
    
    let totalWeight = 0;
    let portfolioBeta = 0;

    for (let i = 0; i < weights.length; i++) {
        const w = parseFloat(weights[i].value) || 0;
        const b = parseFloat(betas[i].value) || 0;
        
        totalWeight += w;
        portfolioBeta += (w / 100) * b;
    }

    if (totalWeight === 0) {
        alert('Lütfen en az bir hisse verisi girin.');
        return;
    }

    document.getElementById('hc-p-beta-res-total').innerText = portfolioBeta.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    
    const commentElem = document.getElementById('hc-p-beta-comment');
    if (portfolioBeta > 1.2) {
        commentElem.innerText = "Yüksek Risk: Portföy pazardan daha agresif hareket eder.";
    } else if (portfolioBeta >= 0.8) {
        commentElem.innerText = "Pazarla Uyumlu: Portföy pazar hareketlerini yakından takip eder.";
    } else {
        commentElem.innerText = "Düşük Risk (Defansif): Portföy pazar dalgalanmalarından daha az etkilenir.";
    }

    document.getElementById('hc-p-beta-result').classList.add('visible');
}
