function hcGpaSatirEkle() {
    const container = document.getElementById('hc-gpa-rows');
    const row = document.createElement('div');
    row.className = 'hc-gpa-row';
    row.innerHTML = `
        <input type="text" placeholder="Ders Adı" class="hc-gpa-name">
        <input type="number" placeholder="Not" class="hc-gpa-grade" step="0.01">
        <input type="number" placeholder="Kredi" class="hc-gpa-credit" step="0.1">
        <button onclick="this.parentElement.remove()" class="hc-gpa-remove">×</button>
    `;
    container.appendChild(row);
}

function hcGpaHesapla() {
    const grades = document.querySelectorAll('.hc-gpa-grade');
    const credits = document.querySelectorAll('.hc-gpa-credit');

    let totalWeightedGrade = 0;
    let totalCredits = 0;

    for (let i = 0; i < grades.length; i++) {
        const g = parseFloat(grades[i].value);
        const c = parseFloat(credits[i].value);

        if (!isNaN(g) && !isNaN(c)) {
            totalWeightedGrade += g * c;
            totalCredits += c;
        }
    }

    if (totalCredits === 0) {
        alert('Lütfen en az bir dersin notunu ve kredisini girin.');
        return;
    }

    const gpa = totalWeightedGrade / totalCredits;

    document.getElementById('hc-res-gpa-val').innerText = gpa.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-res-gpa-credits').innerText = totalCredits.toLocaleString('tr-TR');

    document.getElementById('hc-gpa-result').classList.add('visible');
}
