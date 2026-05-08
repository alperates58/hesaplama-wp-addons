function hcLyeSorgula() {
    const code = parseInt(document.getElementById('hc-lye-input').value);

    if (isNaN(code)) return;

    // Load Index Table (Common values)
    const table = {
        80: 450, 81: 462, 82: 475, 83: 487, 84: 500, 85: 515, 86: 530, 87: 545, 88: 560, 89: 580,
        90: 600, 91: 615, 92: 630, 93: 650, 94: 670, 95: 690, 96: 710, 97: 730, 98: 750, 99: 775,
        100: 800, 101: 825, 102: 850, 103: 875, 104: 900, 105: 925, 106: 950, 107: 975, 108: 1000, 109: 1030,
        110: 1060
    };

    let kg = table[code];
    if (!kg) {
        // Simple linear approximation if outside common range
        if (code < 80) kg = 450 - (80 - code) * 10;
        else kg = 1060 + (code - 110) * 30;
    }

    document.getElementById('hc-lye-val').innerText = kg + " kg";
    document.getElementById('hc-lye-total').innerText = "Araç Toplam Kapasitesi (4 Lastik): " + (kg * 4).toLocaleString('tr-TR') + " kg";

    document.getElementById('hc-lye-result').classList.add('visible');
}
