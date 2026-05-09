function hcAolAddRow() {
    const container = document.getElementById('hc-aol-rows');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-aol-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="1" class="hc-aol-score" placeholder="Puan (0-100)" style="flex: 1;">
        <input type="number" step="1" class="hc-aol-credit" placeholder="Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcAolHesapla() {
    const rows = document.querySelectorAll('.hc-aol-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const score = parseFloat(row.querySelector('.hc-aol-score').value);
        const credit = parseFloat(row.querySelector('.hc-aol-credit').value);
        if (!isNaN(score) && !isNaN(credit)) {
            totalPoints += score * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen ders bilgilerini girin.');
        return;
    }

    const average = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-aol-val').innerText = average;
    document.getElementById('hc-aol-result').classList.add('visible');
}
