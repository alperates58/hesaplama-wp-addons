const mfAtoms = {
    "H": 1.008, "C": 12.011, "N": 14.007, "O": 15.999, "S": 32.06, "P": 30.974
};

function hcMolekülFormülüHesapla() {
    const simple = document.getElementById('hc-mf-simple').value;
    const realMW = parseFloat(document.getElementById('hc-mf-mw').value);

    if (!simple || !realMW) return;

    // Calculate simple formula weight
    const regex = /([A-Z][a-z]*)(\d*)/g;
    let match;
    let simpleMW = 0;
    let atoms = [];

    while ((match = regex.exec(simple)) !== null) {
        let atom = match[1];
        let count = parseInt(match[2]) || 1;
        if (mfAtoms[atom]) {
            simpleMW += mfAtoms[atom] * count;
            atoms.push({ symbol: atom, count: count });
        }
    }

    if (simpleMW === 0) return;

    // n = realMW / simpleMW
    const n = Math.round(realMW / simpleMW);
    
    let result = "";
    atoms.forEach(a => {
        let newCount = a.count * n;
        result += a.symbol + (newCount > 1 ? newCount : "");
    });

    document.getElementById('hc-mf-val').innerText = result;
    document.getElementById('hc-mf-result').classList.add('visible');
}
