function hcHessAddStep() {
    const container = document.getElementById('hc-hess-steps');
    const stepCount = container.getElementsByClassName('hc-hess-step').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-hess-step';
    div.innerHTML = `<input type="number" class="hc-hess-val" placeholder="Adım ${stepCount} ΔH (kJ)" step="any">`;
    container.appendChild(div);
}

function hcHessHesapla() {
    const inputs = document.getElementsByClassName('hc-hess-val');
    let total = 0;
    let hasValue = false;

    for (let input of inputs) {
        const val = parseFloat(input.value);
        if (!isNaN(val)) {
            total += val;
            hasValue = true;
        }
    }

    if (!hasValue) {
        alert('Lütfen en az bir değer giriniz.');
        return;
    }

    document.getElementById('hc-hess-val').innerText = total.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kJ';
    document.getElementById('hc-hess-result').classList.add('visible');
}
