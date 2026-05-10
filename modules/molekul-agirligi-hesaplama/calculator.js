const commonAtoms = {
    "H": 1.008, "C": 12.011, "N": 14.007, "O": 15.999, "S": 32.06, "P": 30.974, "Cl": 35.45, "Na": 22.99, "K": 39.098, "Ca": 40.078
};

function hcMolekülAğırlığıHesapla() {
    const formula = document.getElementById('hc-mw-formula').value;
    if (!formula) return;

    const regex = /([A-Z][a-z]*)(\d*)/g;
    let match;
    let total = 0;

    while ((match = regex.exec(formula)) !== null) {
        let atom = match[1];
        let count = parseInt(match[2]) || 1;
        if (commonAtoms[atom]) {
            total += commonAtoms[atom] * count;
        } else {
            // Very simplified: skip unknown for now or alert
        }
    }

    document.getElementById('hc-mw-val').innerText = total.toFixed(3) + ' g/mol';
    document.getElementById('hc-mw-result').classList.add('visible');
}
