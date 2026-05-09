function hcAgnoAddRow() {
    const container = document.getElementById('hc-agno-current-courses');
    const row = document.createElement('div');
    row.className = 'hc-form-group hc-agno-row';
    row.style.display = 'flex';
    row.style.gap = '10px';
    row.style.marginBottom = '10px';
    row.innerHTML = `
        <input type="number" step="0.01" class="hc-agno-grade" placeholder="Not (0-4)" style="flex: 1;">
        <input type="number" step="1" class="hc-agno-credit" placeholder="Kredi" style="flex: 1;">
    `;
    container.appendChild(row);
}

function hcAgnoHesapla() {
    const prevCredits = parseFloat(document.getElementById('hc-agno-prev-credits').value) || 0;
    const prevAgno = parseFloat(document.getElementById('hc-agno-prev-val').value) || 0;
    
    let totalPoints = prevCredits * prevAgno;
    let totalCredits = prevCredits;

    const rows = document.querySelectorAll('.hc-agno-row');
    rows.forEach(row => {
        const grade = parseFloat(row.querySelector('.hc-agno-grade').value);
        const credit = parseFloat(row.querySelector('.hc-agno-credit').value);
        if (!isNaN(grade) && !isNaN(credit)) {
            totalPoints += grade * credit;
            totalCredits += credit;
        }
    });

    if (totalCredits === 0) {
        alert('Lütfen geçerli bilgiler girin.');
        return;
    }

    const agno = (totalPoints / totalCredits).toFixed(2);
    document.getElementById('hc-agno-val').innerText = agno;
    document.getElementById('hc-agno-result').classList.add('visible');
}
