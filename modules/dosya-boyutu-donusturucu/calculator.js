function hcDbDonustur() {
    const val = parseFloat(document.getElementById('hc-dbd-deger').value);
    const unit = document.getElementById('hc-dbd-birim').value;
    const resultDiv = document.getElementById('hc-dosya-boyutu-donusturucu-result');
    const output = document.getElementById('hc-dbd-output');

    if (isNaN(val)) {
        resultDiv.classList.remove('visible');
        return;
    }

    let bytes;
    switch(unit) {
        case 'B': bytes = val; break;
        case 'KB': bytes = val * 1024; break;
        case 'MB': bytes = val * 1024 * 1024; break;
        case 'GB': bytes = val * 1024 * 1024 * 1024; break;
        case 'TB': bytes = val * 1024 * 1024 * 1024 * 1024; break;
    }

    const units = ['B', 'KB', 'MB', 'GB', 'TB'];
    let html = '<table>';
    units.forEach(u => {
        let converted;
        switch(u) {
            case 'B': converted = bytes; break;
            case 'KB': converted = bytes / 1024; break;
            case 'MB': converted = bytes / (1024 * 1024); break;
            case 'GB': converted = bytes / (1024 * 1024 * 1024); break;
            case 'TB': converted = bytes / (1024 * 1024 * 1024 * 1024); break;
        }
        html += `<tr><td>${u}</td><td><strong>${converted.toLocaleString('tr-TR', {maximumFractionDigits: 2})} ${u}</strong></td></tr>`;
    });
    html += '</table>';

    output.innerHTML = html;
    resultDiv.classList.add('visible');
}
