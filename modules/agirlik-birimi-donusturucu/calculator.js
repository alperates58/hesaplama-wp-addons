function hcAgirlikDonustur() {
    const deger = parseFloat(document.getElementById('hc-abd-deger').value);
    const kaynak = document.getElementById('hc-abd-kaynak').value;
    
    if (isNaN(deger)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    // Her şeyi KG'ye çevir
    let kg;
    switch (kaynak) {
        case 'kg': kg = deger; break;
        case 'g': kg = deger / 1000; break;
        case 'mg': kg = deger / 1000000; break;
        case 'ton': kg = deger * 1000; break;
        case 'lb': kg = deger * 0.45359237; break;
        case 'oz': kg = deger * 0.0283495231; break;
        case 'st': kg = deger * 6.35029318; break;
        default: kg = 0;
    }

    const units = [
        { label: 'Kilogram (kg)', value: kg, unit: 'kg' },
        { label: 'Gram (g)', value: kg * 1000, unit: 'g' },
        { label: 'Miligram (mg)', value: kg * 1000000, unit: 'mg' },
        { label: 'Ton (t)', value: kg / 1000, unit: 't' },
        { label: 'Pound (lb)', value: kg / 0.45359237, unit: 'lb' },
        { label: 'Ons (oz)', value: kg / 0.0283495231, unit: 'oz' },
        { label: 'Stone (st)', value: kg / 6.35029318, unit: 'st' }
    ];

    const tbody = document.getElementById('hc-abd-results-body');
    tbody.innerHTML = '';

    units.forEach(u => {
        let displayVal;
        if (u.value < 0.000001) {
            displayVal = u.value.toExponential(4);
        } else {
            displayVal = u.value.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
        }

        const row = document.createElement('tr');
        row.innerHTML = `<td>${u.label}</td><td><strong>${displayVal} ${u.unit}</strong></td>`;
        tbody.appendChild(row);
    });

    document.getElementById('hc-agirlik-birimi-donusturucu-result').classList.add('visible');
}
