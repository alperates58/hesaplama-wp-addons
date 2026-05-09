function hcSavingsPlanHesapla() {
    let balance = parseFloat(document.getElementById('hc-sp-initial').value) || 0;
    const pmt = parseFloat(document.getElementById('hc-sp-monthly').value) || 0;
    const annualRate = parseFloat(document.getElementById('hc-sp-rate').value) / 100;
    const years = parseInt(document.getElementById('hc-sp-years').value) || 0;

    const r = annualRate / 12;
    const n = years * 12;

    const tbody = document.getElementById('hc-sp-tbody');
    tbody.innerHTML = "";

    for (let i = 1; i <= n; i++) {
        const interest = balance * r;
        balance = balance + interest + pmt;

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${i}</td>
            <td>${pmt.toLocaleString('tr-TR')} ₺</td>
            <td>${interest.toLocaleString('tr-TR', { minimumFractionDigits: 2 })} ₺</td>
            <td>${balance.toLocaleString('tr-TR', { maximumFractionDigits: 0 })} ₺</td>
        `;
        tbody.appendChild(row);
    }

    document.getElementById('hc-savings-plan-result').classList.add('visible');
}
