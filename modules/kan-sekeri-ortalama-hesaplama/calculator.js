function hcAddGlucoseInput() {
    const container = document.getElementById('hc-gl-inputs');
    const count = container.querySelectorAll('.hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Ölçüm ${count} (mg/dL)</label><input type="number" class="hc-gl-val" placeholder="Değer">`;
    container.appendChild(div);
}

function hcOrtalamaSekerHesapla() {
    const inputs = document.querySelectorAll('.hc-gl-val');
    let sum = 0;
    let count = 0;

    inputs.forEach(input => {
        const val = parseFloat(input.value);
        if (!isNaN(val)) {
            sum += val;
            count++;
        }
    });

    if (count === 0) {
        alert('Lütfen en az bir değer girin.');
        return;
    }

    const avg = sum / count;
    // HbA1c = (eAG + 46.7) / 28.7
    const hba1c = (avg + 46.7) / 28.7;

    document.getElementById('hc-mean-gl-value').innerText = Math.round(avg).toLocaleString('tr-TR') + ' mg/dL';
    document.getElementById('hc-mean-hba1c').innerText = '%' + hba1c.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-mean-gl-result').classList.add('visible');
}
