function hcIrrSatirEkle() {
    const container = document.getElementById('hc-irr-cashflows');
    const year = container.querySelectorAll('.hc-irr-row').length + 1;
    const newRow = document.createElement('div');
    newRow.className = 'hc-irr-row';
    newRow.innerHTML = `
        <label>${year}. Yıl Nakit Akışı (₺)</label>
        <input type="number" class="hc-irr-cf" placeholder="₺">
    `;
    container.appendChild(newRow);
}

function hcIrrHesapla() {
    const initial = -parseFloat(document.getElementById('hc-irr-initial').value);
    const cashflows = Array.from(document.querySelectorAll('.hc-irr-cf')).map(input => parseFloat(input.value) || 0);

    if (isNaN(initial)) {
        alert('Lütfen yatırım maliyetini girin.');
        return;
    }

    const cfs = [initial, ...cashflows];

    // IRR İteratif Fonksiyon
    function calculateIRR(cashflows) {
        let irr = 0.1; // Başlangıç tahmini
        for (let i = 0; i < 100; i++) {
            let npv = 0;
            let dNpv = 0;
            for (let t = 0; t < cashflows.length; t++) {
                npv += cashflows[t] / Math.pow(1 + irr, t);
                dNpv -= t * cashflows[t] / Math.pow(1 + irr, t + 1);
            }
            const newIrr = irr - npv / dNpv;
            if (Math.abs(newIrr - irr) < 0.00001) return newIrr;
            irr = newIrr;
        }
        return irr;
    }

    const irr = calculateIRR(cfs);

    if (isNaN(irr)) {
        document.getElementById('hc-irr-res-total').innerText = "Hesaplanamadı";
    } else {
        document.getElementById('hc-irr-res-total').innerText = '%' + (irr * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    }
    
    document.getElementById('hc-irr-result').classList.add('visible');
}
