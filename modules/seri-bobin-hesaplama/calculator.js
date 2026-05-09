let indCount = 2;
function hcAddInd() {
    indCount++;
    const container = document.getElementById('hc-si-list');
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Bobin ${indCount} [mH]</label><input type="number" class="hc-si-val" value="10">`;
    container.appendChild(div);
}

function hcSeriesIndHesapla() {
    const inputs = document.querySelectorAll('.hc-si-val');
    let sum = 0;
    inputs.forEach(input => {
        sum += (parseFloat(input.value) || 0);
    });

    document.getElementById('hc-res-si-val').innerText = sum.toLocaleString('tr-TR') + ' mH';
    document.getElementById('hc-series-ind-result').classList.add('visible');
}
