function hcYerlesmeHesapla() {
    const lmpVal = document.getElementById('hc-it-lmp').value;
    const cycle = parseInt(document.getElementById('hc-it-cycle').value);

    if (!lmpVal) {
        alert('Lütfen SAT seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    // Ovulation ~ LMP + (cycle - 14)
    // Implantation ~ Ovulation + (6 to 12 days)
    const start = new Date(lmp.getTime() + ((cycle - 14 + 6) * 24 * 60 * 60 * 1000));
    const end = new Date(lmp.getTime() + ((cycle - 14 + 12) * 24 * 60 * 60 * 1000));

    document.getElementById('hc-it-value').innerText = 
        start.toLocaleDateString('tr-TR', { day: 'numeric', month: 'short' }) + " - " + 
        end.toLocaleDateString('tr-TR', { day: 'numeric', month: 'short', year: 'numeric' });

    document.getElementById('hc-yerlesme-result').classList.add('visible');
}
