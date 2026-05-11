function hcDcfSatirEkle() {
    const container = document.getElementById('hc-dcf-cashflows');
    const year = container.querySelectorAll('.hc-dcf-row').length + 1;
    const newRow = document.createElement('div');
    newRow.className = 'hc-dcf-row';
    newRow.innerHTML = `
        <label>${year}. Yıl Serbest Nakit Akışı (₺)</label>
        <input type="number" class="hc-dcf-cf" placeholder="₺">
    `;
    container.appendChild(newRow);
}

function hcDcfHesapla() {
    const wacc = parseFloat(document.getElementById('hc-dcf-wacc').value) / 100;
    const terminal = parseFloat(document.getElementById('hc-dcf-terminal').value) || 0;
    const cashflows = Array.from(document.querySelectorAll('.hc-dcf-cf')).map(input => parseFloat(input.value) || 0);

    if (isNaN(wacc)) {
        alert('Lütfen iskonto oranını girin.');
        return;
    }

    let dcf = 0;
    const n = cashflows.length;

    // Yıllık nakit akışlarını indirge
    for (let t = 0; t < n; t++) {
        dcf += cashflows[t] / Math.pow(1 + wacc, t + 1);
    }

    // Terminal değeri indirge
    dcf += terminal / Math.pow(1 + wacc, n);

    document.getElementById('hc-dcf-res-total').innerText = dcf.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-dcf-result').classList.add('visible');
}
