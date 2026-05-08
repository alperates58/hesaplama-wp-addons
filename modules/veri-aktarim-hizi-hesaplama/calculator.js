function hcVahDonustur() {
    const deger = parseFloat(document.getElementById('hc-vah-deger').value);
    const kaynak = document.getElementById('hc-vah-kaynak').value;
    
    if (isNaN(deger)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    // Her şeyi bps'ye çevir (1000 tabanı - ağ hızı standardı)
    let bps;
    switch (kaynak) {
        case 'bps': bps = deger; break;
        case 'kbps': bps = deger * 1000; break;
        case 'mbps': bps = deger * 1000000; break;
        case 'gbps': bps = deger * 1000000000; break;
        case 'bs': bps = deger * 8; break;
        case 'kbs': bps = deger * 8 * 1000; break;
        case 'mbs': bps = deger * 8 * 1000000; break;
        case 'gbs': bps = deger * 8 * 1000000000; break;
        default: bps = 0;
    }

    const units = [
        { label: 'bps (Bit/s)', value: bps, unit: 'bps' },
        { label: 'Kbps (Kilobit/s)', value: bps / 1000, unit: 'Kbps' },
        { label: 'Mbps (Megabit/s)', value: bps / 1000000, unit: 'Mbps' },
        { label: 'Gbps (Gigabit/s)', value: bps / 1000000000, unit: 'Gbps' },
        { label: 'B/s (Byte/s)', value: bps / 8, unit: 'B/s' },
        { label: 'KB/s (Kilobyte/s)', value: bps / (8 * 1000), unit: 'KB/s' },
        { label: 'MB/s (Megabyte/s)', value: bps / (8 * 1000000), unit: 'MB/s' },
        { label: 'GB/s (Gigabyte/s)', value: bps / (8 * 1000000000), unit: 'GB/s' }
    ];

    const tbody = document.getElementById('hc-vah-results-body');
    tbody.innerHTML = '';

    units.forEach(u => {
        let displayVal;
        if (u.value === 0) {
            displayVal = "0";
        } else if (u.value < 0.0001) {
            displayVal = u.value.toExponential(4);
        } else {
            displayVal = u.value.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
        }

        const row = document.createElement('tr');
        row.innerHTML = `<td>${u.label}</td><td><strong>${displayVal} ${u.unit}</strong></td>`;
        tbody.appendChild(row);
    });

    document.getElementById('hc-veri-aktarim-hizi-hesaplama-result').classList.add('visible');
}
