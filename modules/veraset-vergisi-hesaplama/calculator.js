function hcVerasetVergisiHesapla() {
    const value = parseFloat(document.getElementById('hc-vv-value').value) || 0;
    const type = document.getElementById('hc-vv-type').value;

    let brackets = [];
    if (type === 'direct') {
        brackets = [
            { limit: 1700000, rate: 0.01 },
            { limit: 4000000, rate: 0.03 },
            { limit: 8600000, rate: 0.05 },
            { limit: 16000000, rate: 0.07 },
            { limit: Infinity, rate: 0.10 }
        ];
    } else if (type === 'gift') {
        brackets = [
            { limit: 1700000, rate: 0.10 },
            { limit: 4000000, rate: 0.15 },
            { limit: 8600000, rate: 0.20 },
            { limit: 16000000, rate: 0.25 },
            { limit: Infinity, rate: 0.30 }
        ];
    } else {
        brackets = [
            { limit: 1700000, rate: 0.02 },
            { limit: 4000000, rate: 0.04 },
            { limit: 8600000, rate: 0.06 },
            { limit: 16000000, rate: 0.08 },
            { limit: Infinity, rate: 0.15 }
        ];
    }

    let remaining = value;
    let totalTax = 0;
    let prevLimit = 0;

    for (let i = 0; i < brackets.length; i++) {
        const b = brackets[i];
        const range = b.limit - prevLimit;
        const taxableInRange = Math.min(remaining, range);
        if (taxableInRange > 0) {
            totalTax += taxableInRange * b.rate;
            remaining -= taxableInRange;
        }
        prevLimit = b.limit;
        if (remaining <= 0) break;
    }

    document.getElementById('hc-vv-res-total').innerText = totalTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-veraset-result').classList.add('visible');
}
