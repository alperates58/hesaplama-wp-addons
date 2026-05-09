function hcKidemTavanHesapla() {
    const salary = parseFloat(document.getElementById('hc-kt-salary').value) || 0;
    const years = parseFloat(document.getElementById('hc-kt-years').value) || 0;

    const ceiling = 64948.77;
    const base = Math.min(salary, ceiling);
    const total = base * years;

    document.getElementById('hc-kt-res-base').innerText = base.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kt-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kidem-tavan-result').classList.add('visible');
}
