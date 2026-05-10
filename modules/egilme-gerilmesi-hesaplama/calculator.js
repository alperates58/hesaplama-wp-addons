function hcBendingStressHesapla() {
    const M = parseFloat(document.getElementById('hc-bs-moment').value); // Nm
    const I = parseFloat(document.getElementById('hc-bs-inertia').value); // mm4
    const y = parseFloat(document.getElementById('hc-bs-dist').value); // mm

    if (!M || !I || !y) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Formula: Stress = (M * y) / I
    // Convert M (Nm) to Nmm: M * 1000
    const stress = (M * 1000 * y) / I;

    const resVal = document.getElementById('hc-bs-res-val');
    resVal.innerText = stress.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-stress-result').classList.add('visible');
}
