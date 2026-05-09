function hcCCUAddSide() {
    const container = document.getElementById('hc-ccu-sides');
    const sideCount = container.querySelectorAll('.hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `
        <label>Kenar ${sideCount} (m)</label>
        <input type="number" class="hc-ccu-input" placeholder="Örn: 10" step="any">
    `;
    container.appendChild(div);
}

function hcCCUHesapla() {
    const inputs = document.querySelectorAll('.hc-ccu-input');
    let total = 0;
    let hasValue = false;

    inputs.forEach(input => {
        const val = parseFloat(input.value);
        if (!isNaN(val) && val > 0) {
            total += val;
            hasValue = true;
        }
    });

    if (!hasValue) {
        alert('Lütfen en az bir kenar uzunluğu giriniz.');
        return;
    }

    document.getElementById('hc-ccu-val').innerText = total.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-ccu-result').classList.add('visible');
}
