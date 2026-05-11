function hcGgdAddEntry() {
    const container = document.getElementById('hc-ggd-entries');
    const newEntry = document.createElement('div');
    newEntry.className = 'hc-ggd-entry';
    newEntry.innerHTML = `
        <input type="text" class="hc-ggd-desc" placeholder="Açıklama">
        <input type="number" class="hc-ggd-amount" placeholder="Tutar">
        <select class="hc-ggd-type">
            <option value="gelir">Gelir (+)</option>
            <option value="gider">Gider (-)</option>
        </select>
    `;
    container.appendChild(newEntry);
}

function hcGgdHesapla() {
    const amounts = document.querySelectorAll('.hc-ggd-amount');
    const types = document.querySelectorAll('.hc-ggd-type');

    let totalGelir = 0;
    let totalGider = 0;

    for (let i = 0; i < amounts.length; i++) {
        const val = parseFloat(amounts[i].value) || 0;
        const type = types[i].value;

        if (type === 'gelir') {
            totalGelir += val;
        } else {
            totalGider += val;
        }
    }

    const net = totalGelir - totalGider;

    document.getElementById('hc-ggd-res-gelir').innerText = totalGelir.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ggd-res-gider').innerText = totalGider.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ggd-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    
    document.getElementById('hc-ggd-res-net').style.color = net >= 0 ? 'green' : 'red';
    document.getElementById('hc-ggd-result').classList.add('visible');
}
