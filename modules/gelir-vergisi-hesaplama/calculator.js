function hcGelirVergisiHesapla() {
    const matrah = parseFloat(document.getElementById('hc-gv-matrah').value) || 0;

    const brackets = [
        { limit: 110000, rate: 0.15 },
        { limit: 230000, rate: 0.20 },
        { limit: 580000, rate: 0.27 },
        { limit: 1900000, rate: 0.35 },
        { limit: Infinity, rate: 0.40 }
    ];

    let remaining = matrah;
    let totalTax = 0;
    let prevLimit = 0;
    let detailsHtml = '<table style="width:100%; font-size:0.9em; border-top:1px solid #eee;">';

    for (let i = 0; i < brackets.length; i++) {
        const b = brackets[i];
        const range = b.limit - prevLimit;
        const taxableInRange = Math.min(remaining, range);
        
        if (taxableInRange > 0) {
            const tax = taxableInRange * b.rate;
            totalTax += tax;
            remaining -= taxableInRange;
            detailsHtml += `<tr><td>%${b.rate * 100} Dilimi:</td><td style="text-align:right">${tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 })} ₺</td></tr>`;
        }
        prevLimit = b.limit;
        if (remaining <= 0) break;
    }
    detailsHtml += '</table>';

    const effectiveRate = (totalTax / matrah) * 100;

    document.getElementById('hc-gv-res-rate').innerText = '%' + effectiveRate.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-gv-res-total').innerText = totalTax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-brackets').innerHTML = detailsHtml;

    document.getElementById('hc-gelir-vergi-result').classList.add('visible');
}
