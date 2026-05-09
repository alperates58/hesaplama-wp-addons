function hcKnAddSubject() {
    const container = document.getElementById('hc-kn-subjects');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-kn-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="text" class="hc-kn-name" placeholder="Ders Adı" style="flex: 2;">
        <input type="number" step="0.01" class="hc-kn-score" placeholder="Not" style="flex: 1;">
        <input type="number" step="1" class="hc-kn-hour" placeholder="Saat" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcKnHesapla() {
    const rows = document.querySelectorAll('.hc-kn-row');
    let totalPoints = 0;
    let totalHours = 0;

    rows.forEach(row => {
        const score = parseFloat(row.querySelector('.hc-kn-score').value);
        const hour = parseFloat(row.querySelector('.hc-kn-hour').value);
        if (!isNaN(score) && !isNaN(hour)) {
            totalPoints += score * hour;
            totalHours += hour;
        }
    });

    if (totalHours === 0) {
        alert('Lütfen ders bilgilerini girin.');
        return;
    }

    const average = (totalPoints / totalHours).toFixed(2);
    document.getElementById('hc-kn-val').innerText = average;
    document.getElementById('hc-kn-result').classList.add('visible');
}
