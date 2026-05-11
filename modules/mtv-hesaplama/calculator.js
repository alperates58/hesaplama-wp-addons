function hcMtvHesapla() {
    const age = document.getElementById('hc-mtv-age').value;
    const cc = parseInt(document.getElementById('hc-mtv-cc').value);

    // 2026 Projeksiyonlu Baz MTV Tablosu (1-3 Yaş)
    const baseTable = {
        1300: 6000,
        1600: 10500,
        1800: 18000,
        2000: 28000,
        2500: 42000,
        3000: 58000,
        4000: 88000,
        4001: 150000
    };

    // Yaş İndirim Faktörleri
    const ageFactors = {
        '1-3': 1.0,
        '4-6': 0.7,
        '7-11': 0.4,
        '12-15': 0.25,
        '16': 0.1
    };

    const baseAmount = baseTable[cc] || 6000;
    const factor = ageFactors[age] || 1.0;
    const yearly = baseAmount * factor;
    const installment = yearly / 2;

    document.getElementById('hc-mtv-res-yearly').innerText = yearly.toLocaleString('tr-TR', { minimumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-mtv-res-t1').innerText = installment.toLocaleString('tr-TR', { minimumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-mtv-res-t2').innerText = installment.toLocaleString('tr-TR', { minimumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-mtv-result').classList.add('visible');
}
