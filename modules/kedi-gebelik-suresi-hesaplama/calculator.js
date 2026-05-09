function hcKediGebelikHesapla() {
    const dateInput = document.getElementById('hc-cat-date').value;

    if (!dateInput) {
        alert('Lütfen bir tarih seçiniz.');
        return;
    }

    const startDate = new Date(dateInput);
    const dueDate = new Date(startDate);
    dueDate.setDate(startDate.getDate() + 64); // Average 64 days

    const today = new Date();
    const diffTime = dueDate - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    document.getElementById('hc-cat-val').innerText = dueDate.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    
    let note = "";
    if (diffDays > 0) {
        note = `Doğuma yaklaşık ${diffDays} gün kaldı.`;
    } else if (diffDays === 0) {
        note = "Doğum bugün bekleniyor!";
    } else {
        note = `Tahmini doğum tarihi üzerinden ${Math.abs(diffDays)} gün geçti.`;
    }

    document.getElementById('hc-cat-note').innerText = note;
    document.getElementById('hc-cat-result').classList.add('visible');
}
