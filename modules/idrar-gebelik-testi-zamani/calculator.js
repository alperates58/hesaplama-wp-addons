function hcIdrarTestiZamaniHesapla() {
    const lmpVal = document.getElementById('hc-ut-lmp').value;
    const cycle = parseInt(document.getElementById('hc-ut-cycle').value);

    if (!lmpVal) {
        alert('Lütfen SAT seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    
    // Best: 1 day after expected period start (Missed period day)
    const best = new Date(lmp.getTime() + (cycle * 24 * 60 * 60 * 1000));

    document.getElementById('hc-ut-value').innerText = best.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-urine-test-result').classList.add('visible');
}
