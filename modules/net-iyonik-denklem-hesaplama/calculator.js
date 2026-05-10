function hcNetİyonikDenklemHesapla() {
    const input = document.getElementById('hc-ni-input').value.replace(/\s/g, '');
    if (!input) return;

    // Database of common net ionic equations
    const db = {
        "AgNO3+NaCl": "Ag⁺(aq) + Cl⁻(aq) → AgCl(s)",
        "HCl+NaOH": "H⁺(aq) + OH⁻(aq) → H₂O(l)",
        "BaCl2+Na2SO4": "Ba²⁺(aq) + SO₄²⁻(aq) → BaSO₄(s)",
        "Pb(NO3)2+KI": "Pb²⁺(aq) + 2 I⁻(aq) → PbI₂(s)"
    };

    let result = db[input] || db[input.split('+').reverse().join('+')];

    if (!result) {
        result = "Bu tepkime için veri bulunamadı. Lütfen yaygın çökelme veya nötrleşme tepkimelerini girin.";
    } else {
        result = `<strong>Net İyonik Denklem:</strong><br><span style="font-size:1.2em; font-family:monospace;">${result}</span>`;
    }

    document.getElementById('hc-ni-stats').innerHTML = result;
    document.getElementById('hc-ni-result').classList.add('visible');
}
