function hcAkAddRow() {
    const container = document.getElementById('hc-ak-rows');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-ak-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="text" class="hc-ak-name" placeholder="Ders Adı" style="flex: 2;">
        <input type="number" step="0.01" class="hc-ak-grade" placeholder="Not (0-4)" style="flex: 1;">
        <input type="number" step="0.5" class="hc-ak-credit" placeholder="Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcAkHesapla() {
    const rows = document.querySelectorAll('.hc-ak-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const grade = parseFloat(row.querySelector('.hc-ak-grade').value);
        const credit = parseFloat(row.querySelector('.hc-ak-credit').value);
        if (!isNaN(grade) && !isNaN(credit)) {
            totalPoints += grade * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen ders ve kredi bilgilerini girin.');
        return;
    }

    const gpa = (totalPoints / totalCredits).toFixed(3);
    document.getElementById('hc-ak-val').innerText = gpa;
    document.getElementById('hc-ak-result').classList.add('visible');
}
