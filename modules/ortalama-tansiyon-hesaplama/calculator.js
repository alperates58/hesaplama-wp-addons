function hcABAdd() {
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.style.display = 'flex';
    div.style.gap = '10px';
    div.innerHTML = `
        <input type="number" class="hc-ab-sys" placeholder="Sistolik" style="flex:1">
        <input type="number" class="hc-ab-dia" placeholder="Diyastolik" style="flex:1">
    `;
    document.getElementById('hc-ab-inputs').appendChild(div);
}

function hcOrtalamaTansiyonHesapla() {
    const sysInputs = document.querySelectorAll('.hc-ab-sys');
    const diaInputs = document.querySelectorAll('.hc-ab-dia');

    let totalSys = 0, totalDia = 0, count = 0;

    for (let i = 0; i < sysInputs.length; i++) {
        const s = parseFloat(sysInputs[i].value);
        const d = parseFloat(diaInputs[i].value);
        if (s && d) {
            totalSys += s;
            totalDia += d;
            count++;
        }
    }

    if (count === 0) return;

    const avgSys = Math.round(totalSys / count);
    const avgDia = Math.round(totalDia / count);

    document.getElementById('hc-ab-val').innerText = `${avgSys} / ${avgDia} mmHg`;
    document.getElementById('hc-ab-result').classList.add('visible');
}
