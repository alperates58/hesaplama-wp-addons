function hc4LukAddRow() {
    const container = document.getElementById('hc-4luk-courses');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-4luk-course-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-4luk-grade" placeholder="Not (0-4)" style="flex: 1;">
        <input type="number" step="0.5" class="hc-4luk-credit" placeholder="Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hc4LukHesapla() {
    const rows = document.querySelectorAll('.hc-4luk-course-row');
    let totalPoints = 0;
    let totalCredits = 0;

    rows.forEach(row => {
        const grade = parseFloat(row.querySelector('.hc-4luk-grade').value);
        const credit = parseFloat(row.querySelector('.hc-4luk-credit').value);

        if (!isNaN(grade) && !isNaN(credit)) {
            totalPoints += grade * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen en az bir ders notu ve kredisi girin.');
        return;
    }

    const gpa = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-4luk-val').innerText = gpa;
    document.getElementById('hc-4luk-result').classList.add('visible');
}
