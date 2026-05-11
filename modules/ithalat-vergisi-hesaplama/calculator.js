function hcIthalatVergisiHesapla() {
    const cif = parseFloat(document.getElementById('hc-iv-cif').value);
    const gumrukRate = parseFloat(document.getElementById('hc-iv-gumruk').value) / 100;
    const kdvRate = parseFloat(document.getElementById('hc-iv-kdv').value) / 100;
    const other = parseFloat(document.getElementById('hc-iv-other').value) || 0;

    if (isNaN(cif) || cif <= 0) {
        alert('Lütfen geçerli bir CIF bedeli girin.');
        return;
    }

    const gumrukAmount = cif * gumrukRate;
    const kdvBase = cif + gumrukAmount;
    const kdvAmount = kdvBase * kdvRate;
    const total = cif + gumrukAmount + kdvAmount + other;

    document.getElementById('hc-iv-res-gumruk').innerText = gumrukAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-iv-res-kdv').innerText = kdvAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-iv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-iv-result').classList.add('visible');
}
