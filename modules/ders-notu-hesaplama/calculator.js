function hcDnCompAddRow() {
    const container = document.getElementById('hc-dn-components');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-dn-comp-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="text" class="hc-dn-comp-name" placeholder="Bileşen Adı" style="flex: 2;">
        <input type="number" class="hc-dn-comp-score" placeholder="Not" style="flex: 1;">
        <input type="number" class="hc-dn-comp-weight" placeholder="%" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcDnCompHesapla() {
    const rows = document.querySelectorAll('.hc-dn-comp-row');
    let totalPoints = 0;
    let totalWeight = 0;

    rows.forEach(row => {
        const score = parseFloat(row.querySelector('.hc-dn-comp-score').value);
        const weight = parseFloat(row.querySelector('.hc-dn-comp-weight').value);
        if (!isNaN(score) && !isNaN(weight)) {
            totalPoints += score * (weight / 100);
            totalWeight += weight;
        }
    });

    if (totalWeight !== 100) {
        alert('Uyarı: Toplam ağırlık %' + totalWeight + '. Doğru sonuç için ağırlıkların toplamı 100 olmalıdır.');
    }

    document.getElementById('hc-dn-comp-val').innerText = totalPoints.toFixed(2);
    document.getElementById('hc-dn-comp-result').classList.add('visible');
}
