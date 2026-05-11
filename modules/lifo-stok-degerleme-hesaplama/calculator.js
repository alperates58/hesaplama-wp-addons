function hcLifoStokHesapla() {
    const qtys = document.querySelectorAll('.hc-lifo-qty');
    const prices = document.querySelectorAll('.hc-lifo-price');
    let soldQty = parseFloat(document.getElementById('hc-lifo-sold').value) || 0;

    let batches = [];
    for (let i = 0; i < qtys.length; i++) {
        const q = parseFloat(qtys[i].value) || 0;
        const p = parseFloat(prices[i].value) || 0;
        if (q > 0) batches.push({ qty: q, price: p });
    }

    let smm = 0;
    let tempSold = soldQty;

    // LIFO: Newest batches are sold first (Reverse loop)
    for (let i = batches.length - 1; i >= 0; i--) {
        if (tempSold <= 0) break;
        const sellFromThis = Math.min(batches[i].qty, tempSold);
        smm += sellFromThis * batches[i].price;
        tempSold -= sellFromThis;
        batches[i].qty -= sellFromThis;
    }

    if (tempSold > 0) {
        alert('Uyarı: Satılan miktar toplam stoktan fazla!');
    }

    let remainingValue = 0;
    for (let batch of batches) {
        remainingValue += batch.qty * batch.price;
    }

    document.getElementById('hc-lifo-res-smm').innerText = smm.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-lifo-res-stock').innerText = remainingValue.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-lifo-result').classList.add('visible');
}
