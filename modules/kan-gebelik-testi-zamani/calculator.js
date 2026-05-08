function hcKanTestiZamaniHesapla() {
    const lmpVal = document.getElementById('hc-bt-lmp').value;
    const cycle = parseInt(document.getElementById('hc-bt-cycle').value);

    if (!lmpVal) {
        alert('Lütfen SAT seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    
    // Early: Conception + 9 days
    const early = new Date(lmp.getTime() + ((cycle - 14 + 9) * 24 * 60 * 60 * 1000));
    // Safe: Conception + 12 days
    const safe = new Date(lmp.getTime() + ((cycle - 14 + 12) * 24 * 60 * 60 * 1000));

    document.getElementById('hc-bt-early').innerText = early.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-bt-safe').innerText = safe.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });

    document.getElementById('hc-blood-test-result').classList.add('visible');
}
