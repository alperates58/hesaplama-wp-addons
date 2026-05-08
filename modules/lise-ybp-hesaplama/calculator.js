function hcYbpAddRow() {
    const container = document.getElementById('hc-ybp-rows');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-ybp-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-ybp-grade" placeholder="Yıl Sonu Notu" style="flex: 1;">
        <input type="number" step="1" class="hc-ybp-hour" placeholder="Ders Saati" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcYbpHesapla() {
    const rows = document.querySelectorAll('.hc-ybp-row');
    let totalPoints = 0;
    let totalHours = 0;

    rows.forEach(row => {
        const grade = parseFloat(row.querySelector('.hc-ybp-grade').value);
        const hour = parseFloat(row.querySelector('.hc-ybp-hour').value);
        if (!isNaN(grade) && !isNaN(hour)) {
            totalPoints += grade * hour;
            totalHours += hour;
        }
    });

    if (totalHours === 0) {
        alert('Lütfen ders bilgilerini girin.');
        return;
    }

    const ybp = (totalPoints / totalHours).toFixed(2);
    document.getElementById('hc-ybp-val').innerText = ybp;
    document.getElementById('hc-ybp-result').classList.add('visible');
}
