let capCount = 2;
function hcAddCap() {
    capCount++;
    const container = document.getElementById('hc-sc-list');
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Kondansatör ${capCount} [μF]</label><input type="number" class="hc-sc-val" value="10">`;
    container.appendChild(div);
}

function hcSeriesCapHesapla() {
    const inputs = document.querySelectorAll('.hc-sc-val');
    let invSum = 0;
    inputs.forEach(input => {
        const v = parseFloat(input.value) || 0;
        if (v > 0) invSum += (1 / v);
    });

    const ceq = invSum > 0 ? (1 / invSum) : 0;

    document.getElementById('hc-res-sc-val').innerText = ceq.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' μF';
    document.getElementById('hc-series-cap-result').classList.add('visible');
}
