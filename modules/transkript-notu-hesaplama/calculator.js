function hcTrAddRow() {
    const container = document.getElementById('hc-tr-rows');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-tr-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="text" class="hc-tr-name" placeholder="Ders Adı" style="flex: 2;">
        <input type="number" step="0.01" class="hc-tr-grade" placeholder="Not (0-4)" style="flex: 1;">
        <input type="number" step="0.5" class="hc-tr-credit" placeholder="Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcTrHesapla() {
    const rows = document.querySelectorAll('.hc-tr-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const grade = parseFloat(row.querySelector('.hc-tr-grade').value);
        const credit = parseFloat(row.querySelector('.hc-tr-credit').value);
        if (!isNaN(grade) && !isNaN(credit)) {
            totalPoints += grade * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen ders ve kredi bilgilerini girin.');
        return;
    }

    const result = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-tr-val').innerText = result;
    document.getElementById('hc-tr-result').classList.add('visible');
}
