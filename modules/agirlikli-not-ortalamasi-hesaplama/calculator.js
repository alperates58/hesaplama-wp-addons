function hcAoAddRow() {
    const container = document.getElementById('hc-ao-items');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-ao-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-ao-value" placeholder="Puan/Not" style="flex: 1;">
        <input type="number" step="0.01" class="hc-ao-weight" placeholder="Ağırlık (Kredi/Saat)" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcAoHesapla() {
    const rows = document.querySelectorAll('.hc-ao-row');
    let totalPoints = 0;
    let totalWeight = 0;

    rows.forEach(row => {
        const val = parseFloat(row.querySelector('.hc-ao-value').value);
        const weight = parseFloat(row.querySelector('.hc-ao-weight').value);
        if (!isNaN(val) && !isNaN(weight)) {
            totalPoints += val * weight;
            totalWeight += weight;
        }
    });

    if (totalWeight === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const result = (totalPoints / totalWeight).toFixed(2);
    document.getElementById('hc-ao-val').innerText = result;
    document.getElementById('hc-ao-result').classList.add('visible');
}
