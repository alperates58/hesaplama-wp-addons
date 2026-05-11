function hcMirrSatirEkle() {
    const container = document.getElementById('hc-mirr-cashflows');
    const year = container.querySelectorAll('.hc-mirr-row').length + 1;
    const newRow = document.createElement('div');
    newRow.className = 'hc-mirr-row';
    newRow.innerHTML = `
        <label>${year}. Yıl Nakit Akışı (₺)</label>
        <input type="number" class="hc-mirr-cf" placeholder="₺">
    `;
    container.appendChild(newRow);
}

function hcMirrHesapla() {
    const initial = parseFloat(document.getElementById('hc-mirr-initial').value);
    const finRate = parseFloat(document.getElementById('hc-mirr-fin').value) / 100;
    const reinRate = parseFloat(document.getElementById('hc-mirr-rein').value) / 100;
    const cashflows = Array.from(document.querySelectorAll('.hc-mirr-cf')).map(input => parseFloat(input.value) || 0);

    if (isNaN(initial) || isNaN(finRate) || isNaN(reinRate)) {
        alert('Lütfen tüm oranları ve yatırım tutarını girin.');
        return;
    }

    const n = cashflows.length;
    
    // 1. Pozitif nakit akışlarının vadedeki (n. yıl) toplam değeri (FV)
    let fvPositive = 0;
    for (let t = 0; t < n; t++) {
        if (cashflows[t] > 0) {
            fvPositive += cashflows[t] * Math.pow(1 + reinRate, n - (t + 1));
        }
    }

    // 2. Negatif nakit akışlarının (yatırım dahil) bugünkü değeri (PV)
    let pvNegative = initial; 
    for (let t = 0; t < n; t++) {
        if (cashflows[t] < 0) {
            pvNegative += Math.abs(cashflows[t]) / Math.pow(1 + finRate, t + 1);
        }
    }

    // 3. MIRR Formülü
    const mirr = Math.pow(fvPositive / pvNegative, 1 / n) - 1;

    document.getElementById('hc-mirr-res-total').innerText = '%' + (mirr * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-mirr-result').classList.add('visible');
}
