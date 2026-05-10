function hcAddShannonInput() {
    const container = document.getElementById('hc-sh-inputs');
    const count = container.querySelectorAll('.hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Tür ${count} Birey Sayısı</label><input type="number" class="hc-sh-val" placeholder="0">`;
    container.appendChild(div);
}

function hcShannonÇeşitlilikİndeksiHesapla() {
    const inputs = document.querySelectorAll('.hc-sh-val');
    let counts = [];
    let nTotal = 0;

    inputs.forEach(i => {
        let val = parseFloat(i.value);
        if (val > 0) {
            counts.push(val);
            nTotal += val;
        }
    });

    if (counts.length === 0) return;

    let h = 0;
    counts.forEach(ni => {
        let pi = ni / nTotal;
        h += pi * Math.log(pi);
    });

    h = -h;

    // Düzgünlük (Evenness) EH = H / ln(S)
    const s = counts.length;
    const evenness = s > 1 ? h / Math.log(s) : 0;

    document.getElementById('hc-sh-val').innerText = h.toFixed(3);
    document.getElementById('hc-sh-evenness').innerHTML = `
        Tür Sayısı (S): ${s}<br>
        Düzgünlük (EH): ${evenness.toFixed(3)}
    `;
    document.getElementById('hc-sh-result').classList.add('visible');
}
