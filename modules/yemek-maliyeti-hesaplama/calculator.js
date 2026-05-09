function hcYemekMalzemeEkle() {
    const container = document.getElementById('hc-ingredients-container');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-ingredient-row';
    row.innerHTML = `
        <input type="text" placeholder="Malzeme Adı" class="hc-ing-name">
        <input type="number" placeholder="Miktar" class="hc-ing-qty" step="0.01">
        <input type="number" placeholder="Fiyat (TL)" class="hc-ing-price" step="0.01">
    `;
    container.appendChild(row);
}

function hcYemekMaliyetHesapla() {
    const prices = document.querySelectorAll('.hc-ing-price');
    const qtys = document.querySelectorAll('.hc-ing-qty');
    const portions = parseFloat(document.getElementById('hc-meal-portions').value) || 1;

    let total = 0;
    for (let i = 0; i < prices.length; i++) {
        const p = parseFloat(prices[i].value) || 0;
        const q = parseFloat(qtys[i].value) || 0;
        total += p * q;
    }

    const perPortion = total / portions;

    document.getElementById('hc-res-meal-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-res-meal-per-portion').innerText = perPortion.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-yemek-maliyet-result').classList.add('visible');
}
