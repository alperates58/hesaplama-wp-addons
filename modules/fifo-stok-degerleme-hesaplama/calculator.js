function hcFifoStokHesapla() {
    const qtys = document.querySelectorAll('.hc-fifo-qty');
    const prices = document.querySelectorAll('.hc-fifo-price');
    let soldQty = parseFloat(document.getElementById('hc-fifo-sold').value) || 0;

    let batches = [];
    for (let i = 0; i < qtys.length; i++) {
        const q = parseFloat(qtys[i].value) || 0;
        const p = parseFloat(prices[i].value) || 0;
        if (q > 0) batches.push({ qty: q, price: p });
    }

    let smm = 0;
    let tempSold = soldQty;

    // FIFO: First batches are sold first
    for (let batch of batches) {
        if (tempSold <= 0) break;
        const sellFromThis = Math.min(batch.qty, tempSold);
        smm += sellFromThis * batch.price;
        tempSold -= sellFromThis;
        batch.qty -= sellFromThis; // Reduce remaining in batch
    }

    if (tempSold > 0) {
        alert('Uyarı: Satılan miktar toplam stoktan fazla!');
    }

    let remainingValue = 0;
    for (let batch of batches) {
        remainingValue += batch.qty * batch.price;
    }

    document.getElementById('hc-fifo-res-smm').innerText = smm.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fifo-res-stock').innerText = remainingValue.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fifo-result').classList.add('visible');
}
