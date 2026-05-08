function hcGanoAddRow() {
    const container = document.getElementById('hc-gano-semesters');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-gano-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-gano-avg" placeholder="Dönem Ort." style="flex: 1;">
        <input type="number" step="1" class="hc-gano-credit" placeholder="Toplam Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcGanoHesapla() {
    const rows = document.querySelectorAll('.hc-gano-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const avg = parseFloat(row.querySelector('.hc-gano-avg').value);
        const credit = parseFloat(row.querySelector('.hc-gano-credit').value);
        if (!isNaN(avg) && !isNaN(credit)) {
            totalPoints += avg * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen dönem bilgilerini girin.');
        return;
    }

    const gano = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-gano-val').innerText = gano;
    document.getElementById('hc-gano-result').classList.add('visible');
}
