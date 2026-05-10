function hcAddFormulaIngredient() {
    const container = document.getElementById('hc-fs-ingredients');
    const div = document.createElement('div');
    div.className = 'hc-form-group hc-fs-row';
    div.innerHTML = `
        <input type="text" class="hc-fs-name" placeholder="Bileşen Adı" style="width:60%">
        <input type="number" class="hc-fs-val" placeholder="Miktar" style="width:35%">
    `;
    container.appendChild(div);
}

function hcKozmetikFormülÖlçeklendirmeHesapla() {
    const sourceTotal = parseFloat(document.getElementById('hc-fs-source').value);
    const targetTotal = parseFloat(document.getElementById('hc-fs-target').value);

    if (!sourceTotal || !targetTotal) return;

    const scaleFactor = targetTotal / sourceTotal;
    const names = document.querySelectorAll('.hc-fs-name');
    const vals = document.querySelectorAll('.hc-fs-val');

    let output = "<strong>Yeni Formül Miktarları:</strong><br>";
    let totalCheck = 0;

    names.forEach((n, idx) => {
        let name = n.value || `Bileşen ${idx + 1}`;
        let val = parseFloat(vals[idx].value);
        if (isNaN(val)) return;

        let newVal = val * scaleFactor;
        totalCheck += newVal;
        output += `${name}: <strong>${newVal.toLocaleString('tr-TR')}</strong><br>`;
    });

    output += `<hr>Toplam: ${totalCheck.toLocaleString('tr-TR')}`;

    document.getElementById('hc-fs-stats').innerHTML = output;
    document.getElementById('hc-fs-result').classList.add('visible');
}
