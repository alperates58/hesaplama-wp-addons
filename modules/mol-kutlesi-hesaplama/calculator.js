const atomicWeights = {
    "H": 1.008, "He": 4.0026, "Li": 6.94, "Be": 9.0122, "B": 10.81, "C": 12.011, "N": 14.007, "O": 15.999, "F": 18.998, "Ne": 20.180,
    "Na": 22.990, "Mg": 24.305, "Al": 26.982, "Si": 28.085, "P": 30.974, "S": 32.06, "Cl": 35.45, "Ar": 39.948, "K": 39.098, "Ca": 40.078,
    "Fe": 55.845, "Cu": 63.546, "Zn": 65.38, "Ag": 107.87, "I": 126.90, "Au": 196.97, "Pb": 207.2
    // Simplified list for common ones. In a real app, I'd include the full table.
};

function hcMolKütlesiHesapla() {
    const formula = document.getElementById('hc-mm-formula').value;
    if (!formula) return;

    // Basic parser for formulas like H2SO4
    const regex = /([A-Z][a-z]*)(\d*)/g;
    let match;
    let totalMW = 0;

    while ((match = regex.exec(formula)) !== null) {
        let element = match[1];
        let count = parseInt(match[2]) || 1;
        
        if (atomicWeights[element]) {
            totalMW += atomicWeights[element] * count;
        } else {
            alert(`Bilinmeyen element: ${element}`);
            return;
        }
    }

    document.getElementById('hc-mm-val').innerText = totalMW.toFixed(3) + ' g/mol';
    document.getElementById('hc-mm-result').classList.add('visible');
}
