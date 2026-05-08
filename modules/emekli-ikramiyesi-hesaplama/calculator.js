function hcIkramiyeHesapla() {
    const salary = parseFloat(document.getElementById('hc-ikr-salary').value) || 0;
    const years = parseFloat(document.getElementById('hc-ikr-years').value) || 0;
    const type = document.getElementById('hc-ikr-type').value;

    if (salary <= 0 || years <= 0) {
        alert('Lütfen maaş ve yıl bilgilerini giriniz.');
        return;
    }

    const ceiling2026 = 64948.77;
    let baseSalary = salary;

    if (type === 'worker') {
        // Severance pay ceiling applies to workers
        if (baseSalary > ceiling2026) {
            baseSalary = ceiling2026;
        }
    }

    const total = baseSalary * years;
    const damgaVergisi = total * 0.00759; // Damga vergisi (0.759%)
    const netTotal = total - damgaVergisi;

    document.getElementById('hc-ikr-res-per-year').innerText = baseSalary.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ikr-res-total-years').innerText = years.toLocaleString('tr-TR') + ' Yıl';
    document.getElementById('hc-ikr-res-total').innerText = netTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ikramiye-result').classList.add('visible');
}
