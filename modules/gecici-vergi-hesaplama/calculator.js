function hcGeciciVergiHesapla() {
    const revenue = parseFloat(document.getElementById('hc-gv-revenue').value) || 0;
    const expense = parseFloat(document.getElementById('hc-gv-expense').value) || 0;
    const type = document.getElementById('hc-gv-taxpayer').value;

    const profit = revenue - expense;

    if (profit <= 0) {
        document.getElementById('hc-gv-res-profit').innerText = profit.toLocaleString('tr-TR') + ' ₺';
        document.getElementById('hc-gv-res-tax').innerText = '0,00 ₺';
        document.getElementById('hc-gv-result').classList.add('visible');
        return;
    }

    let tax = 0;
    if (type === 'corporate') {
        tax = profit * 0.25; // 2026 Kurumlar Vergisi Oranı varsayımı
    } else {
        // 2026 Gelir Vergisi Dilimleri (Geçici vergi kümülatif matrah üzerinden hesaplanır)
        const brackets = [190000, 400000, 1000000, 5300000];
        const rates = [0.15, 0.20, 0.27, 0.35, 0.40];

        let remaining = profit;
        if (remaining > brackets[3]) { tax += (remaining - brackets[3]) * rates[4]; remaining = brackets[3]; }
        if (remaining > brackets[2]) { tax += (remaining - brackets[2]) * rates[3]; remaining = brackets[2]; }
        if (remaining > brackets[1]) { tax += (remaining - brackets[1]) * rates[2]; remaining = brackets[1]; }
        if (remaining > brackets[0]) { tax += (remaining - brackets[0]) * rates[1]; remaining = brackets[0]; }
        tax += remaining * rates[0];
    }

    document.getElementById('hc-gv-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-result').classList.add('visible');
}
