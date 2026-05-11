function hcKonutKredisiKarsilastirmaHesapla() {
    function calculateLoan(amount, rate, term, fee) {
        if (!amount || !rate || !term) return null;
        const i = rate / 100;
        const installment = (amount * i * Math.pow(1 + i, term)) / (Math.pow(1 + i, term) - 1);
        const total = (installment * term) + (fee || 0);
        return { installment, total };
    }

    const res1 = calculateLoan(
        parseFloat(document.getElementById('hc-kkk-amount1').value),
        parseFloat(document.getElementById('hc-kkk-rate1').value),
        parseInt(document.getElementById('hc-kkk-term1').value),
        parseFloat(document.getElementById('hc-kkk-fee1').value)
    );

    const res2 = calculateLoan(
        parseFloat(document.getElementById('hc-kkk-amount2').value),
        parseFloat(document.getElementById('hc-kkk-rate2').value),
        parseInt(document.getElementById('hc-kkk-term2').value),
        parseFloat(document.getElementById('hc-kkk-fee2').value)
    );

    if (!res1 || !res2) {
        alert('Lütfen her iki teklif için de gerekli alanları doldurun.');
        return;
    }

    document.getElementById('hc-kkk-res-monthly1').innerText = res1.installment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkk-res-monthly2').innerText = res2.installment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkk-res-total1').innerText = res1.total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkk-res-total2').innerText = res2.total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    const diff = Math.abs(res1.total - res2.total);
    const winner = res1.total < res2.total ? '1. Teklif' : '2. Teklif';
    document.getElementById('hc-kkk-res-diff').innerText = `${winner} toplamda ${diff.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} ₺ daha avantajlı.`;

    document.getElementById('hc-kkk-result').classList.add('visible');
}
