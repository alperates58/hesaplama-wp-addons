function hcOlAddRow() {
    const container = document.getElementById('hc-ol-rows');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-ol-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="text" class="hc-ol-name" placeholder="Ders Adı" style="flex: 2;">
        <select class="hc-ol-grade" style="flex: 1;">
            <option value="4.0">AA (4.0)</option>
            <option value="3.5">BA (3.5)</option>
            <option value="3.0">BB (3.0)</option>
            <option value="2.5">CB (2.5)</option>
            <option value="2.0">CC (2.0)</option>
            <option value="1.5">DC (1.5)</option>
            <option value="1.0">DD (1.0)</option>
            <option value="0.5">FD (0.5)</option>
            <option value="0.0">FF (0.0)</option>
        </select>
        <input type="number" step="0.5" class="hc-ol-credit" placeholder="Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcOlHesapla() {
    const rows = document.querySelectorAll('.hc-ol-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const grade = parseFloat(row.querySelector('.hc-ol-grade').value);
        const credit = parseFloat(row.querySelector('.hc-ol-credit').value);
        if (!isNaN(grade) && !isNaN(credit)) {
            totalPoints += grade * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen en az bir ders ve kredi girin.');
        return;
    }

    const gpa = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-ol-val').innerText = gpa;
    document.getElementById('hc-ol-result').classList.add('visible');
}
