function hcKondEkle() {
    const list = document.getElementById('hc-kond-list');
    const count = list.children.length + 1;
    const row = document.createElement('div');
    row.className = 'hc-input-row';
    row.innerHTML = `
        <input type="number" class="hc-kond-val" placeholder="Kondansatör ${count}" step="any">
        <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
    `;
    list.appendChild(row);
}

function hcKondHesapla() {
    const inputs = document.querySelectorAll('.hc-kond-val');
    let total = 0;
    let hasValue = false;

    inputs.forEach(input => {
        const val = parseFloat(input.value);
        if (!isNaN(val)) {
            total += val;
            hasValue = true;
        }
    });

    if (!hasValue) {
        alert('Lütfen en az bir değer girin.');
        return;
    }

    document.getElementById('hc-kond-res-total').innerText = total.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-kond-result').classList.add('visible');
}
