function hcKisaCalismaHesapla() {
    const salary = parseFloat(document.getElementById('hc-kc-salary').value) || 0;
    const reduction = parseFloat(document.getElementById('hc-kc-reduction').value);

    const minWage = 33030.00;
    const maxBenefit = minWage * 1.5;

    let calculated = salary * 0.60 * reduction;
    if (calculated > maxBenefit) calculated = maxBenefit;

    // Stamp tax deduction (Damga Vergisi - approx 0.00759)
    const net = calculated * (1 - 0.00759);

    document.getElementById('hc-kc-res-raw').innerText = (salary * 0.60 * reduction).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kc-res-final').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kisa-calisma-result').classList.add('visible');
}
