function hcGanoAddInput() {
    const container = document.getElementById('hc-gano-inputs');
    const div = document.createElement('div');
    div.className = 'hc-gano-row';
    div.style = 'display:grid; grid-template-columns: 2fr 1fr 1fr; gap:10px; margin-bottom:10px;';
    div.innerHTML = `
        <input type="text" placeholder="Ders Adı" style="font-size:0.8rem">
        <input type="number" class="hc-g-credit" placeholder="Kredi/AKTS">
        <select class="hc-g-grade">
            <option value="4.0">AA (4.0)</option>
            <option value="3.5">BA (3.5)</option>
            <option value="3.0">BB (3.0)</option>
            <option value="2.5">CB (2.5)</option>
            <option value="2.0">CC (2.0)</option>
            <option value="1.5">DC (1.5)</option>
            <option value="1.0">DD (1.0)</option>
            <option value="0.5">FD (0.5)</option>
            <option value="0.0">FF (0.0)</option>
        </select>
    `;
    container.appendChild(div);
}

function hcGanoHesapla() {
    const credits = document.getElementsByClassName('hc-g-credit');
    const grades = document.getElementsByClassName('hc-g-grade');
    
    let totalWeighted = 0;
    let totalCredits = 0;

    for (let i = 0; i < credits.length; i++) {
        let c = parseFloat(credits[i].value);
        let g = parseFloat(grades[i].value);
        if (!isNaN(c)) {
            totalWeighted += c * g;
            totalCredits += c;
        }
    }

    if (totalCredits === 0) {
        alert('Lütfen ders kredilerini giriniz.');
        return;
    }

    const gano = totalWeighted / totalCredits;

    document.getElementById('hc-g-res-val').innerText = gano.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-universite-not-result').classList.add('visible');
}
