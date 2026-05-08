function hcBasincDonustur() {
    const deger = parseFloat(document.getElementById('hc-bbd-deger').value);
    const kaynak = document.getElementById('hc-bbd-kaynak').value;
    
    if (isNaN(deger)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    // Her şeyi bar'a çevir
    let bar;
    switch (kaynak) {
        case 'bar': bar = deger; break;
        case 'psi': bar = deger * 0.0689475729; break;
        case 'pa': bar = deger / 100000; break;
        case 'kpa': bar = deger / 100; break;
        case 'mpa': bar = deger * 10; break;
        case 'atm': bar = deger * 1.01325; break;
        case 'mmhg': bar = deger * 0.0013332239; break;
        default: bar = 0;
    }

    const units = [
        { label: 'Bar', value: bar, unit: 'bar' },
        { label: 'PSI', value: bar / 0.0689475729, unit: 'psi' },
        { label: 'Pascal (Pa)', value: bar * 100000, unit: 'Pa' },
        { label: 'Kilopascal (kPa)', value: bar * 100, unit: 'kPa' },
        { label: 'Megapascal (MPa)', value: bar / 10, unit: 'MPa' },
        { label: 'Atmosfer (atm)', value: bar / 1.01325, unit: 'atm' },
        { label: 'mmHg (Torr)', value: bar / 0.0013332239, unit: 'mmHg' }
    ];

    const tbody = document.getElementById('hc-bbd-results-body');
    tbody.innerHTML = '';

    units.forEach(u => {
        let displayVal;
        if (u.value < 0.000001 && u.value > 0) {
            displayVal = u.value.toExponential(4);
        } else {
            displayVal = u.value.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
        }

        const row = document.createElement('tr');
        row.innerHTML = `<td>${u.label}</td><td><strong>${displayVal} ${u.unit}</strong></td>`;
        tbody.appendChild(row);
    });

    document.getElementById('hc-basinc-birimi-donusturucu-result').classList.add('visible');
}
