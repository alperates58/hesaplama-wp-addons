function hcKhAddRow() {
    const container = document.getElementById('hc-kh-items');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-kh-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="text" class="hc-kh-name" placeholder="Ders Adı" style="flex: 2;">
        <input type="number" step="0.5" class="hc-kh-credit" placeholder="Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcKhHesapla() {
    const rows = document.querySelectorAll('.hc-kh-row');
    let total = 0;

    rows.forEach(row => {
        const credit = parseFloat(row.querySelector('.hc-kh-credit').value);
        if (!isNaN(credit)) {
            total += credit;
        }
    });

    document.getElementById('hc-kh-val').innerText = total;
    document.getElementById('hc-kh-result').classList.add('visible');
}
