function hcAddCalRow() {
    const container = document.getElementById('hc-cal-items');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-cal-row';
    row.innerHTML = `
        <input type="text" placeholder="Yiyecek Adı" class="hc-cal-name">
        <input type="number" placeholder="Kalori" class="hc-cal-val">
    `;
    container.appendChild(row);
}

function hcTotalCalHesapla() {
    const inputs = document.querySelectorAll('.hc-cal-val');
    let total = 0;
    inputs.forEach(input => {
        const val = parseFloat(input.value);
        if (!isNaN(val)) total += val;
    });

    document.getElementById('hc-cal-res').innerText = total.toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-total-cal-result').classList.add('visible');
}
