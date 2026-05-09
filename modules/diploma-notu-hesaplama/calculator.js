function hcDnAddRow() {
    const container = document.getElementById('hc-dn-semesters');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-dn-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-dn-avg" placeholder="Dönem Ort." style="flex: 1;">
        <input type="number" step="1" class="hc-dn-credit" placeholder="Toplam Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcDnHesapla() {
    const rows = document.querySelectorAll('.hc-dn-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const avg = parseFloat(row.querySelector('.hc-dn-avg').value);
        const credit = parseFloat(row.querySelector('.hc-dn-credit').value);
        if (!isNaN(avg) && !isNaN(credit)) {
            totalPoints += avg * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen dönem bilgilerini girin.');
        return;
    }

    const dn = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-dn-val').innerText = dn;
    document.getElementById('hc-dn-result').classList.add('visible');
}
