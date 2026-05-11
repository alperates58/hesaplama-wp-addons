function hcDirencEkle() {
    const list = document.getElementById('hc-direnc-list');
    const count = list.children.length + 1;
    const row = document.createElement('div');
    row.className = 'hc-input-row';
    row.innerHTML = `
        <input type="number" class="hc-direnc-val" placeholder="Direnç ${count}" step="any">
        <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
    `;
    list.appendChild(row);
}

function hcDirencHesapla() {
    const inputs = document.querySelectorAll('.hc-direnc-val');
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

    const req = 1 / sumReciprocal;

    document.getElementById('hc-direnc-res-total').innerText = req.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-direnc-result').classList.add('visible');
}
