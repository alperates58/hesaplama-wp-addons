function hcBagkurPrimHesapla() {
    let base = parseFloat(document.getElementById('hc-bk-base').value) || 0;
    const hasDiscount = document.getElementById('hc-bk-discount').value === "1";

    const minWage = 33030.00;
    const maxWage = minWage * 7.5;

    if (base < minWage) base = minWage;
    if (base > maxWage) base = maxWage;

    const normalPrim = base * 0.345;
    const finalPrim = hasDiscount ? (base * 0.295) : normalPrim;

    document.getElementById('hc-bk-res-normal').innerText = normalPrim.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-bk-res-final').innerText = finalPrim.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-bagkur-result').classList.add('visible');
}
