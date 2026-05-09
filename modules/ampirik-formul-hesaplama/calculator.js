function hcAFAddElement() {
    const container = document.getElementById('hc-af-elements');
    const div = document.createElement('div');
    div.className = 'hc-af-row';
    div.style.display = 'grid';
    div.style.gridTemplateColumns = '1fr 1fr 1fr';
    div.style.gap = '10px';
    div.style.marginBottom = '10px';
    div.innerHTML = `<input type="text" class="hc-af-sym" placeholder="El">
                     <input type="number" class="hc-af-perc" placeholder="%">
                     <input type="number" class="hc-af-mw" placeholder="Ma">`;
    container.appendChild(div);
}

function hcAFHesapla() {
    const syms = document.getElementsByClassName('hc-af-sym');
    const percs = document.getElementsByClassName('hc-af-perc');
    const mws = document.getElementsByClassName('hc-af-mw');
    
    let moles = [];
    let minMole = Infinity;

    for (let i = 0; i < syms.length; i++) {
        const s = syms[i].value.trim();
        const p = parseFloat(percs[i].value);
        const m = parseFloat(mws[i].value);
        
        if (s && !isNaN(p) && !isNaN(m)) {
            const mole = p / m;
            moles.push({ sym: s, mole: mole });
            if (mole < minMole) minMole = mole;
        }
    }

    if (moles.length === 0) {
        alert('Lütfen en az bir element verisi giriniz.');
        return;
    }

    // Ratio
    let formula = "";
    moles.forEach(el => {
        let ratio = el.mole / minMole;
        // Simple rounding to nearest integer if close
        let rounded = Math.round(ratio * 10) / 10;
        // If it's .5, .33 etc, we should multiply but keeping it simple for now
        // A better way is to multiply all by 2, 3, 4 until integers are found
        let intRatio = Math.round(ratio);
        formula += el.sym + (intRatio > 1 ? `<sub>${intRatio}</sub>` : "");
    });

    document.getElementById('hc-af-val').innerHTML = formula;
    document.getElementById('hc-af-result').classList.add('visible');
}
