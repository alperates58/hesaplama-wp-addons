function hcAddScaleRow() {
    const body = document.getElementById('hc-rs-body');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><input type="text" placeholder="Malzeme"></td>
        <td><input type="number" class="hc-rs-qty" value="0"></td>
        <td class="hc-rs-row-res">-</td>
    `;
    body.appendChild(row);
}

function hcRecipeScaleHesapla() {
    const orig = parseFloat(document.getElementById('hc-rs-orig').value);
    const target = parseFloat(document.getElementById('hc-rs-target').value);

    if (!orig || !target || orig <= 0) return;

    const multiplier = target / orig;
    const rows = document.querySelectorAll('#hc-rs-body tr');

    rows.forEach(row => {
        const qty = parseFloat(row.querySelector('.hc-rs-qty').value) || 0;
        const newQty = qty * multiplier;
        row.querySelector('.hc-rs-row-res').innerText = newQty.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    });
}
