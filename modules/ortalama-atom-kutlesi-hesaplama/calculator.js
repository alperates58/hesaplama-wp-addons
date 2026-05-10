function hcAddIsotopeInput() {
    const container = document.getElementById('hc-aa-inputs');
    const div = document.createElement('div');
    div.className = 'hc-form-group hc-aa-row';
    div.innerHTML = `
        <input type="number" class="hc-aa-mass" placeholder="İzotop Kütlesi" style="width:48%">
        <input type="number" class="hc-aa-percent" placeholder="Bolluk (%)" style="width:48%">
    `;
    container.appendChild(div);
}

function hcOrtalamaAtomKütlesiHesapla() {
    const masses = document.querySelectorAll('.hc-aa-mass');
    const percents = document.querySelectorAll('.hc-aa-percent');
    
    let totalMass = 0;
    let totalPercent = 0;

    masses.forEach((m, idx) => {
        let mass = parseFloat(m.value);
        let percent = parseFloat(percents[idx].value);
        if (!isNaN(mass) && !isNaN(percent)) {
            totalMass += (mass * percent);
            totalPercent += percent;
        }
    });

    if (totalPercent === 0) return;

    const avg = totalMass / totalPercent;

    document.getElementById('hc-aa-val').innerText = avg.toFixed(4) + ' amu';
    document.getElementById('hc-aa-result').classList.add('visible');
}
