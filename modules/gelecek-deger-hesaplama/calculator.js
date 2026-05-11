function hcGelecekDegerHesapla() {
    const pv = parseFloat(document.getElementById('hc-fv-pv').value);
    const rate = parseFloat(document.getElementById('hc-fv-rate').value) / 100;
    const years = parseFloat(document.getElementById('hc-fv-years').value);

    if (isNaN(pv) || isNaN(rate) || isNaN(years)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const fv = pv * Math.pow(1 + rate, years);
    const interest = fv - pv;

    document.getElementById('hc-fv-res-total').innerText = fv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fv-res-interest').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-fv-result').classList.add('visible');
}
