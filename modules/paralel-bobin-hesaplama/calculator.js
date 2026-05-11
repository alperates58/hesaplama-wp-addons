function hcBobinEkle() {
    const list = document.getElementById('hc-bobin-list');
    const count = list.children.length + 1;
    const row = document.createElement('div');
    row.className = 'hc-input-row';
    row.innerHTML = `
        <input type="number" class="hc-bobin-val" placeholder="Bobin ${count}" step="any">
        <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
    `;
    list.appendChild(row);
}

function hcBobinHesapla() {
    const inputs = document.querySelectorAll('.hc-bobin-val');
    let sumReciprocal = 0;
    let hasValue = false;

    inputs.forEach(input => {
        const val = parseFloat(input.value);
        if (!isNaN(val) && val !== 0) {
            sumReciprocal += (1 / val);
            hasValue = true;
        }
    });

    if (!hasValue || sumReciprocal === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const leq = 1 / sumReciprocal;

    document.getElementById('hc-bobin-res-total').innerText = leq.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-bobin-result').classList.add('visible');
}
