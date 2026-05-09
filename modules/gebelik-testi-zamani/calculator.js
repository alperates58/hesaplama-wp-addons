function hcTestZamaniHesapla() {
    const lmpVal = document.getElementById('hc-gt-lmp').value;
    const cycle = parseInt(document.getElementById('hc-gt-cycle').value);

    if (!lmpVal) {
        alert('Lütfen SAT seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    
    // Blood Test: ~Conception + 10 days => (LMP + cycle - 14) + 10
    const blood = new Date(lmp.getTime() + ((cycle - 4) * 24 * 60 * 60 * 1000));
    
    // Urine Test: ~LMP + cycle (Missed period day)
    const urine = new Date(lmp.getTime() + (cycle * 24 * 60 * 60 * 1000));

    document.getElementById('hc-gt-blood').innerText = blood.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-gt-urine').innerText = urine.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });

    document.getElementById('hc-test-timing-result').classList.add('visible');
}
