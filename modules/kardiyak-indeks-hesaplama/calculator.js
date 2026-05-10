function hcKardiyakİndeksHesapla() {
    const co = parseFloat(document.getElementById('hc-ci-co').value);
    const bsa = parseFloat(document.getElementById('hc-ci-bsa').value);

    if (!co || !bsa) return;

    // CI = CO / BSA
    const ci = co / bsa;

    document.getElementById('hc-ci-val').innerText = ci.toFixed(2) + ' L/dk/m²';
    document.getElementById('hc-ci-result').classList.add('visible');
}
