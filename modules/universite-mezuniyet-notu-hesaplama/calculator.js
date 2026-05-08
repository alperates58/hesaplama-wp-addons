function hcUniGradAddRow() {
    const container = document.getElementById('hc-uni-grad-rows');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-uni-grad-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-uni-grad-gpa" placeholder="Dönem GPA" style="flex: 1;">
        <input type="number" step="1" class="hc-uni-grad-credit" placeholder="Dönem Kredisi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcUniGradHesapla() {
    const rows = document.querySelectorAll('.hc-uni-grad-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const gpa = parseFloat(row.querySelector('.hc-uni-grad-gpa').value);
        const credit = parseFloat(row.querySelector('.hc-uni-grad-credit').value);
        if (!isNaN(gpa) && !isNaN(credit)) {
            totalPoints += gpa * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen dönem bilgilerini girin.');
        return;
    }

    const result = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-uni-grad-val').innerText = result;
    document.getElementById('hc-uni-grad-result').classList.add('visible');
}
