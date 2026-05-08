function hcAcreToHa() {
    const ac = parseFloat(document.getElementById('hc-ahd-acre').value);
    const haInput = document.getElementById('hc-ahd-ha');
    const resultDiv = document.getElementById('hc-acre-hektar-donusturucu-result');
    const summary = document.getElementById('hc-ahd-summary');

    if (!isNaN(ac)) {
        const ha = ac * 0.4046856422;
        haInput.value = ha.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${ac.toLocaleString('tr-TR')} ac = ${ha.toLocaleString('tr-TR', {maximumFractionDigits: 4})} ha</span>`;
        resultDiv.classList.add('visible');
    } else {
        haInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcHaToAcre() {
    const ha = parseFloat(document.getElementById('hc-ahd-ha').value);
    const acInput = document.getElementById('hc-ahd-acre');
    const resultDiv = document.getElementById('hc-acre-hektar-donusturucu-result');
    const summary = document.getElementById('hc-ahd-summary');

    if (!isNaN(ha)) {
        const ac = ha / 0.4046856422;
        acInput.value = ac.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${ha.toLocaleString('tr-TR')} ha = ${ac.toLocaleString('tr-TR', {maximumFractionDigits: 4})} ac</span>`;
        resultDiv.classList.add('visible');
    } else {
        acInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
