function hcReverseGAHesapla() {
    const eddVal = document.getElementById('hc-rg-edd').value;

    if (!eddVal) {
        alert('Lütfen bir tarih seçin.');
        return;
    }

    const edd = new Date(eddVal);
    
    // LMP = EDD - 280 days
    const lmp = new Date(edd.getTime() - (280 * 24 * 60 * 60 * 1000));
    // Conception = EDD - 266 days
    const conception = new Date(edd.getTime() - (266 * 24 * 60 * 60 * 1000));

    document.getElementById('hc-rg-lmp').innerText = lmp.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-rg-concep').innerText = conception.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });

    document.getElementById('hc-reverse-ga-result').classList.add('visible');
}
