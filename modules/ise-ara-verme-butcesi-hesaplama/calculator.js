function hcCareerBreakHesapla() {
    const monthly = parseFloat(document.getElementById('hc-cb-monthly').value) || 0;
    const months = parseInt(document.getElementById('hc-cb-months').value) || 0;
    const bufferPerc = (parseFloat(document.getElementById('hc-cb-buffer').value) || 0) / 100;

    const baseBudget = monthly * months;
    const totalBudget = baseBudget * (1 + bufferPerc);

    document.getElementById('hc-cb-res-val').innerText = totalBudget.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-career-break-result').classList.add('visible');
}
