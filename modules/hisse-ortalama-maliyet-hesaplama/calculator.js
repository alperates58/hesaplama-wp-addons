function hcMaliyetSatirEkle() {
    const container = document.getElementById('hc-maliyet-items');
    const newRow = document.createElement('div');
    newRow.className = 'hc-maliyet-row';
    newRow.innerHTML = `
        <input type="number" class="hc-m-shares" placeholder="Adet">
        <input type="number" class="hc-m-price" placeholder="Fiyat (₺)" step="0.01">
    `;
    container.appendChild(newRow);
}

function hcMaliyetHesapla() {
    const shares = document.querySelectorAll('.hc-m-shares');
    const prices = document.querySelectorAll('.hc-m-price');
    
    let totalShares = 0;
    let totalSpent = 0;

    for (let i = 0; i < shares.length; i++) {
        const s = parseFloat(shares[i].value) || 0;
        const p = parseFloat(prices[i].value) || 0;
        
        totalShares += s;
        totalSpent += (s * p);
    }

    if (totalShares <= 0) {
        alert('Lütfen en az bir alım tutarı girin.');
        return;
    }

    const avgPrice = totalSpent / totalShares;

    document.getElementById('hc-m-res-total-shares').innerText = totalShares.toLocaleString('tr-TR');
    document.getElementById('hc-m-res-total-spent').innerText = totalSpent.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-m-res-avg').innerText = avgPrice.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-hisse-m-result').classList.add('visible');
}
