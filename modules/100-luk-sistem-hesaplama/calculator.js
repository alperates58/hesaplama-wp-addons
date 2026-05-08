function hc100LukAddRow() {
    const container = document.getElementById('hc-100luk-courses');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-100luk-course-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-100luk-grade" placeholder="Not (0-100)" style="flex: 1;">
        <input type="number" step="1" class="hc-100luk-hour" placeholder="Ders Saati" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hc100LukHesapla() {
    const rows = document.querySelectorAll('.hc-100luk-course-row');
    let totalPoints = 0;
    let totalHours = 0;

    rows.forEach(row => {
        const grade = parseFloat(row.querySelector('.hc-100luk-grade').value);
        const hour = parseFloat(row.querySelector('.hc-100luk-hour').value);

        if (!isNaN(grade) && !isNaN(hour)) {
            totalPoints += grade * hour;
            totalHours += hour;
        }
    });

    if (totalHours === 0) {
        alert('Lütfen en az bir ders notu ve haftalık ders saati girin.');
        return;
    }

    const average = (totalPoints / totalHours).toFixed(2);
    document.getElementById('hc-100luk-val').innerText = average;
    document.getElementById('hc-100luk-result').classList.add('visible');
}
