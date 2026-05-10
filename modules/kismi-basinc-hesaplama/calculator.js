function hcAddPartialPressureInput() {
    const container = document.getElementById('hc-pp-gases');
    const count = container.querySelectorAll('.hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Gaz ${count} Mol Sayısı</label><input type="number" class="hc-pp-mol" placeholder="0">`;
    container.appendChild(div);
}

function hcKısmiBasınçHesapla() {
    const totalPressure = parseFloat(document.getElementById('hc-pp-total').value);
    const molInputs = document.querySelectorAll('.hc-pp-mol');
    
    let mols = [];
    let totalMol = 0;

    molInputs.forEach(i => {
        let val = parseFloat(i.value);
        if (val > 0) {
            mols.push(val);
            totalMol += val;
        }
    });

    if (!totalPressure || mols.length === 0) return;

    let output = "<strong>Kısmi Basınçlar:</strong><br>";
    mols.forEach((m, idx) => {
        let partial = (m / totalMol) * totalPressure;
        let x = m / totalMol; // Mol kesri
        output += `Gaz ${idx + 1}: ${partial.toFixed(3)} (Mol Kesri: ${x.toFixed(3)})<br>`;
    });

    document.getElementById('hc-pp-stats').innerHTML = output;
    document.getElementById('hc-pp-result').classList.add('visible');
}
