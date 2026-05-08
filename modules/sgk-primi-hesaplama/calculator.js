function hcSGKPrimHesapla() {
    let salary = parseFloat(document.getElementById('hc-sp-salary').value) || 0;
    const hasDiscount = document.getElementById('hc-sp-discount').value === "1";

    const minWage = 33030.00;
    const maxWage = minWage * 7.5;

    // Cap salary for SGK base
    let base = salary;
    if (base < minWage) base = minWage;
    if (base > maxWage) base = maxWage;

    const workerSGK = base * 0.14;
    const workerUnemp = base * 0.01;
    
    let employerRate = hasDiscount ? 0.155 : 0.205; // 20.5% - 5% discount
    const employerSGK = base * employerRate;
    const employerUnemp = base * 0.02;

    const totalCost = salary + employerSGK + employerUnemp;

    document.getElementById('hc-sp-res-worker-sgk').innerText = workerSGK.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sp-res-worker-unemp').innerText = workerUnemp.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sp-res-employer-sgk').innerText = employerSGK.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sp-res-employer-unemp').innerText = employerUnemp.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sp-res-total').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-sgk-result').classList.add('visible');
}
