function hcCDToggle() {
    const method = document.getElementById('hc-cd-method').value;
    const label = document.getElementById('hc-cd-date-label');
    if (method === 'lmp') {
        label.innerText = 'Son Adet Tarihi (SAT)';
    } else {
        label.innerText = 'Tahmini Doğum Tarihi (TDT)';
    }
}

function hcGebeKalmaHesapla() {
    const method = document.getElementById('hc-cd-method').value;
    const dateVal = document.getElementById('hc-cd-date').value;

    if (!dateVal) {
        alert('Lütfen bir tarih seçin.');
        return;
    }

    const inputDate = new Date(dateVal);
    let conception;

    if (method === 'lmp') {
        // LMP + 14 days
        conception = new Date(inputDate.getTime() + (14 * 24 * 60 * 60 * 1000));
    } else {
        // EDD - 266 days (typical human gestation from conception)
        conception = new Date(inputDate.getTime() - (266 * 24 * 60 * 60 * 1000));
    }

    document.getElementById('hc-cd-value').innerText = conception.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-gebe-kalma-result').classList.add('visible');
}
