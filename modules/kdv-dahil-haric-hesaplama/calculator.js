function hcKdvDhHesapla() {
    const type = document.getElementById('hc-kd-type').value;
    const amount = parseFloat(document.getElementById('hc-kd-amount').value);
    const rate = parseFloat(document.getElementById('hc-kd-rate').value) / 100;

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    let excl, tax, incl;

    if (type === 'hariç') {
        excl = amount;
        tax = excl * rate;
        incl = excl + tax;
    } else {
        incl = amount;
        excl = incl / (1 + rate);
        tax = incl - excl;
    }

    document.getElementById('hc-kd-res-excl').innerText = excl.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kd-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kd-res-incl').innerText = incl.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kd-result').classList.add('visible');
}
