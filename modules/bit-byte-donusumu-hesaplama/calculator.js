function hcBitByteHesapla() {
    const val = parseFloat(document.getElementById('hc-bb-val').value);
    const fromMult = parseFloat(document.getElementById('hc-bb-from').value);

    if (isNaN(val)) {
        alert('Lütfen bir değer girin.');
        return;
    }

    const totalBits = val * fromMult;
    const units = [
        { name: 'Bit', mult: 1, suffix: 'b' },
        { name: 'Byte', mult: 8, suffix: 'B' },
        { name: 'Kilobyte', mult: 8 * 1024, suffix: 'KB' },
        { name: 'Megabyte', mult: 8 * 1024 * 1024, suffix: 'MB' },
        { name: 'Gigabyte', mult: 8 * 1024 * 1024 * 1024, suffix: 'GB' },
        { name: 'Terabyte', mult: 8 * Math.pow(1024, 4), suffix: 'TB' }
    ];

    const listDiv = document.getElementById('hc-bb-res-list');
    listDiv.innerHTML = '';

    units.forEach(u => {
        const resVal = totalBits / u.mult;
        const row = document.createElement('div');
        row.style.display = 'flex';
        row.style.justifyContent = 'space-between';
        row.style.padding = '5px 0';
        row.style.borderBottom = '1px solid #eee';
        
        let formattedVal = resVal;
        if (resVal < 0.001 && resVal > 0) formattedVal = resVal.toExponential(4);
        else formattedVal = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

        row.innerHTML = `<span>${u.name}:</span> <strong>${formattedVal} ${u.suffix}</strong>`;
        listDiv.appendChild(row);
    });

    document.getElementById('hc-bb-result').classList.add('visible');
}
