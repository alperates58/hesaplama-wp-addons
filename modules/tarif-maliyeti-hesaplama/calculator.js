function hcAddRecipeRow() {
    const body = document.getElementById('hc-rc-body');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><input type="text" placeholder="Malzeme"></td>
        <td><input type="number" class="hc-rc-qty" value="1" step="0.1"></td>
        <td><input type="number" class="hc-rc-price" value="0" step="0.5"></td>
        <td class="hc-rc-row-total">0,00 ₺</td>
    `;
    body.appendChild(row);
}

function hcRecipeCostHesapla() {
    const rows = document.querySelectorAll('#hc-rc-body tr');
    let total = 0;

    rows.forEach(row => {
        const qty = parseFloat(row.querySelector('.hc-rc-qty').value) || 0;
        const price = parseFloat(row.querySelector('.hc-rc-price').value) || 0;
        const rowTotal = qty * price;
        row.querySelector('.hc-rc-row-total').innerText = rowTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
        total += rowTotal;
    });

    const resultDiv = document.getElementById('hc-recipe-cost-result');
    document.getElementById('hc-rc-res-val').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    
    resultDiv.classList.add('visible');
}
