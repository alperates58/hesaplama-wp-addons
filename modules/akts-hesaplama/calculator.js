function hcAktsAddRow() {
    const container = document.getElementById('hc-akts-items');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-akts-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="text" class="hc-akts-name" placeholder="Ders Adı" style="flex: 2;">
        <input type="number" step="1" class="hc-akts-val" placeholder="AKTS" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcAktsHesapla() {
    const rows = document.querySelectorAll('.hc-akts-row');
    let total = 0;

    rows.forEach(row => {
        const val = parseFloat(row.querySelector('.hc-akts-val').value);
        if (!isNaN(val)) {
            total += val;
        }
    });

    document.getElementById('hc-akts-val').innerText = total + " AKTS";
    document.getElementById('hc-akts-result').classList.add('visible');
}
