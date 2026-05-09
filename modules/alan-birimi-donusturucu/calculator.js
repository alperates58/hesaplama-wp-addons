function hcAlanDonustur() {
    const deger = parseFloat(document.getElementById('hc-abd-alan-deger').value);
    const kaynak = document.getElementById('hc-abd-alan-kaynak').value;
    
    if (isNaN(deger)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    // Her şeyi m2'ye çevir
    let m2;
    switch (kaynak) {
        case 'm2': m2 = deger; break;
        case 'cm2': m2 = deger / 10000; break;
        case 'mm2': m2 = deger / 1000000; break;
        case 'km2': m2 = deger * 1000000; break;
        case 'dekar': m2 = deger * 1000; break;
        case 'hektar': m2 = deger * 10000; break;
        case 'acre': m2 = deger * 4046.8564224; break;
        case 'sqft': m2 = deger * 0.09290304; break;
        default: m2 = 0;
    }

    const units = [
        { label: 'Metrekare (m²)', value: m2, unit: 'm²' },
        { label: 'Santimetrekare (cm²)', value: m2 * 10000, unit: 'cm²' },
        { label: 'Milimetrekare (mm²)', value: m2 * 1000000, unit: 'mm²' },
        { label: 'Kilometrekare (km²)', value: m2 / 1000000, unit: 'km²' },
        { label: 'Dekar / Dönüm', value: m2 / 1000, unit: 'dekar' },
        { label: 'Hektar (ha)', value: m2 / 10000, unit: 'ha' },
        { label: 'Acre (ac)', value: m2 / 4046.8564224, unit: 'ac' },
        { label: 'Fit Kare (sq ft)', value: m2 / 0.09290304, unit: 'sq ft' }
    ];

    const tbody = document.getElementById('hc-abd-alan-results-body');
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

    document.getElementById('hc-alan-birimi-donusturucu-result').classList.add('visible');
}
