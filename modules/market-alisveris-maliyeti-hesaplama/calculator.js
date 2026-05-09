function hcAddShoppingRow() {
    const container = document.getElementById('hc-sc-items');
    const row = document.createElement('div');
    row.className = 'hc-sc-row';
    row.innerHTML = `
        <input type="text" class="hc-sc-name" placeholder="Ürün Adı">
        <input type="number" class="hc-sc-price" placeholder="Fiyat (TL)" step="0.01">
    `;
    container.appendChild(row);
}

function hcShoppingCostHesapla() {
    const prices = document.querySelectorAll('.hc-sc-price');
    let total = 0;
    prices.forEach(p => {
        total += parseFloat(p.value) || 0;
    });

    document.getElementById('hc-res-sc-grand-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-shopping-cost-result').classList.add('visible');
}
