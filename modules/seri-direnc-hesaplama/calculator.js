let resCount = 2;
function hcAddRes() {
    resCount++;
    const container = document.getElementById('hc-sr-list');
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Direnç ${resCount} [Ω]</label><input type="number" class="hc-sr-val" value="100">`;
    container.appendChild(div);
}

function hcSeriesResHesapla() {
    const inputs = document.querySelectorAll('.hc-sr-val');
    let sum = 0;
    inputs.forEach(input => {
        sum += (parseFloat(input.value) || 0);
    });

    document.getElementById('hc-res-sr-val').innerText = sum.toLocaleString('tr-TR') + ' Ω';
    document.getElementById('hc-series-res-result').classList.add('visible');
}
