function hcDigitalDonustur() {
    const deger = parseFloat(document.getElementById('hc-bmg-deger').value);
    const kaynak = document.getElementById('hc-bmg-kaynak').value;
    
    if (isNaN(deger)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    // Her şeyi Byte'a çevir (1024 tabanı)
    let bytes;
    switch (kaynak) {
        case 'b': bytes = deger; break;
        case 'kb': bytes = deger * 1024; break;
        case 'mb': bytes = deger * Math.pow(1024, 2); break;
        case 'gb': bytes = deger * Math.pow(1024, 3); break;
        case 'tb': bytes = deger * Math.pow(1024, 4); break;
        default: bytes = 0;
    }

    const units = [
        { label: 'Byte (B)', value: bytes, unit: 'B' },
        { label: 'Kilobyte (KB)', value: bytes / 1024, unit: 'KB' },
        { label: 'Megabyte (MB)', value: bytes / Math.pow(1024, 2), unit: 'MB' },
        { label: 'Gigabyte (GB)', value: bytes / Math.pow(1024, 3), unit: 'GB' },
        { label: 'Terabyte (TB)', value: bytes / Math.pow(1024, 4), unit: 'TB' }
    ];

    const tbody = document.getElementById('hc-bmg-results-body');
    tbody.innerHTML = '';

    units.forEach(u => {
        let displayVal;
        if (u.value === 0) {
            displayVal = "0";
        } else if (u.value < 0.0001) {
            displayVal = u.value.toExponential(4);
        } else {
            displayVal = u.value.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
        }

        const row = document.createElement('tr');
        row.innerHTML = `<td>${u.label}</td><td><strong>${displayVal} ${u.unit}</strong></td>`;
        tbody.appendChild(row);
    });

    document.getElementById('hc-byte-kb-mb-gb-donusturucu-result').classList.add('visible');
}
