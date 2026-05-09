function hcM2Donustur() {
    const m2 = parseFloat(document.getElementById('hc-md-m2').value);
    const resultDiv = document.getElementById('hc-metrekare-donusturucu-result');
    const tbody = document.getElementById('hc-md-results');

    if (!isNaN(m2)) {
        const units = [
            { label: 'Santimetrekare (cm²)', val: m2 * 10000, unit: 'cm²' },
            { label: 'Milimetrekare (mm²)', val: m2 * 1000000, unit: 'mm²' },
            { label: 'Kilometrekare (km²)', val: m2 / 1000000, unit: 'km²' },
            { label: 'Dekar / Dönüm', val: m2 / 1000, unit: 'dekar' },
            { label: 'Hektar (ha)', val: m2 / 10000, unit: 'ha' },
            { label: 'Acre (ac)', val: m2 / 4046.856, unit: 'ac' },
            { label: 'Fit Kare (sq ft)', val: m2 * 10.7639, unit: 'sq ft' }
        ];

        tbody.innerHTML = '';
        units.forEach(u => {
            const row = document.createElement('tr');
            row.innerHTML = `<td>${u.label}</td><td><strong>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})} ${u.unit}</strong></td>`;
            tbody.appendChild(row);
        });
        resultDiv.classList.add('visible');
    } else {
        resultDiv.classList.remove('visible');
    }
}
