function hcAddMoleRatioInput() {
    const container = document.getElementById('hc-mr-inputs');
    const count = container.querySelectorAll('.hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Bileşen ${count} Molü</label><input type="number" class="hc-mr-val" placeholder="0">`;
    container.appendChild(div);
}

function hcMolOranıHesapla() {
    const inputs = document.querySelectorAll('.hc-mr-val');
    let mols = [];
    let total = 0;

    inputs.forEach(i => {
        let v = parseFloat(i.value);
        if (v > 0) {
            mols.push(v);
            total += v;
        }
    });

    if (mols.length === 0) return;

    let output = "<strong>Mol Oranları (%):</strong><br>";
    mols.forEach((m, idx) => {
        let percent = (m / total) * 100;
        output += `Bileşen ${idx + 1}: % ${percent.toFixed(2)}<br>`;
    });

    document.getElementById('hc-mr-stats').innerHTML = output;
    document.getElementById('hc-mr-result').classList.add('visible');
}
