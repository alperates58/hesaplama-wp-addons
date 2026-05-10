function hcKlorofilHesapla() {
    const a663 = parseFloat(document.getElementById('hc-cl-a663').value);
    const a645 = parseFloat(document.getElementById('hc-cl-a645').value);
    const weight = parseFloat(document.getElementById('hc-cl-weight').value || 1);

    if (isNaN(a663) || isNaN(a645)) {
        alert('Lütfen absorbans değerlerini giriniz.');
        return;
    }

    // Arnon's Equation (mg/g fresh weight)
    // Chlorophyll a = 12.7 * A663 - 2.69 * A645
    // Chlorophyll b = 22.9 * A645 - 4.68 * A663
    // Total = 20.2 * A645 + 8.02 * A663
    const chloA = (12.7 * a663 - 2.69 * a645) / weight;
    const chloB = (22.9 * a645 - 4.68 * a663) / weight;
    const total = chloA + chloB;

    document.getElementById('hc-cl-res-total').innerText = `Toplam Klorofil: ${total.toFixed(3)} mg/g`;
    document.getElementById('hc-cl-res-detail').innerHTML = `
        Klorofil a: <strong>${chloA.toFixed(3)}</strong> mg/g <br>
        Klorofil b: <strong>${chloB.toFixed(3)}</strong> mg/g
    `;

    document.getElementById('hc-chlo-calc-result').classList.add('visible');
}
